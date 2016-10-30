<?php

namespace AppBundle\Service\Parser\External\Betbc\DataProvider;

use AppBundle\Interaction\Assembler\AssemblerInterface;
use AppBundle\Interaction\Protocol\ProtocolInterface;
use AppBundle\Service\Parser\External\DataProviderInterface;

class DataProvider implements DataProviderInterface
{
    /**
     * @var AssemblerInterface $assembler
     */
    private $assembler;

    /**
     * @var ProtocolInterface
     */
    private $protocol;

    /**
     * @var string
     */
    private $serviceId;

    /**
     * DataProvider constructor.
     * @param AssemblerInterface $assembler
     * @param ProtocolInterface $protocol
     * @param string $serviceId
     */
    public function __construct($serviceId, AssemblerInterface $assembler, ProtocolInterface $protocol)
    {
        $this->assembler = $assembler;
        $this->protocol = $protocol;
        $this->serviceId = $serviceId;
    }

    /**
     * @return mixed[]
     */
    public function provide()
    {
        $response = $this->assembler->assemble($this->serviceId);

    }
}