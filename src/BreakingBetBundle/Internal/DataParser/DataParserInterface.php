<?php

namespace BreakingBetBundle\Internal\DataParser;

interface DataParserInterface
{
    /**
     * @param $data
     * @return array
     */
    public function parse($data): array;
}