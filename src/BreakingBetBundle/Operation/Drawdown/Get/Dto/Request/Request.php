<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Dto\Request;

use BreakingBetBundle\Entity\Chain;
use BreakingBetBundle\Entity\Event;
use BreakingBetBundle\Entity\Kind;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use DateInterval;

class Request implements InternalRequestInterface
{
    /**
     * @var float
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
}