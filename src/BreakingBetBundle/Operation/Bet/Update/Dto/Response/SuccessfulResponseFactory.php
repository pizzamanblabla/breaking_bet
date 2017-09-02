<?php

namespace BreakingBetBundle\Operation\Bet\Update\Dto\Response;

use BreakingBetBundle\Interaction\Dto\Response\ResponseFactoryInterface;

final class SuccessfulResponseFactory implements ResponseFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createResponse()
    {
        return new SuccessfulResponse();
    }
}