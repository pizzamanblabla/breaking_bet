<?php

namespace AppBundle\Service\Parser\External;

use GuzzleHttp\Psr7\Request;

interface AssemblerInterface
{
    /**
     * @return Request
     */
    public function assemble();
}