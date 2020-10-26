<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class HomeController extends DefaultController
{
    /**
    * @Route("/", name="home")
    */
    public function index()
    {
        $forRender = parent::renderDefault();
        return $this->render('index.html.twig', $forRender);
    }
}
