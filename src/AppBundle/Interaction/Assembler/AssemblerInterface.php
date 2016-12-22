<?php

namespace AppBundle\Interaction\Assembler;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use Psr\Http\Message\RequestInterface;

interface AssemblerInterface
{
    /**
     * @param ApiRequestInterface $request
     * @return RequestInterface
     */
    public function assemble(ApiRequestInterface $request);
}
