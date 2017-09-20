<?php

namespace BreakingBetBundle\Interaction\DataExtractor\HttpRequest;

use BreakingBetBundle\Internal\DataExtractor\DataExtractorInterface;
use BreakingBetBundle\Internal\PayloadModifier\PayloadModifierInterface;
use Psr\Http\Message\RequestInterface;

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
    private function extractFromResponse(RequestInterface $httpRequest)
    {
        return
            $this->decoratedDataExtractor->extract(
                $this->payloadModifier->modify((string) $httpRequest->getBody())
            );
    }
}