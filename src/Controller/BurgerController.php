<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BurgerRepository;
use App\Entity\Burger;

#[Route('/burgers', name: '')]

class BurgerController extends AbstractController
{
    #[Route('/', name: 'burger_index')]
    public function index(BurgerRepository $burgerRepository): Response
    {

        $burgers = $burgerRepository->getAllBurgers();

        return $this->render('burger_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/detail/{id}', name: 'burger_show')]
    public function show(BurgerRepository $burgerRepository, $id):Response{

        $burger = $burgerRepository->getBurgerById($id);

        return $this->render('burger_show.html.twig',[
            'id'=>$id,
            'burger' => $burger
        ]);
    }

    #[Route('/create', name: 'burger_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {

        $burger=new Burger();
        $burger->setName("nouveau burger");
        $burger->setPrice(5.20);
        $burger->setDescription("nouveau burger");

        //Persister et sauvegarder le nouveau burger
        $entityManager->persist($burger);
        $entityManager->flush();

        return new Response("Nouveau burger crée avec succès");
    }

    #[Route('/expensiveBurger', name: 'burger_expensive')]
    public function topBurgers(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findTopXBurgers(3);
        return $this->render('expensiveBurger.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    /*#[Route('/burgerWithIngredient', name: 'burger_withIngredient')]
    public function burgerWithIngredient(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findBurgersWithIngredient("oignon");
        return $this->render('expensiveBurger.html.twig', [
            'burgers' => $burgers,
        ]);
    }*/

}