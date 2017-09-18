<?php

namespace BreakingBetBundle\Operation\Drawdown\Calculate\Dto\Request;

use BreakingBetBundle\Entity\Kind;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;

class Request implements InternalRequestInterface
{
    /**
     * @var float
     */
    private $minDifferenceValue;

    /**
     * @var Kind
     */
    private $kind;

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
    public function setMinDifferenceValue($minDifferenceValue)
    {
        $this->minDifferenceValue = $minDifferenceValue;
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
}