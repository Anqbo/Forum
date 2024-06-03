<?php

declare(strict_types=1);

namespace App\Controller;
use App\Entity\Wpis;
use App\Repository\WpisRepository;
use App\Service\PostProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController{

    public function __construct(
        private WpisRepository $wpisRepository,
        private PostProvider $postProvider)
    {

    }

    #[Route('/', 'mainPage')]
    public function index(){

        $wpis = $this->wpisRepository->getLastPost();

        return $this->render('menu/index.html.twig', ['wpis' => $wpis]);
    }

    #[Route('/search', 'searcher')]
    public function search(){
            $dane = $_GET['wyszukiwarka'];
            if($dane){
                $wpisy = $this->wpisRepository->getPostsByTitle($dane);
                $parameters = [];
                if ($wpisy) {
                    $parameters = $this->postProvider->transformDataForTwig($wpisy);
                    return $this->render('menu/search.html.twig', $parameters);
                } else {
                    return $this->redirectToRoute('mainPage');
                }
            //    return $this->render('menu/search.html.twig', $parameters); 
            }else{

                return $this->redirectToRoute('mainPage');
            }
    }

}