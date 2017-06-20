<?php

namespace BreakingBetBundle\Operation\Bet\Update\Service;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\EmptyInternalSuccessfulResponse;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use BreakingBetBundle\Service\Parser\External\Factory\FactoryInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

final class Service implements ServiceInterface
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
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        $response = $this->performOperation($request);

        $this->factory->resolver($request->getSource())->resolve($response);

        return new EmptyInternalSuccessfulResponse();
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return mixed[]
     */
    private function performOperation(InternalRequestInterface $request)
    {
        return $this->factory->dataProvider($request->getSource())->provide($request->getSource());
    }
}
