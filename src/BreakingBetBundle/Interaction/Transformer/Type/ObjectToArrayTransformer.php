<?php

namespace BreakingBetBundle\Interaction\Transformer\Type;

class ObjectToArrayTransformer implements TransformerInterface
{
    /**
     * @param mixed $target
     * @return mixed[]
     */
    public function transform($target)
    {
        return
            array_reduce(
                get_class_methods($target),
                function($merged, $getMethod) use ($target) {
                    if (!preg_match('/get/', $getMethod)) {
                        return $merged;
                    }

                    $property = mb_strtolower(preg_replace('/get/', '', $getMethod));

                    if (is_object($target->$getMethod())) {
                        $transformed = [$property => $this->transform($target->$getMethod())];
                    } elseif (is_array($target->$getMethod())) {
                        $collection = [];

                        foreach ($target->$getMethod() as $object) {
                            $collection[] = $this->transform($object);
                        }

                        $transformed = [$property => $collection];
                    } else {
                        $transformed = [$property => $target->$getMethod()];
                    }

                    return array_merge($merged, $transformed);
                },
                []
            );
    }
}