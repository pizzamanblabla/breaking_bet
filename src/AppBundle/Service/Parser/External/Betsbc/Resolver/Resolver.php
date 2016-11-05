<?php

namespace AppBundle\Service\Parser\External\Betsbc\Resolver;

use AppBundle\Entity\Chain;
use AppBundle\Entity\Event;
use AppBundle\Entity\Sport;
use AppBundle\Entity\Team;
use AppBundle\Service\Parser\External\BaseResolver;

class Resolver extends BaseResolver
{
    /**
     * @var array
     */
    private $coefficientTypeMap = [
        '69' => [
            'Y' => 'actual_y',
            'N' => 'actual_n',
            'P1' => 'actual_p1',
            'P2' => 'actual_p2',
            'X' => 'actual_x',
        ],
        '70' => [
            '1X' => 'double_1x',
            'X2' => 'double_x2',
            '12' => 'double_12',
        ],
        '71' => [
            'Kf_F1' => 'handicap_kf_f1',
            'F1' => 'handicap_f2',
            'Kf_F2' => 'handicap_kf_f2',
            'F2' => 'handicap_f2'
        ],
        '72' => [
            'Tm' => 'total_under',
            'Tot' => 'total',
            'Tb' => 'total_over',
        ],
    ];

    /**
     * @param array $data
     * @return mixed[]
     */
    public function resolve(array $data)
    {
        foreach ($data['reply']['sports'] as $sport) {
            $sportEntity = $this->resolveSport($sport);

            foreach ($sport['chmps'] as $chain) {
                $chainEntity = $this->resolveChain($chain, $sportEntity);

                foreach ($chain['evts'] as $event) {
                    if (array_key_exists('main', $event)) {
                        $eventEntity = $this->resolveEvent($event, $chainEntity);
                        $this->resolveBet($event['main'], $eventEntity);
                    }
                }
            }
        }

        $this->migrator->getChain()->flush();
    }

    /**
     * @param array $sport
     * @return Sport
     */
    private function resolveSport(array $sport)
    {
        return
            $this->migrator
                ->getSport()
                ->setName($sport['name_sp'])
                ->setCode($sport['id_sp'])
                ->get()
            ;
    }

    /**
     * @param array $chain
     * @param Sport $sport
     * @return Chain
     */
    private function resolveChain(array $chain, Sport $sport)
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
    private function resolveEvent(array $event, Chain $chain)
    {
        $eventMigrator = $this->migrator
            ->getEvent()
            ->setCode($event['id_ev'])
            ->setDate(new \DateTime($event['date_ev_str']))
            ->setChain($chain)
            ->setTeamFirst(
                $this->resolveTeam(
                    $event['name_ht'],
                    $event['id_ht'],
                    $chain->getSport()
                )
            );

        if (
            array_key_exists('id_at', $event) &&
            array_key_exists('name_at', $event)
        ) {
            $eventMigrator->setTeamSecond(
                $this->resolveTeam(
                    $event['name_at'],
                    $event['id_at'],
                    $chain->getSport()
                )
            );
        }

        return $eventMigrator->get();
    }

    /**
     * @param string $name
     * @param string $code
     * @param Sport $sport
     * @return Team
     */
    private function resolveTeam($name, $code, Sport $sport)
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
    private function resolveBet(array $bet, Event $event)
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