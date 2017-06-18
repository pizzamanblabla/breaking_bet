<?php

namespace BreakingBetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * MainController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @return Response
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sports = $em->getRepository('BreakingBetBundle:Sport')->findAll();
        $chains = $em->getRepository('BreakingBetBundle:Chain')->findAll();
        $coefficientTypes = $em->getRepository('BreakingBetBundle:CoefficientType')->findAll();


        return
            $this->render(
                'BreakingBetBundle:Bets:list.html.twig',
                [
                    'sports' => $sports,
                    'event_chains' => $chains,
                    'coefficientTypes' => $coefficientTypes
                ]
            );
    }
}