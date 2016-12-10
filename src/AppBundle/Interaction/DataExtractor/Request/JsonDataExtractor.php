<?php

namespace AppBundle\Interaction\DataExtractor\Request;

use AppBundle\Interaction\DataExtractor\DataExtractorInterface;
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