<?php

namespace BreakingBetBundle\DataMigrator\Factory;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class DataMigratorFactory implements DataMigratorFactoryInterface
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
     * {@inheritdoc}
     */
    public function getSport()
    {
        return $this->create('Sport');
    }

    /**
     * {@inheritdoc}
     */
    public function getTeam()
    {
        return $this->create('Team');
    }

    /**
     * {@inheritdoc}
     */
    public function getChain()
    {
        return $this->create('Chain');
    }

    /**
     * {@inheritdoc}
     */
    public function getEvent()
    {
        return $this->create('Event');
    }

    /**
     * {@inheritdoc}
     */
    public function getBet()
    {
        return $this->create('Bet');
    }

    /**
     * {@inheritdoc}
     */
    public function getCoefficientType()
    {
        return $this->create('CoefficientType');
    }

    /**
     * {@inheritdoc}
     */
    public function getCoefficient()
    {
        return $this->create('Coefficient');
    }

    /**
     * @param string $class
     * @return mixed
     */
    private function create($class) {
        $className = '\BreakingBetBundle\DataMigrator\\' . $class;

        return new $className($this->container);
    }
}