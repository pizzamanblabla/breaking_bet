<?php

namespace AppBundle\Command;

use AppBundle\Interaction\Request\Request;
use AppBundle\Internal\Service\ServiceInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BetUpdateCommand extends Command
{
    use LoggerAwareTrait;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @param ServiceInterface $service
     * @param LoggerInterface $logger
     */
    public function __construct(ServiceInterface $service, LoggerInterface $logger)
    {
        parent::__construct();

        $this->setLogger($logger);
        $this->service = $service;
    }

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
                'Who do you want to greet?',
                'all'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->logger->info('Starting bets update');
            $this->service->behave((new Request())->setServiceId('betsbc'));

        } catch (\Exception $e) {
            $this->logger->error(
                'An error occurred while executing updating bets',
                [
                    'exception' => $e,
                ]
            );

            return 1;
        }

        $this->logger->info('Bets updating finished');

        return 0;
    }
}
