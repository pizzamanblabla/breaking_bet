<?php

namespace BreakingBetBundle\Internal\PayloadModifier;

interface PayloadModifierInterface
{
    /**
     * @param mixed $modifiable
     * @return mixed
     */
    public function modify($modifiable);
}