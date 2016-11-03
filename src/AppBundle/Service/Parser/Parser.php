<?php

namespace AppBundle\Service\Parser;

use AppBundle\Interaction\Request\RequestInterface;
use AppBundle\Service\Parser\External\Factory\FactoryInterface;
use AppBundle\Service\ServiceInterface;

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
     * {@inheritdoc}
     */
    public function behave(RequestInterface $request)
    {
        $response = $this->factory->dataProvider($request->getServiceId())->provide($request->getServiceId());

        $this->factory->resolver($request->getServiceId())->resolve($response);
    }
}
