<?php

declare(strict_types=1);

namespace App\Controller;
use App\Entity\Wpis;
use App\Form\EditFormType;
use App\Repository\WpisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class WpisController extends AbstractController
{
    public function __construct(
        private WpisRepository $wpisRepository
    ){

    }
    #[Route('/add', 'addNewForm')]
    public function dodajWpis(Request $request): Response
    {
        $wpis= new Wpis();

        $form = $this->createForm(EditFormType::class, $wpis);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $wpis = $form->getData();

         $this->wpisRepository->save($wpis, true);

            return $this->redirectToRoute('wpisy');
        }

        return $this->render('forum/add.html.twig', ['form' => $form]);

    }

    #[Route('/wpis/{id}/edit', name: 'one_post')]
    public function getOneWpisById(int $id, Request $request){
        $wpis = $this->wpisRepository->find($id);
        $form = $this->createForm(EditFormType::class, $wpis);

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $wpis = $form->getData();

            $this->wpisRepository->save($wpis, true);

            return $this->redirectToRoute('wpisy');
        }

        return $this->render('forum/add.html.twig', ['form' => $form]);
        return $this->render('forum/wpis.html.twig', ['wpis' => $wpis]);
    }
}
