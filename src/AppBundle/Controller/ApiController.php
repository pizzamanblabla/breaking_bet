<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sport;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("/api/parse")
     */
    public function numberAction()
    {

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
