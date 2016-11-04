<?php

namespace AppBundle\Interaction\Protocol;

use Psr\Http\Message\RequestInterface;

interface ProtocolInterface
{
    /**
     * @param RequestInterface $request
     */
    public function send(RequestInterface $request);
}