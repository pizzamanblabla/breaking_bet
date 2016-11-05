<?php

namespace AppBundle\Service\Parser\External;

use AppBundle\DataMigrator\Factory\DataMigratorFactoryInterface;
use AppBundle\Helper\Finder\Finder;

abstract class BaseResolver implements ResolverInterface
{
    /**
     * @var Finder
     */
    protected $finder;

    /**
     * @var
     */
    protected $migrator;

    /**
     * Resolver constructor.
     * @param DataMigratorFactoryInterface $migrator
     * @param Finder $finder
     */
    public function __construct(DataMigratorFactoryInterface $migrator, Finder $finder)
    {
        $this->migrator = $migrator;
        $this->finder = $finder;
    }
}