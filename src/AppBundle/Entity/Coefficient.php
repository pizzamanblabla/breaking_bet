<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coefficient
 *
 * @ORM\Table(name="coefficient")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Coefficient")
 */
class Coefficient extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="Bet")
     * @ORM\JoinColumn(name="bet_id", referencedColumnName="id", nullable=true)
     * @var Bet
     */
    private $bet;

    /**
     * @ORM\ManyToOne(targetEntity="CoefficientType")
     * @ORM\JoinColumn(name="coefficient_type_id", referencedColumnName="id", nullable=true)
     * @var CoefficientType
     */
    private $coefficientType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=10, scale=0, nullable=false)
     */
    private $value;

    /**
     * @var float
     *
     * @ORM\Column(name="ps", type="float", precision=10, scale=0, nullable=false)
     */
    private $ps;

    /**
     * @return mixed
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * @param mixed $bet
     * @return Coefficient
     */
    public function setBet($bet)
    {
        $this->bet = $bet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoefficientType()
    {
        return $this->coefficientType;
    }

    /**
     * @param mixed $coefficientType
     * @return Coefficient
     */
    public function setCoefficientType($coefficientType)
    {
        $this->coefficientType = $coefficientType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Coefficient
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Coefficient
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getPs()
    {
        return $this->ps;
    }

    /**
     * @param float $ps
     * @return Coefficient
     */
    public function setPs($ps)
    {
        $this->ps = $ps;
        return $this;
    }
}

