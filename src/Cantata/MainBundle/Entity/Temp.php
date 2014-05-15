<?php

namespace Cantata\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Temp
 * @package Cantata\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="temp")
 */
class Temp
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id;
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="code", type="string", length=10)
     */
    protected $code;

    /**
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(name="year", type="integer")
     */
    protected $year;

    /**
     * @ORM\Column(name="mont", type="integer")
     */
    protected $month;

    /**
     * @ORM\Column(name="shop", type="string", length=15)
     */
    protected $shop;

    /**
     * @ORM\Column(name="is_prixod", type="string", length=20)
     */
    protected $isPrixod;

    /**
     * @ORM\Column(name="description", type="string", length=50)
     */
    protected $description;

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
     * Set code
     *
     * @param string $code
     * @return Temp
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Temp
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
     * @return Temp
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
     * @return Temp
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
     * @return Temp
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
     * Set isPrixod
     *
     * @param string $isPrixod
     * @return Temp
     */
    public function setIsPrixod($isPrixod)
    {
        $this->isPrixod = $isPrixod;

        return $this;
    }

    /**
     * Get isPrixod
     *
     * @return string 
     */
    public function getIsPrixod()
    {
        return $this->isPrixod;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Temp
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
