<?php

namespace BreakingBetBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Drawdown
 *
 * @ORM\Table(name="drawdown")
 * @ORM\Entity(repositoryClass="BreakingBetBundle\Entity\Repository\Drawdown")
 */
class Drawdown
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="drawdown_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="difference", type="float", precision=10, scale=0, nullable=false)
     */
    private $difference;

    /**
     * @var float
     *
     * @ORM\Column(name="min_difference", type="float", precision=10, scale=0, nullable=false)
     */
    private $minDifference;

    /**
     * @var Coefficient
     *
     * @ORM\ManyToOne(targetEntity="Coefficient")
     * @ORM\JoinColumn(name="coefficient_one_id", referencedColumnName="id", nullable=false)
     */
    private $coefficientOne;

    /**
     * @var Coefficient
     *
     * @ORM\ManyToOne(targetEntity="Coefficient")
     * @ORM\JoinColumn(name="coefficient_two_id", referencedColumnName="id", nullable=false)
     */
    private $coefficientTwo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Drawdown
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getDifference()
    {
        return $this->difference;
    }

    /**
     * @param float $difference
     * @return Drawdown
     */
    public function setDifference($difference)
    {
        $this->difference = $difference;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinDifference()
    {
        return $this->minDifference;
    }

    /**
     * @param float $minDifference
     * @return Drawdown
     */
    public function setMinDifference($minDifference)
    {
        $this->minDifference = $minDifference;
        return $this;
    }

    /**
     * @return Coefficient
     */
    public function getCoefficientOne()
    {
        return $this->coefficientOne;
    }

    /**
     * @param Coefficient $coefficientOne
     * @return Drawdown
     */
    public function setCoefficientOne(Coefficient $coefficientOne)
    {
        $this->coefficientOne = $coefficientOne;
        return $this;
    }

    /**
     * @return Coefficient
     */
    public function getCoefficientTwo()
    {
        return $this->coefficientTwo;
    }

    /**
     * @param Coefficient $coefficientTwo
     * @return Drawdown
     */
    public function setCoefficientTwo(Coefficient $coefficientTwo)
    {
        $this->coefficientTwo = $coefficientTwo;
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
     * @return Drawdown
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }
}

