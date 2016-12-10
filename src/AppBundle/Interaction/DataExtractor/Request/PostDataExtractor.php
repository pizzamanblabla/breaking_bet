<?php

namespace AppBundle\Interaction\DataExtractor\Request;

use AppBundle\Interaction\DataExtractor\DataExtractorInterface;
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