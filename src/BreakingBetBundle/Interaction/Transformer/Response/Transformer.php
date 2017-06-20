<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Transformer\Type\TransformerInterface as TransformerInterfaceType;
use BreakingBetBundle\Internal\Enum\ResponseType;
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
    public function transform(InternalRequestInterface $request)
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