<?php

namespace BreakingBetBundle\Source;

use BreakingBetBundle\Command\BaseCommand;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use Symfony\Component\Console\Input\InputInterface;

final class Add extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createRequest(InputInterface $input): InternalRequestInterface
    {
        // TODO: Implement createRequest() method.
    }
}