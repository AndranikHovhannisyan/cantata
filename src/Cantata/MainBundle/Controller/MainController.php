<?phpnamespace Cantata\MainBundle\Controller;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use Cantata\MainBundle\Entity\Product;use Cantata\MainBundle\Entity\ProductQuantity;use Cantata\MainBundle\Entity\Temp;use Cantata\MainBundle\Entity\PrixodRasxod;use Cantata\MainBundle\Form\ProductType;use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Response;use Symfony\Component\HttpFoundation\Request;use Cantata\MainBundle\EasyCSV\Reader;use Cantata\MainBundle\EasyCSV\Writer;use APY\DataGridBundle\Grid\Source\Entity;class MainController extends Controller{    /**     * @Route("/", name="homepage")     */    public function indexAction()    {        return $this->render('CantataMainBundle::layout.html.twig');    }    /**     * @Route("/add_prod_from_file", name="addProdFromFile")     */    public function addProductAction(Request $request)    {        $em = $this->getDoctrine()->getManager();        $form = $this->createFormBuilder()            ->setMethod('POST')            ->add('submitFile', 'file', array('required' => true))            ->add('add', 'submit')            ->getForm();        $form->handleRequest($request);        if ($form->isValid())        {            $file = $form->get('submitFile');            $upFile = $file->getData();            if ($upFile->guessExtension() != 'txt')            {                return new Response('Submit a CSV file');            }            $upFile->move('uploads/', 'temp.csv');            $reader = new Reader('uploads/temp.csv');            //var_dump($reader->getAll());            //$objects = array();            $arr = "(";            while ($row = $reader->getRow()) {                foreach($row as $value)                {                    $fields = explode(";", $value);                    if (isset($fields[0]) && isset($fields[1])                            && isset($fields[2]) && isset($fields[3])                            && $fields[0] != '' && $fields[1] != ''                            && $fields[2] != '' && $fields[3] != '')                    {                        $product = new Product();                        $product->setName($fields[0]);                        $product->setCode($fields[1]);                        $product->setCost($fields[2]);                        $product->setPrimeCost($fields[3]);                        $em->persist($product);                        //$objects[] = $product;                        $arr .= "'" . $fields[1] . "'" . ", ";                    }                }            }            $arr = substr($arr, 0, -2) . ")";            $products = $em->createQuery(                "SELECT product FROM CantataMainBundle:Product product                 WHERE product.code IN $arr                ")->getResult();            foreach($products as $prod)            {                $em->remove($prod);            }            $em->flush();            return $this->render("CantataMainBundle::layput.html.twig",                array('notifications' => 'Տվյալները մուտքագրված են'));        }        return $this->render('CantataMainBundle:Main:main.html.twig', array(            'form' => $form->createView(),        ));    }    /**     * @Route("/add_product_qantity_in_out", name="addProductQantityInOut")     */    public function astatkiAction(Request $request)    {        $em = $this->getDoctrine()->getManager();        $form = $this->createFormBuilder()            ->setMethod('POST')            ->add('date', 'date', array('required' => true, 'data' => new \DateTime()))            ->add('shop','choice', array('required' => true, 'choices' =>array(                'dalmaMall' => 'DalmaMall',                'erevanMall' => 'ErevanMall',                'amiryan' => 'Amiryan',            )))            ->add('isPrixod', 'choice', array('required' => true, 'choices' => array(                'productQuantity' => 'ProductQuantity',                'prixodRasxod' => 'PrixodRasxod',            )))            ->add('submitFile', 'file', array('required' => true))            ->add('add', 'submit')            ->getForm();        $form->handleRequest($request);        if ($form->isValid())        {            $temps = $em->createQuery("SELECT tmp FROM CantataMainBundle:Temp tmp")->getResult();            if (!empty($temps))            {                foreach($temps as $tmp)                {                    $em->remove($tmp);                }                $em->flush();            }            $file = $form->get('submitFile');            $upFile = $file->getData();            if ($upFile->guessExtension() != 'txt')            {                return new Response('Submit a CSV file');            }            $upFile->move('uploads/', 'temp.csv');            $reader = new Reader('uploads/temp.csv');            //var_dump($reader->getAll());            $objects = array();            while ($row = $reader->getRow()) {                foreach($row as $value)                {                    $fields = explode(";", $value);                    if (isset($fields[0]) && isset($fields[1])                            && $fields[0] != '' && $fields[1] != '')                    {                        $temp = new Temp();                        $temp->setCode($fields[0]);                        $temp->setQuantity($fields[1]);                        $objects[] = $temp;                    }                }            }            if (!empty($objects))            {                $month = $form->get('date')->getData()->format('m');                $year = $form->get('date')->getData()->format('Y');                $shop = $form->get('shop')->getData();                $isPrixod = $form->get('isPrixod')->getData();                $arr = "(";                foreach($objects as $obj)                {                    $arr .= "'{$obj->getCode()}', ";                }                $arr = substr($arr, 0, -2) . ")";                $prods = $em->createQuery(                    "SELECT prod FROM CantataMainBundle:Product prod                     WHERE prod.code IN $arr ")->getResult();                if ($isPrixod == 'prixodRasxod')                {                    $prixods = $em->createQuery(                        "SELECT prixod FROM CantataMainBundle:ProductQuantity prixod                                 JOIN prixod.prod prod                                 WHERE prixod.year = {$year} AND                                 prixod.month = {$month} AND                                 prixod.shop = '{$shop}' AND                                 prixod.type = 'prixodRasxod' AND                                 prod.code IN $arr")                        ->getResult();                }                if ($isPrixod == 'productQuantity')                {                    $codes = $em->createQuery(                        "SELECT prod.code FROM CantataMainBundle:ProductQuantity ostatki                                 JOIN ostatki.prod prod                                 WHERE ostatki.year = {$year} AND                                 ostatki.month = {$month} AND                                 ostatki.shop = '{$shop}' AND                                 ostatki.type = 'productQuantity' AND                                 prod.code IN $arr")                        ->getResult();                }                foreach($objects as $obj)                {                    foreach($prods as $pr)                    {                        if ($pr->getCode() == $obj->getCode()){                            $prod = $pr;                            break;                        }                    }                    if ($isPrixod == 'productQuantity' && !empty($codes) &&                            in_array(array("code" => $obj->getCode()), $codes))                    {                        unset($prod);                    }                    if (isset($prod))                    {                        if ($isPrixod == 'prixodRasxod')                        {                            foreach($prixods as $prix)                            {                                if ($prix->getProd() == $prod)                                {                                    $prixod = $prix;                                    $prixod->setQuantity($prixod->getQuantity() + $obj->getQuantity());                                    break;                                }                            }                        }                        if (!isset($prixod))                        {                            $prodQ = new ProductQuantity();                            $prodQ->setProd($prod);                            $prodQ->setQuantity($obj->getQuantity());                            $prodQ->setYear($year);                            $prodQ->setMonth($month);                            $prodQ->setShop($shop);                            $prodQ->setType($isPrixod);                            $em->persist($prodQ);                        }                        else                        {                            unset($prixod);                        }                        unset($prod);                    }                    else                    {                        $em->persist($obj);                    }                }                $em->flush();                /*$source = new Entity('CantataMainBundle:ProductQuantity');                $grid = $this->get('grid');                $grid->setSource($source);                return $grid->getGridResponse('CantataMainBundle::grid.html.twig');*/                return $this->render("CantataMainBundle::layput.html.twig",                    array('notifications' => 'Տվյալները մուտքագրված են'));            }            else            {                return new Response('<html>There are not any element in selected file</html>');            }        }        return $this->render('CantataMainBundle:Main:main.html.twig', array(            'form' => $form->createView(),        ));    }    /**     * @Route("/addProduct/{code}", defaults={"code" = 0})     */    public function addNewProductAction(Request $request, $code)    {        $em = $this->getDoctrine()->getManager();        $products = $em->createQuery("SELECT prod FROM CantataMainBundle:Product prod WHERE prod.code = '{$code}' ")            ->getResult();        if (empty($products))        {            $product = new Product();        }        else        {            $product = $products[0];        }        $form = $this->createForm(new ProductType(), $product);        $form->handleRequest($request);        if ($form->isValid()) {            // perform some action, such as saving the task to the database            $em->persist($product);            $em->flush();            return new Response('<html>Product is saved</html>');        }        return $this->render('CantataMainBundle:Main:main.html.twig', array(            'form' => $form->createView(),        ));    }    /**     * @Route("/get_response", name="getResponse")     */    public function otchyotAction(Request $request)    {        $form = $this->createFormBuilder()            ->setMethod('POST')            ->add('from', 'date', array('required' => true, 'data' => new \DateTime()))            ->add('to', 'date', array('required' => true, 'data' => new \DateTime()))            ->add('shop','choice', array('required' => true, 'choices' =>array(                'dalmaMall' => 'DalmaMall',                'erevanMall' => 'ErevanMall',                'amiryan' => 'Amiryan',                'all' => 'All'            )))            ->add('Ստանալ', 'submit')            ->getForm();        $form->handleRequest($request);        if ($form->isValid())        {            $em = $this->getDoctrine()->getManager();            $year1 = $form->get('from')->getData()->format('Y');            $month1 = $form->get('from')->getData()->format('m');            $year2 = $form->get('to')->getData()->format('Y');            $month2 = $form->get('to')->getData()->format('m');            $shop = $form->get('shop')->getData();            if ($shop == 'all'){                $arr = array('dalmaMall','erevanMall','amiryan');            }            else{                $arr = array($shop);            }            $nalichCost = 0;            $nalichPrimeCost = 0;            $prixodCost = 0;            $prixodPrimeCost = 0;            $ostatkiCost = 0;            $ostatkiPrimeCost = 0;            $vajarqCost = 0;            $vajarqPrimeCost = 0;            $ekamutItog = 0;            foreach($arr as $shop)            {                $nalichie = $em->createQuery(                    "SELECT prodQ, prod                     FROM CantataMainBundle:ProductQuantity prodQ                     JOIN prodQ.prod prod                     WHERE prodQ.year = $year1 AND prodQ.month = $month1                     AND prodQ.shop = '$shop' AND prodQ.type = 'productQuantity'")                    ->getResult();                $prixods = $em->createQuery(                    "SELECT prixod.quantity, prod.code                     FROM CantataMainBundle:ProductQuantity prixod                     JOIN prixod.prod prod                     WHERE prixod.year >= $year1 AND prixod.year <= $year2                     AND prixod.month >= $month1 AND prixod.month <= $month2                     AND prixod.shop = '$shop' AND prixod.type = 'prixodRasxod'")                    ->getResult();                $ostatki = $em->createQuery(                    "SELECT prodQ.quantity, prod.code                     FROM CantataMainBundle:ProductQuantity prodQ                     JOIN prodQ.prod prod                     WHERE prodQ.year = $year2 AND prodQ.month = $month2 AND prodQ.shop = '$shop'                     AND prodQ.type = 'productQuantity'")                    ->getResult();                $table = array();                foreach($nalichie as $pr)                {                    foreach($prixods as $prixod)                    {                        if ($prixod['code'] == $pr->getProd()->getCode())                        {                            $prixodQuantity = $prixod['quantity'];                            break;                        }                    }                    foreach($ostatki as $ostatok)                    {                        if ($ostatok['code'] == $pr->getProd()->getCode())                        {                            $ostatokQuantity = $ostatok['quantity'];                            break;                        }                    }                    if (!isset($prixodQuantity))                    {                        $prixodQuantity = 0;                    }                    if (!isset($ostatokQuantity))                    {                        $ostatokQuantity = 0;                    }                    $vajarq = $pr->getQuantity() + $prixodQuantity - $ostatokQuantity;                    $ekamut = $vajarq * ($pr->getProd()->getCost() - $pr->getProd()->getPrimeCost());                    $table[] = $this->writeTableRow($pr->getProd()->getName(), $pr->getQuantity(),                        $prixodQuantity, $ostatokQuantity, $vajarq, $pr->getProd()->getCost(),                        $pr->getProd()->getPrimeCost(), $ekamut);                    $nalichCost += $pr->getQuantity() *  $pr->getProd()->getCost();                    $nalichPrimeCost += $pr->getQuantity() *  $pr->getProd()->getPrimeCost();                    $prixodCost += $prixodQuantity *  $pr->getProd()->getCost();                    $prixodPrimeCost += $prixodQuantity *  $pr->getProd()->getPrimeCost();                    $ostatkiCost += $ostatokQuantity *  $pr->getProd()->getCost();                    $ostatkiPrimeCost += $ostatokQuantity *  $pr->getProd()->getPrimeCost();                    $vajarqCost += $vajarq *  $pr->getProd()->getCost();                    $vajarqPrimeCost += $vajarq *  $pr->getProd()->getPrimeCost();                    $ekamutItog += $ekamut;                    unset($prixodQuantity);                    unset($ostatokQuantity);                }            }            $table[] = $this->writeTableRow('vajarqi gnerov apranqy', $nalichCost, $prixodCost,                $ostatkiCost, $vajarqCost, "", "", $ekamutItog);            $table[] = $this->writeTableRow('inqnarjeqov apranqy', $nalichPrimeCost, $prixodPrimeCost,                $ostatkiPrimeCost, $vajarqPrimeCost, "", "", "");            return $this->render('CantataMainBundle:Main:main.html.twig', array('table' => $table));        }        return $this->render('CantataMainBundle:Main:main.html.twig',            array('form' => $form->createView(),        ));    }    public function writeTableRow($name, $count, $inOut, $now, $sale, $cost, $primeCost, $ekamut)    {        $tableRow = array();        $tableRow[] = $name;        $tableRow[] = $count;        $tableRow[] = $inOut;        $tableRow[] = $now;        $tableRow[] = $sale;        $tableRow[] = $cost;        $tableRow[] = $primeCost;        $tableRow[] = $ekamut;        return $tableRow;    }}