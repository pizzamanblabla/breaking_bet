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
                get_object_vars($target),
                function($merged, $property) use ($target) {
                    $getMethod = sprintf('get%s', ucfirst($property));

                    if (!method_exists($target, $getMethod)) {
                        return $merged;
                    }

                    if (is_object($target->$getMethod())) {
                        $transformed = [$property => $this->transformToArray($target->$getMethod())];
                    } else {
                        $transformed = [$property => $target->$getMethod()];
                    }

                    return array_merge($merged, $transformed);
                },
                []
            );
    }
}