<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function homeAction()
    {

        return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }
}