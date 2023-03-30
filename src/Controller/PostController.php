<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\MovieName;
use App\Form\MovieFormType;
use App\Repository\MovieNameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PostController extends AbstractController
{
    #[Route('/accueil', name: 'app_home')]
    public function index(MovieNameRepository $repo): Response
    {
        $movies = $repo->findAll();
        return $this->render('post/index.html.twig', compact('movies',) 
    
        );
    }
    #[Route('/card/{id}', name: 'app_show')]
    public function show($id, MovieNameRepository $repo): Response
    {
        $movie = $repo->find($id);
        return $this->render('post/show.html.twig', compact('movie',) );
    }
    #[Route('/post/delete/{id}', name: 'app_delete', methods: ['GET', 'DELETE'])]
    public function delete($id, MovieNameRepository $repo, EntityManagerInterface $em): Response
    {
        $movie = $repo->find($id);

        $em->remove($movie);

        $em->flush();

        return $this->redirectToRoute('app_home');
    }
    // #[Route('/create', name: 'app_create', methods: ['GET', 'POST'])]
    // public function create(Request $request, EntityManagerInterface $em): Response
    // {
    //     // cree nouvel objet
    //     $movie = new MovieName;

    //     // cree form
    //     $form = $this->createForm(MovieFormType::class, $movie);
    //     // $showForm = $form->createView();

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $newPost = $form->getData();

    //         $imagePath = $form->get('image')->getdata();

    //         if ($imagePath) {

    //             $newFileName = uniqid() . '.' . $imagePath->guessExtension();
    //             try {
    //                 $imagePath->move(
    //                     $this->getParameter('kernel.project_dir') . '/public/upload',
    //                     $newFileName
    //                 );
    //             } catch (FileException $e) {
    //                 return new Response($e->getMessage());
    //             }
    //             $newPost->setUrlImg('/upload/' . $newFileName);
    //         }
    //         // set le champ created_at avec la date de l'envoi du formulaire
    //         $newPost->setCreatedAt(new DateTimeImmutable());
    //         // persiste les datas de user
    //         $em->persist($newPost);
    //         $em->flush();
    //         // redirection
    //         return $this->redirectToRoute('app_home');
    //     }


//         return $this->render('post/create.html.twig', ['showForm' => $form->createView()]);
//     }
}
