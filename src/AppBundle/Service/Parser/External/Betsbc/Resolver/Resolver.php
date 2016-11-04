<?php

namespace AppBundle\Service\Parser\External\Betsbc\Resolver;

use AppBundle\Entity\Bet;
use AppBundle\Entity\Sport;
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
            //if ($sportEntity->getName() == 'Футбол') continue;
            foreach ($sport['chmps'] as $chain) {
                echo json_encode($chain);die;

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
                ->setCode($sport['order'])
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($sportEntity);
            $em->flush();
        }

        return $sportEntity;
    }

    private function resolveChain(array $chain)
    {

    }

    private function resolveEvent(array $event)
    {

    }

    private function resolveTeam(array $team)
    {

    }

    private function persistBet(Bet $bet)
    {

    }
}