<?php

namespace BreakingBetBundle\Operation\Bet\Update\Service;

use BreakingBetBundle\Interaction\Dto\Request\ApiRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\ApiResponseInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptySuccessfulResponse;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use BreakingBetBundle\Service\Parser\External\Factory\FactoryInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

class Service implements ServiceInterface
{
    use LoggerAwareTrait;

    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * Parser constructor.
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, LoggerInterface $logger)
    {
        $this->setLogger($logger);

        $this->factory = $factory;
    }

    /**
     * @param ApiRequestInterface|Request $request
     * @return ApiResponseInterface
     */
    public function behave(ApiRequestInterface $request)
    {
        $response = $this->performOperation($request);

        $this->factory->resolver($request->getSource())->resolve($response);

        return new EmptySuccessfulResponse();
    }

    /**
     * @param ApiRequestInterface|Request $request
     * @return mixed[]
     */
    private function performOperation(ApiRequestInterface $request)
    {
        return $this->factory->dataProvider($request->getSource())->provide($request->getSource());
    }
}
