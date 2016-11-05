<?php

namespace AppBundle\DataMigrator;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

abstract class BaseDataMigrator implements DataMigratorInterface
{
    use ContainerAwareTrait;

    /**
     * Resolver constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container);
    }

    /**
     * @return mixed
     */
    protected function getDoctrine()
    {
        if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->container->get('doctrine');
    }
}