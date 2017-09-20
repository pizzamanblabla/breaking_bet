<?php

namespace BreakingBetBundle\Command;

use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

abstract class BaseCommand extends Command
{
    use LoggerAwareTrait;

    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * @param ServiceInterface $service
     * @param LoggerInterface $logger
     */
    public function __construct(
        ServiceInterface $service,
        LoggerInterface $logger
    ) {
        parent::__construct();
        $this->setLogger($logger);
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->logger->info('Transforming input to internal request');
            $this->service->behave($this->createRequest($input));
        } catch (Throwable $e) {
            $this->logger->error(
                'An error occurred while parsing :exception',
                [
                    ':exception' => $e,
                ]
            );
            return 1;
        }

        $this->logger->info('Completed');
        $output->writeln([
            '==================',
            'Command completed!',
            '==================',
        ]);

        return 0;
    }

    /**
     * @param InputInterface $input
     * @return InternalRequestInterface
     */
    abstract protected function createRequest(InputInterface $input): InternalRequestInterface;
}