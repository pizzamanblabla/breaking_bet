<?php

namespace BreakingBetBundle\Internal\Service;

use Doctrine\ORM\EntityManagerInterface;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

final class Transactional implements ServiceInterface
{
    use LoggerAwareTrait;

    /**
     * @var ServiceInterface
     */
    private $decoratedService;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param ServiceInterface $decoratedService
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        ServiceInterface $decoratedService,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ) {
        $this->setLogger($logger);

        $this->entityManager = $entityManager;
        $this->decoratedService = $decoratedService;
    }

    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        $response = $this->decoratedService->behave($request);

        if ($response->getType()->isSuccessful()) {
            $this->entityManager->flush();
        }

        return $response;
    }
}