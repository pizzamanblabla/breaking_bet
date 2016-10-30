<?php

namespace AppBundle\Service\Parser\External\Factory;

use AppBundle\Service\Parser\External\AssemblerInterface;
use AppBundle\Service\Parser\External\DataProviderInterface;
use AppBundle\Service\Parser\External\ResolverInterface;

interface FactoryInterface
{
    /**
     * @param string $serviceId
     * @return DataProviderInterface
     */
    public function dataProvider($serviceId);

    /**
     * @param string $serviceId
     * @return ResolverInterface
     */
    public function resolver($serviceId);

    /**
     * @param string $serviceId
     * @return AssemblerInterface
     */
    public function assembler($serviceId);
}