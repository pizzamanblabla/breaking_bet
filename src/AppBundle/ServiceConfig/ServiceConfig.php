<?php

namespace AppBundle\ServiceConfig;

class ServiceConfig implements ServiceConfigInterface
{
    /**
     * @var mixed[]
     */
    private $config;

    /**
     * ServiceConfig constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl($serviceId)
    {
        // TODO: Implement getBaseUrl() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getProxy($serviceId)
    {
        // TODO: Implement getProxy() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryParameters($serviceId)
    {
        // TODO: Implement getQueryParameters() method.
    }

    /**
     * @param $serviceId
     * @return mixed
     */
    private function getConfig($serviceId)
    {

    }
}