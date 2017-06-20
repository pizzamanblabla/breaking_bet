<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use Symfony\Component\HttpFoundation\Response;

interface TransformerInterface
{
    /**
     * @param InternalResponseInterface $request
     * @return Response
     */
    public function transform(InternalResponseInterface $request);
}