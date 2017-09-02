<?php

namespace BreakingBetBundle\Internal\DataExtractor;

use BreakingBetBundle\Internal\DataExtractor\Exception\DataExtractionException;

final class Blank implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($data): array
    {
        if (!is_array($data)) {
            throw new DataExtractionException('Income should be an array');
        }

        return $data;
    }
}