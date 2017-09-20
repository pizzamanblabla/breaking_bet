<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Chain
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
     * @var Event[]
     *
     * @Assert\Type("array")
     *
     * @Serializer\Type("array<BreakingBetBundle\Operation\Bet\Update\Dto\Response\Event>")
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