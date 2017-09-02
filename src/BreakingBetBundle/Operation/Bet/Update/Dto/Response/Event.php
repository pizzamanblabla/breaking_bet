<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

class Event
{
    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $date;

    /**
     * @var Bet[]
     */
    private $bets;

    /**
     * @var Team[]
     */
    private $teams;

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Event
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Bet[]
     */
    public function getBets()
    {
        return $this->bets;
    }

    /**
     * @param Bet[] $bets
     * @return Event
     */
    public function setBets(array $bets)
    {
        $this->bets = $bets;
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
     * @return Event
     */
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
        return $this;
    }
}