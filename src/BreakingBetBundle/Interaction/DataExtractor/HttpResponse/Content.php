<?php

namespace BreakingBetBundle\Interaction\DataExtractor\HttpResponse;

use BreakingBetBundle\Internal\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Internal\PayloadModifier\PayloadModifierInterface;
use Psr\Http\Message\ResponseInterface;

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
        return $this->extractFromResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    private function extractFromResponse(ResponseInterface $httpResponse)
    {
        return
            $this->decoratedDataExtractor->extract(
                $this->payloadModifier->modify((string) $httpResponse->getBody())
            );
    }
}