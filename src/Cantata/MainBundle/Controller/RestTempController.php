<?php
namespace Cantata\MainBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use Cantata\MainBundle\Entity\Temp;
use Cantata\MainBundle\Entity\Product;
use Cantata\MainBundle\Entity\ProductQuantity;

/**
 * @Rest\Prefix("/api")
 * @Rest\NamePrefix("rest_")
 */
class RestTempController extends FOSRestController
{
/**
     * @Rest\View
     */
    public function postModifyAction()
    {
        $obj = json_decode($this->getRequest()->getContent());
        $em = $this->getDoctrine()->getManager();
        
        if($obj->id != -1)
        {
            $prod = $em->getRepository('CantataMainBundle:Product')->find($obj->id);
            if (isset($prod))
            {
                if (isset($obj->name) && $obj->name != "" && $obj->name != $prod->getName()) {
                    $prod->setName($obj->name);
                }
                if (isset($obj->code) && $obj->code != "" && $obj->code != $prod->getCode()) {
                    $prod->setCode($obj->code);
                }
                if (isset($obj->cost) && $obj->cost != "" && 
                        $obj->cost != $prod->getCost() && is_numeric($obj->cost)) {
                    
                    $prod->setCost($obj->cost);
                }
                if (isset($obj->p_cost) && $obj->p_cost != "" && 
                        $obj->p_cost != $prod->getPrimeCost() && is_numeric($obj->p_cost)) {
                    
                    $prod->setPrimeCost($obj->p_cost);
                }
            }
            else
            {
                return array('status' => 'warning');
            }
        }
        else
        {
            $prod = new Product();
            $valid = 0;
            
            if (isset($obj->name) && $obj->name != "") {
                $prod->setName($obj->name);
                $valid++;
            }
            if (isset($obj->code) && $obj->code != "") {
                $prod->setCode($obj->code);
                $valid++;
            }
            if (isset($obj->cost) && $obj->cost != "" && is_numeric($obj->cost)) {
                $prod->setCost($obj->cost);
                $valid++;
            }
            if (isset($obj->p_cost) && $obj->p_cost != "" && is_numeric($obj->p_cost)) {
                $prod->setPrimeCost($obj->p_cost);
                $valid++;
            }
            if ($valid != 4)
            {
                return array('status' => 'warning');
            }
            
            $em->persist($prod);
        }
        $em->flush();
        return array('status' => 'success');
    }
    
    /**
     * @Rest\View
     */
    public function getTempAction()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('CantataMainBundle:Temp')->findAll();
    }
    
    /**
     * @Rest\View
     */
    public function getProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->createQuery("SELECT prod 
                FROM CantataMainBundle:Product prod ORDER BY prod.id DESC")
                ->getResult();
    }
    
    /**
     * @Rest\View
     */
    public function deleteProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $prod = $em->getRepository('CantataMainBundle:Product')->find($id);
        if ($prod)
        {
            $em->remove($prod);
            $em->flush();
            return array('status' => 'success');
        }
        
        return array('status' => 'warning');
    }
    
    /**
     * @Rest\View
     */
    public function postFindprodAction()
    {
        $obj = json_decode($this->getRequest()->getContent());
        if (isset($obj))
        {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('CantataMainBundle:Product')->find($obj->prodId);
            $tmp = $em->getRepository('CantataMainBundle:Temp')->find($obj->tempId);
            
            $productQuantity = new ProductQuantity();
            $productQuantity->setProd($product);
            $productQuantity->setType($tmp->getIsPrixod());
            $productQuantity->setQuantity($tmp->getQuantity());
            $productQuantity->setYear($tmp->getYear());
            $productQuantity->setMonth($tmp->getMonth());
            $productQuantity->setShop($tmp->getShop());
            $em->persist($productQuantity);
            $em->remove($tmp);
            $em->flush();
            
            return array('status' => 'success');
        }
        else
        {
            return array('status' => 'warning');
        }
    }

    /**
     * @Rest\View
     */
    public function postChangeAction() //Փոփոխությունները հաստատաելու դեպքում
    {
        $obj = json_decode($this->getRequest()->getContent());
        $em = $this->getDoctrine()->getManager();
        if (isset($obj))
        {
            if (!isset($obj->id))
            {
                $str = "(";
                foreach($obj as $key => $value) {
                    if ($value) {
                        $str .= $key . ", ";
                    }
                }
                $str = substr($str, 0, -2) . ")";

                $temps = $em->createQuery(
                    "SELECT tmp FROM CantataMainBundle:Temp tmp WHERE tmp.id IN $str")
                    ->getResult();

                foreach($temps as $tmp)
                {
                    if ($tmp->getType()) //type == 1 => Ապրանքի մնացորդը մուտքագրված է
                    {

                        $ProdQuantity = $em->createQuery(
                             "SELECT qnt FROM CantataMainBundle:ProductQuantity qnt
                              JOIN qnt.prod prod
                              WHERE qnt.year = {$tmp->getYear()} AND
                              qnt.month = {$tmp->getMonth()} AND
                              qnt.shop = '{$tmp->getShop()}' AND
                              prod.code = '{$tmp->getCode()}' AND
                              qnt.type = 'productQuantity' ")
                            ->getSingleResult();

                        $ProdQuantity->setQuantity($tmp->getQuantity());
                    }
                    $em->remove($tmp);
                }
            }
            else //type == 0 => Այս կոդով ապրանք բազայում չկա
            {
                $tmp = $em->createQuery("SELECT tmp FROM CantataMainBundle:Temp tmp WHERE tmp.id = {$obj->id}")
                ->getOneOrNullResult();

                $product = new Product();
                $product->setCode($tmp->getCode());
                $product->setName($obj->name);
                $product->setCost($obj->cost);
                $product->setPrimeCost($obj->p_cost);
                $em->persist($product);
                $productQuantity = new ProductQuantity();
                $productQuantity->setProd($product);
                $productQuantity->setType($tmp->getIsPrixod());
                $productQuantity->setQuantity($tmp->getQuantity());
                $productQuantity->setYear($tmp->getYear());
                $productQuantity->setMonth($tmp->getMonth());
                $productQuantity->setShop($tmp->getShop());
                $em->persist($productQuantity);
                $em->remove($tmp);
            }
            $em->flush();
            return array ('status' => 'success');
        }
        else
        {
            return array ('status' => 'warning');
        }

    }

    /**
     * @Rest\View
     */
    public function postRemoveAction() //Փոփոխությունները չեղյալ հայտարարելու դեպքում
    {
        $obj = json_decode($this->getRequest()->getContent());

        if (isset($obj))
        {
            $str = "(";
            foreach($obj as $key => $value) {
                if ($value) {
                    $str .= $key . ", ";
                }
            }
            $str = substr($str, 0, -2) . ")";

            $em = $this->getDoctrine()->getManager();
            $temps = $em->createQuery(
                "SELECT tmp FROM CantataMainBundle:Temp tmp WHERE tmp.id IN $str")
                ->getResult();

            foreach($temps as $tmp)
            {
                $em->remove($tmp);
            }
            $em->flush();
            return array('status' => 'success');
        }
        else
        {
            return array('status' => 'warning');
        }

    }
}