<?php

namespace BreakingBetBundle\Internal\DataCorrector;

final class KeyReplacer implements DataCorrectorInterface
{
    /**
     * @var string[]
     */
    private $keysMap;

    /**
     * @param string[] $keysMap
     */
    public function __construct(array $keysMap)
    {
        $this->keysMap = $keysMap;
    }

    /**
     * {@inheritdoc}
     */
    public function correct(array $data): array
    {
        $correctedData = [];

        foreach ($data as $key => $value) {
            if (in_array($key, array_keys($this->keysMap)) && $key) {
                $correctedData[$this->keysMap[$key]] = $value;
            } elseif (is_array($value)) {
                $correctedData[$key] = $this->correct($value);
            } else {
                $correctedData[$key] = $value;
            }
        }

        return $correctedData;
    }
}