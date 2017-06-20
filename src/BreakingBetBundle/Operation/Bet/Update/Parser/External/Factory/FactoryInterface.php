<?php

namespace BreakingBetBundle\Service\Parser\External\Factory;

use BreakingBetBundle\Service\Parser\External\AssemblerInterface;
use BreakingBetBundle\Service\Parser\External\DataProviderInterface;
use BreakingBetBundle\Service\Parser\External\ResolverInterface;

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