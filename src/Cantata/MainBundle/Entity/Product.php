<?php
namespace Cantata\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORm;

/**
 * Class Product
 * @package Cantata\MainBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="code", type="string", length=20, nullable=false)
     */
    protected $code;

    /**
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="cost", type="float", nullable=false)
     */
    protected $cost;

    /**
     * @ORM\Column(name="prime_cost", type="float", nullable=false)
     */
    protected $primeCost;

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
     * @return Product
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Product
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set primeCost
     *
     * @param float $primeCost
     * @return Product
     */
    public function setPrimeCost($primeCost)
    {
        $this->primeCost = $primeCost;

        return $this;
    }

    /**
     * Get primeCost
     *
     * @return float
     */
    public function getPrimeCost()
    {
        return $this->primeCost;
    }
}
