<?php

namespace BreakingBetBundle\Interaction\Transformer\Response;

use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class Html implements TransformerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var string
     */
    private $template;

    /**
     * @param NormalizerInterface $normalizer
     * @param string $template
     */
    public function __construct(NormalizerInterface $normalizer, string $template)
    {
        $this->normalizer = $normalizer;
        $this->template = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function transform(InternalResponseInterface $response): Response
    {
        return (new Response())->setContent($this->render($response));
    }

    /**
     * @param InternalResponseInterface $response
     * @return string
     */
    private function render(InternalResponseInterface $response): string
    {
        return
            $this->templating->render(
                $this->template,
                $this->normalizer->normalize($response)
            );
    }
}