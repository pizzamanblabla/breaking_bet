<?php

namespace AppBundle\Interaction\DataExtractor\Request;

use AppBundle\Interaction\DataExtractor\DataExtractorInterface;
use Symfony\Component\HttpFoundation\Request;

class GetDataExtractor implements DataExtractorInterface
{
    /**
     * @param Request $data
     * @return string[]
     */
    public function extract($data)
    {
        return $data->query->all();
    }
}