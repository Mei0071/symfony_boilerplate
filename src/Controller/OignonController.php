<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OignonRepository;

final class OignonController extends AbstractController
{
    #[Route('/oignon', name: 'oignon_index')]
    public function index(OignonRepository $oignonRepository): Response
    {

        $oignons = $oignonRepository->findAll();

        return $this->render('oignon/index.html.twig', [
            'oignons' => $oignons,
        ]);
    }

}
