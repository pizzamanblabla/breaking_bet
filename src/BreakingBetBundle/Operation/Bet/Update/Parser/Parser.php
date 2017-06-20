<?php

namespace BreakingBetBundle\Operation\Bet\Update\Parser;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptyInternalSuccessfulResponse;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use BreakingBetBundle\Service\Parser\External\Factory\FactoryInterface;

final class Parser implements ServiceInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * Parser constructor.
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request)
    {
        $response = $this->performOperation($request);

        $this->factory->resolver($request->getServiceId())->resolve($response);

        return new EmptyInternalSuccessfulResponse();
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return mixed[]
     */
    private function performOperation(InternalRequestInterface $request)
    {
        return $this->factory->dataProvider($request->getServiceId())->provide($request->getServiceId());
    }
}
