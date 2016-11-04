<?php

namespace AppBundle\Service\Parser\External;

use AppBundle\Helper\Finder\Finder;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

abstract class BaseResolver implements ResolverInterface
{
    use ContainerAwareTrait;

    /**
     * @var Finder
     */
    protected $finder;

    /**
     * Resolver constructor.
     * @param Container $container
     * @param Finder $finder
     */
    public function __construct(Container $container, Finder $finder)
    {
        $this->setContainer($container);
        $this->finder = $finder;
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