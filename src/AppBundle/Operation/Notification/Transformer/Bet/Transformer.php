<?php

namespace AppBundle\Operation\Notification\Transformer\Bet;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Transformer\Internal\TransformerInterface;
use AppBundle\Operation\Bet\Get\Dto\Response\ApiResponse;

class Transformer implements TransformerInterface
{
    /**
     * @param ApiResponseInterface|ApiResponse $response
     * @return ApiRequestInterface
     */
    public function transform(ApiResponseInterface $response)
    {
        // TODO: Implement transform() method.
    }
}
