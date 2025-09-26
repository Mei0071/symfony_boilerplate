<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CommentaireRepository;


final class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'commentaire_index')]
    public function index(CommentaireRepository $commentaireRepository): Response
    {

        $commentaires= $commentaireRepository->findAll();

        return $this->render('commentaire/index.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }
}
