<?php

namespace AppBundle\Interaction\Transformer\Response;

use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Internal\Enum\ResponseType;
use Symfony\Component\HttpFoundation\JsonResponse;

class Transformer implements TransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform(ApiResponseInterface $request)
    {
        return
            new JsonResponse(
                [
                    'type' => ResponseType::SUCCESSFUL,
                    'data' => $this->transformToArray($request),
                ]
            );
    }

    /**
     * @param mixed $target
     * @return string[]
     */
    public function transformToArray($target)
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
                        $transformed = [$property => $this->transformToArray($target->$getMethod())];
                    } elseif (is_array($target->$getMethod())) {
                        $collection = [];

                        foreach ($target->$getMethod() as $object) {
                            $collection[] = $this->transformToArray($object);
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