<?php

namespace AppBundle\Command;

use AppBundle\Internal\Service\ServiceInterface;
use AppBundle\Operation\Bet\Get\Dto\Request\ApiRequest;
use Exception;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BetNotifyCommand extends Command
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
            ->setName('bets:notify')
            ->setDescription('Notify about coefficients')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->logger->info('Composing request');
            $this->service->behave((new ApiRequest()));

        } catch (Exception $e) {
            $this->logger->error(
                'An error occurred while executing updating bets',
                [
                    'exception' => $e,
                ]
            );

            return 1;
        }

        $this->logger->info('Notifications sent');

        return 0;
    }
}
