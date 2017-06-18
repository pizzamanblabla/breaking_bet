<?php

namespace BreakingBetBundle\Interaction\Request;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getServiceId();

    /**
     * @param string $serviceId
     * @return RequestInterface
     */
    public function setServiceId($serviceId);
}
