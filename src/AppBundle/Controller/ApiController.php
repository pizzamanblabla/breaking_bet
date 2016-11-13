<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sport;
use AppBundle\Interaction\Request\Request as ServiceRequest;
use AppBundle\Service\ServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
        $this->service->behave((new ServiceRequest())->setServiceId('betsbc'));

        return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function operationAction(Request $request)
    {
        return new Response(
            '<html><body>Lucky number:</body></html>'
        );
    }
}
