<?php

namespace AppBundle\ServiceConfig;

use AppBundle\ServiceConfig\Exception\MissedElementException;
use AppBundle\ServiceConfig\Exception\ServiceNotFoundException;

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
        return $this->getValueOrThrowException($this->getConfig($serviceId), 'base_url');
    }

    /**
     * {@inheritdoc}
     */
    public function getProxy($serviceId)
    {
        return $this->getValueOrThrowException($this->getConfig($serviceId), 'proxy');
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryParameters($serviceId)
    {
        return http_build_query($this->getValueOrThrowException($this->getConfig($serviceId), 'query_parameters_map'));
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName($serviceId)
    {
        return $this->getValueOrThrowException($this->getConfig($serviceId), 'service_name');
    }

    /**
     * @param $serviceId
     * @return mixed
     * @throws ServiceNotFoundException
     */
    private function getConfig($serviceId)
    {
        if (!array_key_exists($serviceId, $this->config)) {
            throw new ServiceNotFoundException();
        }

        return $this->config[$serviceId];
    }

    /**
     * @param array $container
     * @param string $key
     * @param mixed $else
     * @return mixed
     */
    protected function getValueOrElse(array $container, $key, $else)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        return $else;
    }

    /**
     * @param array $container
     * @param $key
     * @return mixed
     * @throws MissedElementException
     */
    protected function getValueOrThrowException(array $container, $key)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        throw new MissedElementException(sprintf('Required parameter \'%s\' is missing', $key));
    }
}