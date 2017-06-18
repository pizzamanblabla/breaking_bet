<?php

namespace BreakingBetBundle\Interaction\DataExtractor;

class DataExtractorComposite implements DataExtractorInterface
{
    /**
     * @var DataExtractorInterface[]
     */
    private $components;

    /**
     * @param DataExtractorInterface[] $components
     */
    public function __construct(array $components)
    {
        $this->components = $components;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($data)
    {
        return
            array_reduce(
                $this->components,
                function (array $merged, DataExtractorInterface $extractor) use ($data) {
                    return array_merge($merged, $extractor->extract($data));
                },
                []
            );
    }
}