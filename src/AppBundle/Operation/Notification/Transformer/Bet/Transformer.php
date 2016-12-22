<?php

namespace AppBundle\Operation\Notification\Transformer\Bet;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Transformer\Internal\TransformerInterface;

class Transformer implements TransformerInterface
{
    /**
     * @param ApiResponseInterface $response
     * @return ApiRequestInterface
     */
    public function transform(ApiResponseInterface $response)
    {
        // TODO: Implement transform() method.
    }
}
