<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burger')]
    public function liste(): Response
    {
        return $this->render('burger_list.html.twig');
    }

    #[Route('/burgers/{id}', name: 'id')]
    public function show(int $id):Response{
        $burgers = [
            1 => ['name' => 'Burger savoyard','Description'=>'Le savoyard'],
            2 => ['name' => 'Burger normal','Description'=>'Le normal'],
            3 => ['name' => 'Burger original','Description'=>'L\'original']
        ];

        $burger = $burgers[$id] ?? null;

        return $this->render('burger_show.html.twig',[
            'id'=>$id,
            'burger' => $burger
        ]);
    }
}