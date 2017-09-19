<?php

namespace BreakingBetBundle\Command\Drawdown;

use BreakingBetBundle\Command\BaseCommand;
use BreakingBetBundle\Entity\Kind;
use BreakingBetBundle\Entity\Repository\RepositoryFactoryInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Internal\Service\ServiceInterface;
use BreakingBetBundle\Operation\Drawdown\Calculate\Dto\Request\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Exception;

final class Calculate extends BaseCommand
{
    const DEFAULT_DIFFERENCE_VALUE = 0.3;

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
            ->setName('drawdown:calculate')
            ->setDescription('Calculating drawdowns')
            ->addOption(
                'difference',
                '-d',
                InputOption::VALUE_OPTIONAL,
                'What difference in coefficient we are looking for?',
                'all'
            )
            ->addOption(
                'kind',
                '-k',
                InputOption::VALUE_REQUIRED,
                'What kind of coefficient?',
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
        return
            (new Request())
                ->setMinDifferenceValue($this->resolveDifference($input->getOption('difference')))
                ->setKind($this->findKind($input->getOption('kind')))
            ;
    }

    /**
     * @param mixed $difference
     * @return float
     */
    private function resolveDifference($difference)
    {
        return
            !is_numeric($difference)
                ? $difference
                : self::DEFAULT_DIFFERENCE_VALUE
            ;
    }

    /**
     * @param int $id
     * @return Kind
     * @throws Exception
     */
    private function findKind(int $id): Kind
    {
        $kind = $this->repositoryFactory->kind()->findOneById($id);

        if (is_null($kind)) {
            throw new Exception('Provided kind not found');
        }

        return $kind;
    }
}