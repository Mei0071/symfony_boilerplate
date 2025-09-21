<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PainRepository;

final class PainController extends AbstractController
{
    #[Route('/pain', name: 'pain_index')]
    public function index(PainRepository $painRepository): Response
    {

        $pains = $painRepository->findAll();

        return $this->render('pain/index.html.twig', [
            'pains' => $pains,
        ]);
    }
}
