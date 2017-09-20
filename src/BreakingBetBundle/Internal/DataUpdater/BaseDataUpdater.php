<?php

namespace BreakingBetBundle\Internal\DataUpdater;

use BreakingBetBundle\Entity\Repository\RepositoryFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

abstract class BaseDataUpdater implements DataUpdaterInterface
{
    use LoggerAwareTrait;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var RepositoryFactoryInterface
     */
    protected $repositoryFactory;

    /**
     * @param EntityManagerInterface $entityManager
     * @param RepositoryFactoryInterface $repositoryFactory
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        RepositoryFactoryInterface $repositoryFactory,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->entityManager = $entityManager;
        $this->repositoryFactory = $repositoryFactory;
    }

    /**
     * @param mixed $entities
     */
    protected function removeEntities($entities)
    {
        if (!empty($entities)) {
            foreach ($entities as $entity) {
                $this->entityManager->remove($entity);
            }
        }
    }
}