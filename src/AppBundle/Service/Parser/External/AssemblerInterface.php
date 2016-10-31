<?php

namespace AppBundle\Service\Parser\External;

use GuzzleHttp\Psr7\Request;

interface AssemblerInterface
{
    /**
     * @param string $serviceId
     * @return Request
     */
    public function assemble($serviceId);
}