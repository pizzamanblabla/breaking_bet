<?php

namespace BreakingBetBundle\Interaction\DataExtractor\Request;

use BreakingBetBundle\Interaction\DataExtractor\DataExtractorInterface;
use Symfony\Component\HttpFoundation\Request;

class PostDataExtractor implements DataExtractorInterface
{
    /**
     * @param Request $data
     * @return string[]
     */
    public function extract($data)
    {
        return $data->request->all();
    }
}