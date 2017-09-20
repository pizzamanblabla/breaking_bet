<?php

namespace BreakingBetBundle\Interaction\Transformer\Internal;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;

interface TransformerInterface
{
    /**
     * @param InternalResponseInterface $response
     * @return InternalRequestInterface
     */
    public function transform(InternalResponseInterface $response);
}