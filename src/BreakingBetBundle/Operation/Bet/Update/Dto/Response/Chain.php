<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

class Chain
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
     * @var Event[]
     */
    private $events;

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Chain
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
     * @return Chain
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Event[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Event[] $events
     * @return Chain
     */
    public function setEvents(array $events)
    {
        $this->events = $events;
        return $this;
    }
}