<?php

namespace BreakingBetBundle\Interaction\RequestAssembler;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use Psr\Http\Message\RequestInterface;

interface RequestAssemblerInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return RequestInterface
     */
    public function assemble(InternalRequestInterface $request): RequestInterface;
}