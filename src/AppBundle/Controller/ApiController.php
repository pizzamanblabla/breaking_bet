<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sport;
use AppBundle\Interaction\Request\Request;
use AppBundle\Service\ServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * ApiController constructor.
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function parseAction()
    {
        $this->service->behave((new Request())->setServiceId('betsbc'));

        return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }

    /**
     * @Route("/api/sport/get/")
     */
    public function showAction()
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Sport')
            ->find(1);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '. 1
            );
        }

        return new Response(
            '<html><body>Lucky number: '. var_dump($product) .'</body></html>'
        );
    }
}
