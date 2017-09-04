<?php

namespace BreakingBetBundle\Internal\DataCorrector;

final class Composite implements DataCorrectorInterface
{
    /**
     * @var DataCorrectorInterface[]
     */
    private $container;

    /**
     * @param DataCorrectorInterface[] $container
     */
    public function __construct(array $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function correct(array $data): array
    {
        return
            array_reduce(
                $this->container,
                function (array $merged, DataCorrectorInterface $dataCorrector) use ($data) {
                    return array_merge($merged, $dataCorrector->correct($data));
                },
                []
            );
    }
}