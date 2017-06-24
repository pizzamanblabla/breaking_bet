<?php

namespace BreakingBetBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coefficient
 *
 * @ORM\Table(name="coefficient")
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Coefficient")
 */
class Coefficient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="coefficient_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var Bet
     *
     * @ORM\ManyToOne(targetEntity="Bet")
     * @ORM\JoinColumn(name="bet_id", referencedColumnName="id", nullable=true)
     */
    private $bet;

    /**
     * @var string
     *
     * @ORM\Column(name="coefficient_type", type="coefficient_type", nullable=false)
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Coefficient
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Bet
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * @param Bet $bet
     * @return Coefficient
     */
    public function setBet(Bet $bet)
    {
        $this->bet = $bet;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoefficientType()
    {
        return $this->coefficientType;
    }

    /**
     * @param string $coefficientType
     * @return Coefficient
     */
    public function setCoefficientType($coefficientType)
    {
        $this->coefficientType = $coefficientType;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Coefficient
     */
    public function setDate(DateTime $date)
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

