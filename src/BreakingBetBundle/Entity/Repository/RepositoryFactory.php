<?php

namespace BreakingBetBundle\Entity\Repository;

use BreakingBetBundle\Entity;
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
    public function bet(): Bet
    {
        return $this->entityManager->getRepository(Entity\Bet::class);
    }

    /**
     * {@inheritdoc}
     */
    public function chain(): Chain
    {
        return $this->entityManager->getRepository(Entity\Chain::class);
    }

    /**
     * {@inheritdoc}
     */
    public function coefficient(): Coefficient
    {
        return $this->entityManager->getRepository(Entity\Coefficient::class);
    }

    /**
     * {@inheritdoc}
     */
    public function event(): Event
    {
        return $this->entityManager->getRepository(Entity\Event::class);
    }

    /**
     * {@inheritdoc}
     */
    public function kind(): Kind
    {
        return $this->entityManager->getRepository(Entity\Kind::class);
    }

    /**
     * {@inheritdoc}
     */
    public function team(): Team
    {
        return $this->entityManager->getRepository(Entity\Team::class);
    }

    /**
     * @return Source
     */
    public function source(): Source
    {
        return $this->entityManager->getRepository(Entity\Source::class);
    }
}