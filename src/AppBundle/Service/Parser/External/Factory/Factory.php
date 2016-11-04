<?php

namespace AppBundle\Service\Parser\External\Factory;

use AppBundle\ServiceConfig\ServiceConfig;
use AppBundle\ServiceConfig\ServiceConfigInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Factory implements FactoryInterface {

    /**
     * @var ServiceConfig
     */
    private $config;

    /**
     * @var Container
     */
    private $container;

    /**
     * Factory constructor.
     * @param ServiceConfigInterface $config
     * @param ContainerInterface $container
     */
    public function __construct(ServiceConfigInterface $config, ContainerInterface $container)
    {
        $this->config = $config;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function dataProvider($serviceId)
    {
        return $this->create($serviceId, 'data_provider');
    }

    /**
     * {@inheritdoc}
     */
    public function resolver($serviceId)
    {
        return $this->create($serviceId, 'resolver');
    }

    /**
     * {@inheritdoc}
     */
    public function assembler($serviceId)
    {
        return $this->create($serviceId, 'assembler');
    }

    /**
     * @param string $serviceId
     * @param string $class
     * @return mixed
     */
    private function create($serviceId, $class)
    {
        $className = sprintf(
            'parser.external.%s.%s',
            $class,
            $this->config->getServiceName($serviceId)
        );

        return $this->container->get($className);
    }
}
