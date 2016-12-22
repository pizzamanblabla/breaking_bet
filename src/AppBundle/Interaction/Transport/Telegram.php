<?php

namespace AppBundle\Interaction\Transport;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;

class Telegram implements TransportInterface
{
    /**
     * {@inheritdoc}
     */
    public function dispatch(ApiRequestInterface $request)
    {
        // TODO: Implement dispatch() method.
    }
}
