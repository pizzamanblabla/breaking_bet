<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Response;

class Drawdown
{
    /**
     * @var string
     */
    private $kind;

    /**
     * @var string
     */
    private $chain;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var Team[]
     */
    private $teams;

    /**
     * @var Coefficient[]
     */
    private $coefficients;

    /**
     * @var float
     */
    private $difference;

    /**
     * @var string
     */
    private $date;

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return Drawdown
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
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
     * @return Drawdown
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
        return $this;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return Drawdown
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param Team[] $teams
     * @return Drawdown
     */
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
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
     * @return Drawdown
     */
    public function setCoefficients(array $coefficients)
    {
        $this->coefficients = $coefficients;
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
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Drawdown
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}