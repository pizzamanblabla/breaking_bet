<?php

namespace BreakingBetBundle\DataMigrator;

use BreakingBetBundle\Entity\Bet as BetEntity;
use BreakingBetBundle\Entity\Coefficient as CoefficientEntity;
use BreakingBetBundle\Entity\CoefficientType as CoefficientTypeEntity;


class Coefficient extends BaseDataMigrator
{
    /**
     * @var BetEntity
     */
    private $bet;

    /**
     * @var CoefficientTypeEntity
     */
    private $coefficientType;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $ps;

    /**
     * @return CoefficientEntity
     */
    public function migrate()
    {
        $entity = (new CoefficientEntity())
            ->setDate($this->date)
            ->setBet($this->bet)
            ->setPs($this->ps)
            ->setValue($this->value)
            ->setCoefficientType($this->coefficientType)
        ;

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        return $entity;
    }

    /**
     * @param BetEntity $bet
     * @return Coefficient
     */
    public function setBet($bet)
    {
        $this->bet = $bet;
        return $this;
    }

    /**
     * @param CoefficientTypeEntity $coefficientType
     * @return Coefficient
     */
    public function setCoefficientType($coefficientType)
    {
        $this->coefficientType = $coefficientType;
        return $this;
    }

    /**
     * @param \DateTime $date
     * @return Coefficient
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
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
     * @param float $ps
     * @return Coefficient
     */
    public function setPs($ps)
    {
        $this->ps = $ps;
        return $this;
    }

}