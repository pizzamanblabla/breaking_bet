<?php

namespace AppBundle\Service\Parser\External\Betsbc\DataProvider;

use AppBundle\Interaction\Protocol\ProtocolInterface;
use AppBundle\Service\Parser\External\AssemblerInterface;
use AppBundle\Service\Parser\External\DataProviderInterface;
use AppBundle\ServiceConfig\ServiceConfig;
use AppBundle\ServiceConfig\ServiceConfigInterface;
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