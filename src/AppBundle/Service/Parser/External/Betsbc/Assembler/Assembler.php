<?php

namespace AppBundle\Service\Parser\External\Betsbc\Assembler;

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
    public function assemble($serviceId)
    {
        return
            new Request(
                'GET',
                $this->config->getBaseUrl($serviceId) . '?' . $this->config->getQueryParameters($serviceId)

            );
    }
}