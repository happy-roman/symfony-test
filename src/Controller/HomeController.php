<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends DefaultController
{
    /**
    * @Route("/", name="home")
    */
    public function index(): Response
    {
        $forRender = parent::renderDefault();
        return $this->render('index.html.twig', $forRender);
    }
}
