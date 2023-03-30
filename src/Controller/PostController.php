<?php

namespace App\Controller;

use App\Repository\MovieNameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/accueil', name: 'app_home')]
    public function index(MovieNameRepository $repo): Response
    {
        $movies = $repo->findAll();
        return $this->render('post/index.html.twig', compact('movies',) 
    
        );
    }
    #[Route('/card', name: 'app_show')]
    public function show(): Response
    {
        return $this->render('post/show.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
