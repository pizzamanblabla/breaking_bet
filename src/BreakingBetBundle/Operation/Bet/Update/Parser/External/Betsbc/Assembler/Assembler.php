<?php

namespace BreakingBetBundle\Service\Parser\External\Betsbc\Assembler;

use BreakingBetBundle\Service\Parser\External\AssemblerInterface;
use BreakingBetBundle\ServiceConfig\ServiceConfigInterface;
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