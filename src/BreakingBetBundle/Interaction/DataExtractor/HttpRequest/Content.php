<?php

namespace BreakingBetBundle\Interaction\DataExtractor\HttpRequest;

use BreakingBetBundle\Internal\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Internal\PayloadModifier\PayloadModifierInterface;
use Symfony\Component\HttpFoundation\Request;

final class Content implements DataExtractorInterface
{
    /**
     * @var DataExtractorInterface
     */
    private $decoratedDataExtractor;

    /**
     * @var PayloadModifierInterface
     */
    private $payloadModifier;

    /**
     * @param DataExtractorInterface $decoratedDataExtractor
     * @param PayloadModifierInterface $payloadModifier
     */
    public function __construct(
        DataExtractorInterface $decoratedDataExtractor,
        PayloadModifierInterface $payloadModifier
    ) {
        $this->decoratedDataExtractor = $decoratedDataExtractor;
        $this->payloadModifier = $payloadModifier;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($data): array
    {
        return $this->extractFromRequest($data);
    }

    /**
     * {@inheritdoc}
     */
    private function extractFromRequest(Request $httpRequest)
    {
        return json_decode($httpRequest->getContent(), 1);
    }
}