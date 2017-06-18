<?php

namespace BreakingBetBundle\Interaction\DataExtractor\Request;

use BreakingBetBundle\Interaction\DataExtractor\DataExtractorInterface;
use Symfony\Component\HttpFoundation\Request;

class JsonDataExtractor implements DataExtractorInterface
{
    /**
     * @param Request $data
     * @return string[]
     */
    public function extract($data)
    {
        return json_decode($data->getContent($data), true);
    }
}