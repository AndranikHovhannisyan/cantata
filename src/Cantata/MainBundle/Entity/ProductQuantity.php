<?php

namespace Cantata\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ProductQuantity
 * @package Cantata\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="product_quantity")
 *
 */
class ProductQuantity
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="prod_id", referencedColumnName="id")
     */
    protected $prod;

    /**
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(name="year", type="integer")
     */
    protected $year;

    /**
     * @ORM\Column(name="month", type="integer")
     */
    protected $month;

    /**
     * @ORM\Column(name="shop", type="string", length=25)
     */
    protected $shop;

    /**
     * @ORM\Column(name="type", type="string", length=20)
     */
    protected $type;


    public function __toString()
    {
        return $this->prod->__toString();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return ProductQuantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return ProductQuantity
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set month
     *
     * @param integer $month
     * @return ProductQuantity
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return integer 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set shop
     *
     * @param string $shop
     * @return ProductQuantity
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return string 
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set prod
     *
     * @param \Cantata\MainBundle\Entity\product $prod
     * @return ProductQuantity
     */
    public function setProd(\Cantata\MainBundle\Entity\product $prod = null)
    {
        $this->prod = $prod;

        return $this;
    }

    /**
     * Get prod
     *
     * @return \Cantata\MainBundle\Entity\product 
     */
    public function getProd()
    {
        return $this->prod;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ProductQuantity
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
