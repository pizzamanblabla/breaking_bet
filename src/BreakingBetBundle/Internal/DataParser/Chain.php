<?php

namespace BreakingBetBundle\Internal\DataParser;

final class Chain implements DataParserInterface
{
    /**
     * @var DataParserInterface[]
     */
    private $container;

    /**
     * @param DataParserInterface[] $container
     */
    public function __construct(array $container)
    {
        $this->container = $container;
    }

    /**
     * @param $data
     * @return array
     */
    public function parse($data): array
    {
        foreach ($this->container as $dataParser) {
            $parsed = $dataParser->parse($data);

            if (count($parsed)) {
                return $parsed;
            }
        }

        return [];
    }
}