<?php

namespace BreakingBetBundle\Service\Parser\External\Betsbc\DataProvider;

use BreakingBetBundle\Interaction\Protocol\ProtocolInterface;
use BreakingBetBundle\Service\Parser\External\AssemblerInterface;
use BreakingBetBundle\Service\Parser\External\DataProviderInterface;
use BreakingBetBundle\ServiceConfig\ServiceConfig;
use BreakingBetBundle\ServiceConfig\ServiceConfigInterface;
use GuzzleHttp\Psr7\Response;

class DataProvider implements DataProviderInterface
{
    /**
     * @var AssemblerInterface
     */
    private $assembler;

    /**
     * @var ProtocolInterface
     */
    private $protocol;

    /**
     * @var ServiceConfig
     */
    private $config;

    /**
     * DataProvider constructor.
     * @param AssemblerInterface $assembler
     * @param ProtocolInterface $protocol
     * @param ServiceConfigInterface $config
     */
    public function __construct(
        AssemblerInterface $assembler,
        ProtocolInterface $protocol,
        ServiceConfigInterface $config
    ) {
        $this->assembler = $assembler;
        $this->protocol = $protocol;
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function provide($serviceId)
    {
        $request = $this->assembler->assemble($serviceId);

        return
            json_decode(
                $this->protocol->send(
                    $request,
                    $this->createRequestOptions($serviceId)
                )->getBody()->getContents(),
                1
            );
    }

    private function createRequestOptions($serviceId)
    {
        return [
            'timeout'  => 30,
            'curl'  => [
                CURLOPT_PROXY => $this->config->getProxy($serviceId)['ip'],
                CURLOPT_PROXYPORT => $this->config->getProxy($serviceId)['port'],
            ]
        ];
    }
}