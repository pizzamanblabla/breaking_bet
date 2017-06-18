<?php

namespace BreakingBetBundle\Service\Parser\External;

interface ResolverInterface
{
    /**
     * @param mixed[] $data
     */
    public function resolve(array $data);
}