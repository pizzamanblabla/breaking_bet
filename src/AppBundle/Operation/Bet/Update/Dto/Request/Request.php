<?php

namespace AppBundle\Operation\Bet\Update\Dto\Request;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

class Request implements ApiRequestInterface
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