<?php

namespace BreakingBetBundle\Operation\Drawdown\Get\Service;

use BreakingBetBundle\Entity;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\BaseEntityService;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Coefficient;
use BreakingBetBundle\Operation\Drawdown\Get\Dto\Request\Request;
use BreakingBetBundle\Operation\Drawdown\Get\Dto\Response\Drawdown;
use BreakingBetBundle\Operation\Drawdown\Get\Dto\Response\Event;
use BreakingBetBundle\Operation\Drawdown\Get\Dto\Response\SuccessfulResponse;
use BreakingBetBundle\Operation\Drawdown\Get\Dto\Response\Team;

final class Service extends BaseEntityService
{
    /**
     * {@inheritdoc}
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        $drawdowns = [];

//        foreach ($this->getDrawdowns($request) as $entityDrawdown) {
//
//            $drawdowns[] = $this->createDrawdown($entityDrawdown);
//        }

        return (new SuccessfulResponse())->setDrawdowns($drawdowns);
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return Entity\Drawdown[]
     */
    private function getDrawdowns(InternalRequestInterface $request): array
    {
        return
            $this->repositoryFactory->drawdown()->findAllByMinDifferenceWithLimit(
                $request->getMinDifferenceValue(),
                $request->getMaxResults()
            );
    }

    /**
     * @param Entity\Drawdown $entityDrawdown
     * @return Drawdown
     */
    private function createDrawdown(Entity\Drawdown $entityDrawdown): Drawdown
    {
        return
            (new Drawdown())
                ->setDifference($entityDrawdown->getDifference())
                ->setCoefficients(
                    [
                        $this->createCoefficient($entityDrawdown->getCoefficientOne()),
                        $this->createCoefficient($entityDrawdown->getCoefficientTwo()),
                    ]
                )
                ->setChain($entityDrawdown->getCoefficientOne()->getBet()->getEvent()->getChain()->getName())
                ->setKind($entityDrawdown->getCoefficientOne()->getBet()->getEvent()->getChain()->getKind())
                ->setTeams(
                    array_map(
                        function(Entity\Team $entityTeam) {
                            return $this->createTeam($entityTeam);
                        },
                        $entityDrawdown->getCoefficientOne()->getBet()->getEvent()->getTeams()
                    )
                )
                ->setEvent($this->createEvent($entityDrawdown->getCoefficientOne()->getBet()->getEvent()))
            ;
    }

    /**
     * @param Entity\Coefficient $entityCoefficient
     * @return Coefficient
     */
    private function createCoefficient(Entity\Coefficient $entityCoefficient): Coefficient
    {
        return
            (new Coefficient())
                ->setCoefficientType($entityCoefficient->getCoefficientType())
                ->setValue($entityCoefficient->getValue())
                ->setPs($entityCoefficient->getPs())
                ->setLv($entityCoefficient->getLv())
                ->setDate($entityCoefficient->getDate()->format('Y-m-d H:i:s'))
            ;
    }

    /**
     * @param Entity\Team $entityTeam
     * @return Team
     */
    private function createTeam(Entity\Team $entityTeam): Team
    {
        return
            (new Team())
                ->setName($entityTeam->getName())
                ->setExternalId($entityTeam->getExternalId())
            ;
    }

    /**
     * @param Entity\Event $entityEvent
     * @return Event
     */
    private function createEvent(Entity\Event $entityEvent): Event
    {
        return
            (new Event())
                ->setName($entityEvent->getName())
                ->setExternalId($entityEvent->getExternalId())
                ->setLink('http://www.betsbc.com/v3/ru/line/bets/events=a:' . $entityEvent->getExternalId() . ';period=0;')
            ;
    }
}