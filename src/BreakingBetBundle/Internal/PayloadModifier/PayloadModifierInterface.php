<?php

namespace BreakingBetBundle\Internal\PayloadModifier;

interface PayloadModifierInterface
{
    /**
     * @param string $modifiable
     * @return mixed[]
     */
    public function modify(string $modifiable): array;
}