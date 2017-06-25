<?php

namespace BreakingBetBundle\DataExtractor;

interface DataExtractorInterface
{
    /**
     * @param mixed $data
     * @return mixed[]
     */
    public function extract($data): array;
}