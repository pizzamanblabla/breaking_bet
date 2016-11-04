<?php

namespace AppBundle\Service\Parser\External\Betsbc\Resolver;

use AppBundle\Entity\Bet;
use AppBundle\Entity\Chain;
use AppBundle\Entity\Coefficient;
use AppBundle\Entity\Event;
use AppBundle\Entity\Sport;
use AppBundle\Entity\Team;
use AppBundle\Service\Parser\External\BaseResolver;

class Resolver extends BaseResolver
{
    /**
     * @param array $data
     * @return mixed[]
     */
    public function resolve(array $data)
    {
        foreach ($data['reply']['sports'] as $sport) {
            $sportEntity = $this->resolveSport($sport);
            if ($sportEntity->getName() == 'Футбол') {
                continue;
            }
            foreach ($sport['chmps'] as $chain) {
                $chainEntity = $this->resolveChain($chain, $sportEntity);

                foreach ($chain['evts'] as $event) {
                    $eventEntity = $this->resolveEvent($event, $chainEntity);

                    $this->resolveBet($event['main'], $eventEntity);

                    echo json_encode($event);die;
                }
                die;
            }
        }
    }

    /**
     * @param array $sport
     * @return Sport
     */
    private function resolveSport(array $sport)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Sport');
        $sportEntity = $repository->findOneByName($sport['name_sp']);

        if (is_null($sportEntity)) {
            $sportEntity = (new Sport())
                ->setName($sport['name_sp'])
                ->setCode($sport['id_sp'])
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($sportEntity);
            $em->flush();
        }

        return $sportEntity;
    }

    /**
     * @param array $chain
     * @param Sport $sport
     * @return Chain
     */
    private function resolveChain(array $chain, Sport $sport)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Chain');
        $entity = $repository->findOneByCode($chain['id_ch']);

        if (is_null($entity)) {
            $entity = (new Chain())
                ->setName($chain['name_ch'])
                ->setCode($chain['id_ch'])
                ->setSport($sport)
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $entity;
    }

    /**
     * @param array $event
     * @param Chain $chain
     * @return Event
     */
    private function resolveEvent(array $event, Chain $chain)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Event');
        $entity = $repository->findOneByCode($event['id_ev']);

        if (is_null($entity)) {
            $entity = (new Event())
                ->setCode($event['id_ev'])
                ->setChain($chain)
                ->setDate(new \DateTime($event['date_ev_str']))
                ->setTeamFirst(
                    $this->resolveTeam(
                        $event['name_ht'],
                        $event['id_ht'],
                        $chain->getSport()
                    )
                )
            ;

            if (
                array_key_exists('id_at', $event) &&
                array_key_exists('name_at', $event)
            ) {
                $entity->setTeamSecond(
                    $this->resolveTeam(
                        $event['name_at'],
                        $event['id_at'],
                        $chain->getSport()
                    )
                );
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $entity;
    }

    /**
     * @param string $name
     * @param string $code
     * @param Sport $sport
     * @return Team
     */
    private function resolveTeam($name, $code, Sport $sport)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Team');
        $entity = $repository->findOneByCode($code);

        if (is_null($entity)) {
            $entity = (new Team())
                ->setName($name)
                ->setCode($code)
                ->setSport($sport)
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $entity;
    }

    /**
     * @param array $bet
     * @param Event $event
     */
    private function resolveBet(array $bet, Event $event)
    {
        var_dump($bet);die;

        $entity = (new Bet())
            ->setDate(new \DateTime())
            ->setEvent($event)
        ;

        $repository = $this->getDoctrine()->getRepository('AppBundle:CoefficientType');
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        if (array_key_exists('69', $bet)) {
            $data = $this->finder->findOrElse('P1', $bet[69], []);

            if (!count($data)) {
                $data = $this->finder->findOrElse('Y', $bet[69], []);
            }

            $coefficient = (new Coefficient())
                ->setBet($entity)
                ->setCoefficientType($repository->findOneByCode('actual_p1'))
                ->setValue($data['kf'])
                ->setDate(new \DateTime($data['md']))
                ->setPs($data['ps'])
            ;
        }

        if (array_key_exists('70', $bet)) {

        }

        if (array_key_exists('71', $bet)) {

        }

        if (array_key_exists('72', $bet)) {

        }
    }
}