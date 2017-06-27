<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Enumeration\ResponseType;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class Json implements TransformerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * @param NormalizerInterface $normalizer
     */
    public function __construct(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
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