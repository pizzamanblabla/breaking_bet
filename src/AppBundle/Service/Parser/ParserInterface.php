<?php

namespace AppBundle\Service\Parser;

interface ParserInterface
{
    /**
     * @param string $serviceId
     * @return mixed
     */
    public function parse($serviceId);
}