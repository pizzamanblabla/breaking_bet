<?php

namespace BreakingBetBundle\Operation\Bet\Update\DataUpdater;

use BreakingBetBundle\Entity;
use BreakingBetBundle\Interaction\Dto\Request\InternalRequestInterface;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\DataUpdater\BaseDataUpdater;
use BreakingBetBundle\Operation\Bet\Update\Dto\Request\Request;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Bet;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Chain;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Event;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Kind;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\SuccessfulResponse;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Team;
use DateTime;

final class DataUpdater extends BaseDataUpdater
{
    /**
     * {@inheritdoc}
     * @param InternalRequestInterface|Request $request
     * @param InternalResponseInterface|SuccessfulResponse $response
     */
    public function update(InternalRequestInterface $request, InternalResponseInterface $response)
    {
        foreach ($response->getKinds() as $kind) {
            $kindEntity = $this->updateKind($kind, $request->getSource());

            foreach ($kind->getChains() as $chain) {
                $chainEntity = $this->updateChain($chain, $kindEntity);

                foreach ($chain->getEvents() as $event) {
                    $eventEntity = $this->updateEvent($event, $chainEntity);

                    if (!is_null($event->getBet())) {
                        $this->updateBet($event->getBet(), $eventEntity);
                    }
                }
            }
        }
    }

    /**
     * @param Kind $kind
     * @param Entity\Source $source
     * @return Entity\Kind
     */
    private function updateKind(Kind $kind, Entity\Source $source)
    {
        $kindEntity = $this->repositoryFactory->kind()->findOneBy(['externalId' => $kind->getExternalId()]);

        if (!$kindEntity) {
            $kindEntity = (new Entity\Kind())
                ->setName($kind->getName())
                ->setExternalId($kind->getExternalId())
                ->setSource($source)
            ;

            $this->entityManager->persist($kindEntity);
        }

        return $kindEntity;
    }

    /**
     * @param Chain $chain
     * @param Entity\Kind $kind
     * @return Entity\Chain
     */
    private function updateChain(Chain $chain, Entity\Kind $kind)
    {
        $entity = $this->repositoryFactory->chain()->findOneBy(['externalId' => $chain->getExternalId()]);

        if (!$entity) {
            $entity = (new Entity\Chain())
                ->setName($chain->getName())
                ->setExternalId($chain->getExternalId())
                ->setKind($kind)
            ;

            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        }

        return $entity;
    }

    /**
     * @param Event $event
     * @param Entity\Chain $chain
     * @return Entity\Event
     */
    private function updateEvent(Event $event, Entity\Chain $chain)
    {
        $entity = $this->repositoryFactory->event()->findOneBy(['externalId' => $event->getExternalId()]);

        if (!$entity) {
            $entity = (new Entity\Event())
                ->setExternalId($event->getExternalId())
                ->setName($chain->getName())
                ->setChain($chain)
                ->setDate($this->checkAndGetDate($event->getDate()))
            ;

            $teams = [];

            foreach ($event->getTeams() as $team) {
                $teams[] = $this->updateTeam($team, $chain->getKind());
            }

            $entity->setTeams($teams);

            $this->entityManager->persist($entity);
        }

        return $entity;
    }

    /**
     * @param Team $team
     * @param Entity\Kind $kind
     * @return Entity\Team
     */
    private function updateTeam(Team $team, Entity\Kind $kind)
    {

        $entity = $this->repositoryFactory->team()->findOneBy(['externalId' => $team->getExternalId()]);

        if (!$entity) {
            $entity = (new Entity\Team())
                ->setExternalId($team->getExternalId())
                ->setName($team->getName())
                ->setKind($kind)
            ;

            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        }

        return $entity;
    }

    /**
     * @param Bet $bet
     * @param Entity\Event $event
     */
    private function updateBet(Bet $bet, Entity\Event $event)
    {
        $coefficients = [];

        $betEntity = (new Entity\Bet())
            ->setDate(new DateTime())
            ->setEvent($event)
        ;

        foreach ($bet->getCoefficients() as $coefficient) {
            $entity = $this->repositoryFactory->coefficient()->getLastByEventAndType(
                $event,
                $coefficient->getCoefficientType()
            );

            if (!$entity || $coefficient->getValue() != $entity->getValue()) {
                $coefficient = (new Entity\Coefficient())
                    ->setCoefficientType($coefficient->getCoefficientType())
                    ->setValue($coefficient->getValue())
                    ->setPs($coefficient->getPs())
                    ->setDate($this->checkAndGetDate($coefficient->getDate()))
                    ->setBet($betEntity)
                ;

                $coefficients[] = $coefficient;
                $this->entityManager->persist($coefficient);
            }
        }

        if (count($coefficients)) {
            $betEntity->setCoefficients($coefficients);

            $this->entityManager->persist($betEntity);
        }
    }

    /**
     * @param $date
     * @return DateTime
     */
    private function checkAndGetDate($date): DateTime
    {
        return
            !empty($date)
                ? $this->getDateTime($date)
                : new DateTime()
            ;
    }

    /**
     * @param string $date
     * @return DateTime
     */
    private function getDateTime(string $date): DateTime
    {
        return
            is_numeric($date)
                ? (new DateTime())->setTimestamp((int) $date)
                : new DateTime($date)
            ;
    }
}