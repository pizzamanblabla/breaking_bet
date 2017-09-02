<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

class Coefficient
{
    /**
     * @var string
     */
    private $coefficientType;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $ps;

    /**
     * @var string
     */
    private $date;

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
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Coefficient
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPs()
    {
        return $this->ps;
    }

    /**
     * @param string $ps
     * @return Coefficient
     */
    public function setPs($ps)
    {
        $this->ps = $ps;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Coefficient
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}