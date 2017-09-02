<?php

namespace BreakingBetBundle\Interaction\DataParser;

interface DataParserInterface
{
    /**
     * @param $data
     * @return array
     */
    public function parse($data): array;
}