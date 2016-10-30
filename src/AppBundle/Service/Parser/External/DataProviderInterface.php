<?php

namespace AppBundle\Service\Parser\External;

interface DataProviderInterface
{
    /**
     * @return mixed[]
     */
    public function provide();
}