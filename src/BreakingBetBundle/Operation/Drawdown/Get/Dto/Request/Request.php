<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Request;

use BreakingBetBundle\Entity\Chain;
use BreakingBetBundle\Entity\Event;
use BreakingBetBundle\Entity\Kind;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use DateInterval;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Request implements InternalRequestInterface
{
    /**
     * @var float
     *
     * @Assert\Type("float")
     * @Assert\NotNull()
     *
     * @Serializer\Type("float")
     */
    private $minDifferenceValue;

    /**
     * @var DateInterval
     */
    private $timeSpan;

    /**
     * @var Kind
     */
    private $kind;

    /**
     * @var Chain
     */
    private $chain;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var string
     *
     * @Assert\Type("string")
     *
     * @Serializer\Type("string")
     */
    private $coefficientType;

    /**
     * @var int
     *
     * @Assert\Type("int")
     * @Assert\NotNull()
     *
     * @Serializer\Type("int")
     */
    private $maxResults;

    /**
     * @return float
     */
    public function getMinDifferenceValue()
    {
        return $this->minDifferenceValue;
    }

    /**
     * @param float $minDifferenceValue
     * @return Request
     */
    public function setMinDifferenceValue(float $minDifferenceValue)
    {
        $this->minDifferenceValue = $minDifferenceValue;
        return $this;
    }

    /**
     * @return DateInterval
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * @param DateInterval $timeSpan
     * @return Request
     */
    public function setTimeSpan(DateInterval $timeSpan)
    {
        $this->timeSpan = $timeSpan;
        return $this;
    }

    /**
     * @return Kind
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param Kind $kind
     * @return Request
     */
    public function setKind(Kind $kind)
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * @return Chain
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * @param Chain $chain
     * @return Request
     */
    public function setChain(Chain $chain)
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
     * @return Request
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param int $maxResults
     * @return Request
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoefficientType()
    {
        return $this->coefficientType;
    }

    /**
     * @param string $coefficientType
     * @return Request
     */
    public function setCoefficientType($coefficientType)
    {
        $this->coefficientType = $coefficientType;
        return $this;
    }
}