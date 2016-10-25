<?php

namespace AppBundle\Interaction\Assembler;

interface AssemblerInterface
{
    /**
     * @param string $serviceId
     * @return mixed
     */
    public function assemble($serviceId);
}