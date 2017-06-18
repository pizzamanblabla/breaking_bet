<?php

namespace BreakingBetBundle\Interaction\DataExtractor;

class AssertDataExtractorDecorator extends BaseDataExtractorDecorator
{
    /**
     * @var string
     */
    private $assertToEntity;

    /**
     * @param DataExtractorInterface $dataExtractor
     * @param string $assertToEntity
     */
    public function __construct(DataExtractorInterface $dataExtractor, $assertToEntity)
    {
        parent::__construct($dataExtractor);

        $this->assertToEntity = $assertToEntity;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($data)
    {
        assert($data instanceof $this->assertToEntity);

        return $this->dataExtractor->extract($data);
    }
}