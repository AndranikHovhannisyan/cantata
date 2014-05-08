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
}
