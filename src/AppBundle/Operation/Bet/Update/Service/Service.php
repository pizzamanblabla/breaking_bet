<?php

namespace AppBundle\Operation\Bet\Update\Service;

use AppBundle\Interaction\Dto\Request\ApiRequestInterface;
use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Dto\Response\EmptySuccessfulResponse;
use AppBundle\Internal\Service\ServiceInterface;
use AppBundle\Operation\Bet\Update\Dto\Request\Request;
use AppBundle\Service\Parser\External\Factory\FactoryInterface;
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
