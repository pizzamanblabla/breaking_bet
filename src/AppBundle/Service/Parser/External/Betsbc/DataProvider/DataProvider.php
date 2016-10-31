<?php

namespace AppBundle\Service\Parser\External\Betbc\DataProvider;

use AppBundle\Interaction\Protocol\ProtocolInterface;
use AppBundle\Service\Parser\External\AssemblerInterface;
use AppBundle\Service\Parser\External\DataProviderInterface;

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
     * DataProvider constructor.
     * @param AssemblerInterface $assembler
     * @param ProtocolInterface $protocol
     */
    public function __construct(AssemblerInterface $assembler, ProtocolInterface $protocol)
    {
        $this->assembler = $assembler;
        $this->protocol = $protocol;
    }

    /**
     * @param string $serviceId
     * @return mixed[]
     */
    public function provide($serviceId)
    {
        $request = $this->assembler->assemble($serviceId);

        return $this->protocol->send($request);
    }
}