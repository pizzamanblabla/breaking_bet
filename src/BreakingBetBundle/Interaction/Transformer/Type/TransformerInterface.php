<?php

namespace BreakingBetBundle\Interaction\Transformer\Type;

interface TransformerInterface
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function transform($data);
}