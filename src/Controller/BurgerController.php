<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/burgers', name: '')]

class BurgerController extends AbstractController
{
    #[Route('/', name: 'burger_list')]
    public function liste(): Response
    {
        $burgers = [
            1 => ['name' => 'Burger savoyard','description'=>'Le savoyard'],
            2 => ['name' => 'Burger normal','description'=>'Le normal'],
            3 => ['name' => 'Burger original','description'=>'L\'original']
        ];


         return $this->render('burger_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/{id}', name: 'burger_show')]
    public function show(int $id):Response{
        $burgers = [
            1 => ['name' => 'Burger savoyard','description'=>'Le savoyard'],
            2 => ['name' => 'Burger normal','description'=>'Le normal'],
            3 => ['name' => 'Burger original','description'=>'L\'original']
        ];

        $burger = $burgers[$id] ?? null;

        return $this->render('burger_show.html.twig',[
            'id'=>$id,
            'burger' => $burger
        ]);
    }
}