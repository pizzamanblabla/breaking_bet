<?php

namespace AppBundle\Interaction\DataExtractor;

interface DataExtractorInterface
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function extract($data);
}