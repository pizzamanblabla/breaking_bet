<?php

namespace BreakingBetBundle\Internal\DataCorrector;

interface DataCorrectorInterface
{
    /**
     * @param mixed[] $data
     * @return mixed[]
     */
    public function correct(array $data): array;
}