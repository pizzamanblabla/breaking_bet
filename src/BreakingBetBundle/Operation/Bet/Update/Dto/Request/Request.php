<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Request;

use BreakingBetBundle\Entity\Source;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;

class Request implements InternalRequestInterface
{
    /**
     * @var Source
     */
    private $source;

    /**
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Source $source
     * @return $this
     */
    public function setSource(Source $source)
    {
        $this->source = $source;
        return $this;
    }
}