<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

class Bet
{
    /**
     * @var Coefficient[]
     */
    private $coefficients;

    /**
     * @var string
     */
    private $date;

    /**
     * @return Coefficient[]
     */
    public function getCoefficients()
    {
        return $this->coefficients;
    }

    /**
     * @param Coefficient[] $coefficients
     * @return Bet
     */
    public function setCoefficients(array $coefficients)
    {
        $this->coefficients = $coefficients;
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
     * @return Bet
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}