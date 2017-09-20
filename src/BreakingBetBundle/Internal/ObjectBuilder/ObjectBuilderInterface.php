<?php

namespace BreakingBetBundle\Internal\ObjectBuilder;

interface ObjectBuilderInterface
{
    /**
     * @param object $object
     * @param mixed[] $data
     * @return mixed
     */
    public function build($object, array $data);
}