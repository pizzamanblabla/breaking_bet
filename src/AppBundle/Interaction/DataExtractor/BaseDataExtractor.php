<?php

namespace AppBundle\Interaction\DataExtractor;

abstract class BaseDataExtractor implements DataExtractorInterface
{
    /**
     * @var DataExtractorInterface
     */
    protected $dataExtractor;

    /**
     * @param DataExtractorInterface $dataExtractor
     */
    public function __construct(DataExtractorInterface $dataExtractor)
    {
        $this->dataExtractor = $dataExtractor;
    }
}