<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Event
{
    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("externalId")
     */
    private $externalId;

    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     */
    private $date;

    /**
     * @var Bet
     *
     * @Assert\Type("object")
     *
     * @Serializer\Type("BreakingBetBundle\Operation\Bet\Update\Dto\Response\Bet")
     */
    private $bet;

    /**
     * @var Team[]
     *
     * @Assert\Type("array")
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Update\Dto\Response\Team>")
     */
    private $teams = [];

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
     * @return Bet
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * @param Bet $bet
     * @return Event
     */
    public function setBets(Bet $bet)
    {
        $this->bet = $bet;
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