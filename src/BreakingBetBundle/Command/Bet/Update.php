<?php

namespace BreakingBetBundle\Command\Bet;

use BreakingBetBundle\Command\BaseCommand;
use BreakingBetBundle\Entity\Repository\RepositoryFactoryInterface;
use BreakingBetBundle\Entity\Source;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

final class Update extends BaseCommand
{
    /**
     * @var RepositoryFactoryInterface
     */
    private $repositoryFactory;

    /**
     * @param ServiceInterface $service
     * @param RepositoryFactoryInterface $repositoryFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        ServiceInterface $service,
        RepositoryFactoryInterface $repositoryFactory,
        LoggerInterface $logger
    ) {
        parent::__construct($service, $logger);

        $this->repositoryFactory = $repositoryFactory;
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
                'source',
                '-s',
                InputOption::VALUE_REQUIRED,
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
        return (new Request())->setSource($this->findSource($input->getOption('source')));
    }

    /**
     * @param string $name
     * @return Source
     * @throws Exception
     */
    private function findSource(string $name): Source
    {
        $source = $this->repositoryFactory->source()->findOneByName($name);

        if (is_null($source)) {
            throw new Exception('Provided source not found');
        }

        return $source;
    }
}
