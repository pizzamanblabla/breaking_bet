<?php

namespace BreakingBetBundle\Operation\Bet\Get\Dto\Response;

class Bet
{
    /**
     * @var string
     */
    private $sport;

    /**
     * @var string
     */
    private $chain;

    /**
     * @var string
     */
    private $event;

    /**
     * @var string
     */
    private $team;

    /**
     * @var Coefficient[]
     */
    private $coefficients;

    /**
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * @param string $sport
     * @return Bet
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }

    /**
     * @return string
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param string $chain
     * @return Bet
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $event
     * @return Bet
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return string
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param string $team
     * @return Bet
     */
    public function setTeam($team)
    {
        $this->team = $team;
        return $this;
    }

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
    public function setCoefficients($coefficients)
    {
        $this->coefficients = $coefficients;
        return $this;
    }
}