<?php

namespace AppBundle\ServiceConfig;

interface ServiceConfigInterface
{
    /**
     * @param string $serviceId
     * @return string
     */
    public function getBaseUrl($serviceId);

    /**
     * @param string $serviceId
     * @return string[]
     */
    public function getProxy($serviceId);

    /**
     * @param string $serviceId
     * @return string[]
     */
    public function getQueryParameters($serviceId);

    /**
     * @param string $serviceId
     * @return string
     */
    public function getServiceName($serviceId);
}