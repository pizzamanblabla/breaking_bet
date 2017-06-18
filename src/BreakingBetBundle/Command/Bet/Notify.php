<?php

namespace BreakingBetBundle\Command\Bet;

use BreakingBetBundle\Command\BaseCommand;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use Symfony\Component\Console\Input\InputInterface;

final class Notify extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('bets:notify')
            ->setDescription('Notify about coefficients')
        ;
    }

    /**
     * @param InputInterface $input
     * @return InternalRequestInterface
     */
    protected function createRequest(InputInterface $input): InternalRequestInterface
    {
        // TODO: Implement createRequest() method.
    }
}
