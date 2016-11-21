<?php

namespace AppBundle\Controller;

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
        $sports = $em->getRepository('AppBundle:Sport')->findAll();
        $chains = $em->getRepository('AppBundle:Chain')->findAll();
        $coefficientTypes = $em->getRepository('AppBundle:CoefficientType')->findAll();


        return
            $this->render(
                'AppBundle:Bets:list.html.twig',
                [
                    'sports' => $sports,
                    'event_chains' => $chains,
                    'coefficientTypes' => $coefficientTypes
                ]
            );
    }
}