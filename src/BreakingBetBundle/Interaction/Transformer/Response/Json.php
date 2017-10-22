<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Enumeration\ResponseType;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Json implements TransformerInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
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
                    'data' => json_decode($this->serializer->serialize($response, 'json'), 1),
                ]
            );
    }
}