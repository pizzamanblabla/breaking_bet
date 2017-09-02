<?php

namespace BreakingBetBundle\Operation\Bet\Update\DataUpdater;

use BreakingBetBundle\Entity;
use BreakingBetBundle\Interaction\Dto\Response\InternalResponseInterface;
use BreakingBetBundle\Internal\Service\BaseDataUpdater;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\Kind;
use BreakingBetBundle\Operation\Bet\Update\Dto\Response\SuccessfulResponse;

final class DataUpdater extends BaseDataUpdater
{
    /**
     * {@inheritdoc}
     * @param InternalResponseInterface|SuccessfulResponse $response
     */
    public function update(InternalResponseInterface $response)
    {
        foreach ($response->getKinds() as $kind) {
            $kindEntity = $this->updateKind($kind);

            foreach ($kind->getChains() as $chain) {
                $chainEntity = $this->updateChain($chain, $kindEntity);

                foreach ($chain->getEvents() as $event) {
                    $eventEntity = $this->updateEvent($event, $chainEntity);
                    $this->updateBet($event['main'], $eventEntity);
                }
            }
        }
    }

    /**
     * @param Kind $kind
     * @return Entity\Kind
     */
    private function updateKind(Kind $kind)
    {
        $kindEntity = $this->repositoryFactory->kind()->findOneBy(['external_id' => $kind->getExternalId()]);

        if (!$kindEntity) {
            $kindEntity = (new Entity\Kind())
                ->setName($kind->getName())
                ->setExternalId($kind->getExternalId())
            ;
        }

        return $kindEntity;
    }

    /**
     * @param array $chain
     * @param Entity\Kind $sport
     * @return Entity\Chain
     */
    private function updateChain(array $chain, Entity\Kind $sport)
    {
        return
            $this->migrator
                ->getChain()
                ->setName($chain['name_ch'])
                ->setCode($chain['id_ch'])
                ->setSport($sport)
                ->get()
            ;
    }

    /**
     * @param array $event
     * @param Chain $chain
     * @return Event
     */
    private function updateEvent(array $event, Chain $chain)
    {
        $eventMigrator = $this->migrator
            ->getEvent()
            ->setCode($event['id_ev'])
            ->setDate(new \DateTime($event['date_ev_str']))
            ->setChain($chain)
            ->setTeamFirst(
                $this->updateTeam(
                    $event['name_ht'],
                    $event['id_ht'],
                    $chain->getSport()
                )
            );

        return $eventMigrator->get();
    }

    /**
     * @param string $name
     * @param string $code
     * @param Sport $sport
     * @return Team
     */
    private function updateTeam($name, $code, Sport $sport)
    {
        return
            $this->migrator
                ->getTeam()
                ->setName($name)
                ->setCode($code)
                ->setSport($sport)
                ->get()
            ;
    }

    /**
     * @param array $bet
     * @param Event $event
     */
    private function updateBet(array $bet, Event $event)
    {
        $betEntity = $this->migrator
            ->getBet()
            ->setDate(new \DateTime())
            ->setEvent($event)
            ->migrate()
        ;

        foreach ($this->coefficientTypeMap as $key => $coefficient) {
            if (array_key_exists($key, $bet)) {
                foreach ($coefficient as $keyType => $type) {
                    $coef = $this->finder->findOrElse($keyType, $bet[$key], null);
                    $coefType = $this->migrator->getCoefficientType()->setCode($type)->get();

                    if (is_null($coef)) {
                        continue;
                    } elseif (is_array($coef)) {
                        $this->migrator
                            ->getCoefficient()
                            ->setBet($betEntity)
                            ->setCoefficientType($coefType)
                            ->setValue($coef['kf'])
                            ->setDate(new \DateTime(date("Y-m-d H:i:s", $coef['md'])))
                            ->setPs($coef['ps'])
                            ->migrate()
                        ;
                    } else {
                        $this->migrator
                            ->getCoefficient()
                            ->setBet($betEntity)
                            ->setCoefficientType($coefType)
                            ->setValue($coef)
                            ->setDate(new \DateTime())
                            ->setPs(0)
                            ->migrate()
                        ;
                    }
                }
            }
        }
    }
}