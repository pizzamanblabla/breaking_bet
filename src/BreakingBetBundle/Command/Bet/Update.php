<?php

namespace BreakingBetBundle\Command\Bet;

use BreakingBetBundle\Command\BaseCommand;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

final class Update extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('bets:update')
            ->setDescription('Updating bets')
            ->addOption(
                'service',
                '-s',
                InputOption::VALUE_OPTIONAL,
                'Who do you want to update?',
                'all'
            )
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
