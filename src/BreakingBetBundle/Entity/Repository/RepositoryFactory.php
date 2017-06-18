<?php

namespace BreakingBetBundle\Entity\Repository;

use BreakingBetBundle\Entity\Bet as BetEntity;
use BreakingBetBundle\Entity\Chain as ChainEntity;
use BreakingBetBundle\Entity\Coefficient as CoefficientEntity;
use BreakingBetBundle\Entity\CoefficientType as CoefficientTypeEntity;
use BreakingBetBundle\Entity\Event as EventEntity;
use BreakingBetBundle\Entity\Sport as SportEntity;
use BreakingBetBundle\Entity\Team as TeamEntity;
use Doctrine\ORM\EntityManagerInterface;

class RepositoryFactory implements RepositoryFactoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function bet()
    {
        return $this->entityManager->getRepository(BetEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function chain()
    {
        return $this->entityManager->getRepository(ChainEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function coefficient()
    {
        return $this->entityManager->getRepository(CoefficientEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function event()
    {
        return $this->entityManager->getRepository(EventEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function sport()
    {
        return $this->entityManager->getRepository(SportEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function team()
    {
        return $this->entityManager->getRepository(TeamEntity::class);
    }

    /**
     * {@inheritdoc}
     */
    public function coefficientType()
    {
        return $this->entityManager->getRepository(CoefficientTypeEntity::class);
    }
}