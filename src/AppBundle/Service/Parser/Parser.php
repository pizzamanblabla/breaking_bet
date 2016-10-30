<?php

namespace AppBundle\Service\Parser;

use AppBundle\Service\Parser\External\Factory\FactoryInterface;

class Parser implements ParserInterface
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
    public function parse($serviceId)
    {
        $response = $this->factory->dataProvider($serviceId)->provide();

        $this->factory->resolver($serviceId)->resolve($response);
    }
}