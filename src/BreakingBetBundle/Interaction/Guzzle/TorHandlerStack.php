<?php

namespace BreakingBetBundle\Interaction\Guzzle;

use GuzzleHttp\HandlerStack;
use GuzzleTor\Middleware;

final class TorHandlerStack extends HandlerStack
{
    /**
     * @param callable|null $handler
     */
    public function __construct(callable $handler = null)
    {
        parent::__construct(Middleware::tor());
    }
}