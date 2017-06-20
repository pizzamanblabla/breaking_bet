<?php

namespace BreakingBetBundle\Interaction\Transformer\Request;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use Symfony\Component\HttpFoundation\Request;

interface TransformerInterface
{
    /**
     * @param Request $request
     * @return InternalRequestInterface
     */
    public function transform(Request $request);
}