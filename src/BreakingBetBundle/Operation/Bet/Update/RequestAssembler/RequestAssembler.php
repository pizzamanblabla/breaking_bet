<?php

namespace BreakingBetBundle\Operation\Bet\Update\RequestAssembler;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\RequestAssembler\RequestAssemblerInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request as DtoRequest;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

final class RequestAssembler implements RequestAssemblerInterface
{
    /**
     * @var string
     */
    private $method;

    /**
     * @param string $method
     */
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    /**
     * @param InternalRequestInterface|DtoRequest $request
     * @return RequestInterface
     */
    public function assemble(InternalRequestInterface $request): RequestInterface
    {
        return
            new Request(
                $this->method,
                $request->getSource()->getUrl(),
                $request->getSource()->getMeta()
            );
    }
}