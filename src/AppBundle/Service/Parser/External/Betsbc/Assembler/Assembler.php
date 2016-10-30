<?php

namespace AppBundle\Service\Parser\External\Betbc\Assembler;

use AppBundle\Service\Parser\External\AssemblerInterface;
use AppBundle\ServiceConfig\ServiceConfigInterface;
use GuzzleHttp\Psr7\Request;

class Assembler implements AssemblerInterface
{
    /**
     * @var ServiceConfigInterface
     */
    private $config;

    /**
     * @var string
     */
    private $serviceId;

    /**
     * Assembler constructor.
     * @param ServiceConfigInterface $config
     */
    public function __construct(ServiceConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function assemble()
    {
        return
            new Request(
                'GET',
                $this->config->getBaseUrl($this->serviceId),
                [],
                $this->config->getQueryParameters($this->serviceId)
            );
    }
}