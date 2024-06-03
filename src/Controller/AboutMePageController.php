<?php

declare(strict_types=1);

namespace App\Controller;
use App\Repository\InformationAboutMeRepository;
use App\Service\AboutProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutMePageController extends AbstractController{
    public function __construct(
        private InformationAboutMeRepository $informationAboutMeRepository,
        private AboutProvider $aboutProvider
    ){

    }
    #[Route('/about', 'aboutMe')]
    public function AboutMe(): Response{
        $info = $this->informationAboutMeRepository->findAll();
        $parameters = [];
        if ($info) {
            $parameters = $this->aboutProvider->transformDataForTwig($info);
        }
        // dd($parameters);
        return $this->render('aboutMe/index.html.twig', $parameters);
    }

}