<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function renderDefault(): array
    {
        return [
            'title' => 'Сайт Library'
        ];
    }
}
