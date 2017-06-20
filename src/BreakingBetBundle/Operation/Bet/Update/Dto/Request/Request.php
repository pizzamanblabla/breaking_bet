<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Request;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;

class Request implements InternalRequestInterface
{
    /**
     * @var string
     */
    private $source;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Request
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }
}