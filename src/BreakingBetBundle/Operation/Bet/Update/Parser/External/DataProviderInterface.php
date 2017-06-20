<?php

namespace BreakingBetBundle\Service\Parser\External;

interface DataProviderInterface
{
    /**
     * @param string $serviceId
     * @return mixed[]
     */
    public function provide($serviceId);
}