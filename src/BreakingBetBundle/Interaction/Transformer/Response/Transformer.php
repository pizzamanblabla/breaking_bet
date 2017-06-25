<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Enumeration\ResponseType;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Interaction\Transformer\Type\TransformerInterface as TransformerInterfaceType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Transformer implements TransformerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

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
    public function transform(InternalResponseInterface $response): Response
    {
        return
            new JsonResponse(
                [
                    'type' => ResponseType::SUCCESSFUL,
                    'data' => $this->normalizer->normalize($response),
                ]
            );
    }
}