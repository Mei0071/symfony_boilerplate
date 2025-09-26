<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SauceRepository;

final class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'sauce_index')]
    public function index(SauceRepository $sauceRepository): Response
    {

        $sauces= $sauceRepository->findAll();

        return $this->render('sauce/index.html.twig', [
            'sauces' => $sauces,
        ]);
    }
}
