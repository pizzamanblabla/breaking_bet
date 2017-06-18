<?php

namespace BreakingBetBundle\Interaction\Transformer\Request;

use BreakingBetBundle\Common\Dto\Request\ApiRequestInterface;
use Symfony\Component\HttpFoundation\Request;

interface TransformerInterface
{
    /**
     * @param Request $request
     * @return ApiRequestInterface
     */
    public function transform(Request $request);
}