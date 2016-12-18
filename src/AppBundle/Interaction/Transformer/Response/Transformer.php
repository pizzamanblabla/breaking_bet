<?php

namespace AppBundle\Interaction\Transformer\Response;

use AppBundle\Interaction\Dto\Response\ApiResponseInterface;
use AppBundle\Interaction\Transformer\Type\TransformerInterface as TransformerInterfaceType;
use AppBundle\Internal\Enum\ResponseType;
use Symfony\Component\HttpFoundation\JsonResponse;

class Transformer implements TransformerInterface
{
    /**
     * @var TransformerInterfaceType
     */
    private $typeTransformer;

    /**
     * @param TransformerInterfaceType $typeTransformer
     */
    public function __construct(TransformerInterfaceType $typeTransformer)
    {
        $this->typeTransformer = $typeTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function transform(ApiResponseInterface $request)
    {
        return
            new JsonResponse(
                [
                    'type' => ResponseType::SUCCESSFUL,
                    'data' => $this->typeTransformer->transform($request),
                ]
            );
    }
}