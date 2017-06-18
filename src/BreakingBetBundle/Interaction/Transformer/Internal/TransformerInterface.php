<?php

namespace BreakingBetBundle\Interaction\Transformer\Internal;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;

interface TransformerInterface
{
    /**
     * @param ApiResponseInterface $response
     * @return ApiRequestInterface
     */
    public function transform(ApiResponseInterface $response);
}