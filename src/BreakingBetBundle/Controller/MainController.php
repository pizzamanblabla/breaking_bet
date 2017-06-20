<?php

namespace BreakingBetBundle\Controller;

use BreakingBetBundle\Interaction\Transformer\Internal\TransformerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

final class MainController extends Controller
{
    /**
     * @var TransformerInterface
     */
    private $httpRequestTransformer;
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