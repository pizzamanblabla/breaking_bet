<?php

namespace BreakingBetBundle\Service\Parser;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptySuccessfulResponse;
use BreakingBetBundle\Interaction\Request\Request;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Service\Parser\External\Factory\FactoryInterface;

class Parser implements ServiceInterface
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
     * @param ApiRequestInterface|Request $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        $response = $this->performOperation($request);

        $this->factory->resolver($request->getServiceId())->resolve($response);

        return new EmptySuccessfulResponse();
    }

    /**
     * @param ApiRequestInterface|Request $request
     * @return mixed[]
     */
    private function performOperation(ApiRequestInterface $request)
    {
        return $this->factory->dataProvider($request->getServiceId())->provide($request->getServiceId());
    }
}
