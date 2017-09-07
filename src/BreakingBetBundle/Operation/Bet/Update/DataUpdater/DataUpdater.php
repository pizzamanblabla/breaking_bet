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
                    //$this->updateBet($event->getBet(), $eventEntity);
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
                ->setName($event->getName())
                ->setChain($chain)
                ->setDate(new \DateTime($event->getDate()))
            ;

            $teams = [];

            foreach ($event->getTeams() as $team) {
                $teams[] = $this->updateTeam($team, $chain->getKind());
            }

            $entity->setTeams($teams);

            $this->entityManager->persist($entity);
            $this->entityManager->flush();
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

        $entity = $this->repositoryFactory->event()->findOneBy(['externalId' => $team->getExternalId()]);

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
//        $betEntity = $this->migrator
//            ->getBet()
//            ->setDate(new \DateTime())
//            ->setEvent($event)
//            ->migrate()
//        ;
//
//        foreach ($this->coefficientTypeMap as $key => $coefficient) {
//            if (array_key_exists($key, $bet)) {
//                foreach ($coefficient as $keyType => $type) {
//                    $coef = $this->finder->findOrElse($keyType, $bet[$key], null);
//                    $coefType = $this->migrator->getCoefficientType()->setCode($type)->get();
//
//                    if (is_null($coef)) {
//                        continue;
//                    } elseif (is_array($coef)) {
//                        $this->migrator
//                            ->getCoefficient()
//                            ->setBet($betEntity)
//                            ->setCoefficientType($coefType)
//                            ->setValue($coef['kf'])
//                            ->setDate(new \DateTime(date("Y-m-d H:i:s", $coef['md'])))
//                            ->setPs($coef['ps'])
//                            ->migrate()
//                        ;
//                    } else {
//                        $this->migrator
//                            ->getCoefficient()
//                            ->setBet($betEntity)
//                            ->setCoefficientType($coefType)
//                            ->setValue($coef)
//                            ->setDate(new \DateTime())
//                            ->setPs(0)
//                            ->migrate()
//                        ;
//                    }
//                }
//            }
//        }
    }
}