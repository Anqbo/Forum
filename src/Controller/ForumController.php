<?php

declare(strict_types=1);

namespace App\Controller;
use App\Repository\WpisRepository;
use App\Service\PostProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController{
   
    public function __construct(
        private WpisRepository $wpisRepository,
        private PostProvider $postProvider
    ){

    } 
    
    
    // public function mainPage():Response{
    //     $wpisy = $this->wpisRepository->findAll();

    //     return $this->render('forum/wpisy.html.twig', ['wpisy' => $wpisy]);
    // }

    #[Route('/wpis/{id}', name: 'one_wpis')]
    public function getOneWpisById(int $id){
        $wpis = $this->wpisRepository->find($id);

        return $this->render('forum/wpis.html.twig', ['wpis' => $wpis]);
    }

    #[Route('/wpisy', name: 'wpisy')]
    public function showPost(): Response{
        $wpisy = $this->wpisRepository->findAll();
        $parameters = [];
        if ($wpisy) {
            $parameters = $this->postProvider->transformDataForTwig($wpisy);
        }

        return $this->render('forum/wpisy.html.twig', $parameters);
    }
}