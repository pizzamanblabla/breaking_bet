<?php

namespace BreakingBetBundle\Internal\Sanitizer;

interface SanitizerInterface
{
    /**
     * @param string $data
     * @return string
     */
    public function sanitize(string $data): string;
}