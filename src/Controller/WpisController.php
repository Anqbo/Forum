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
    public function edit(Request $request): Response
    {
        $wpis= new Wpis();
        // $wpis->setTitle('Wpisz swoj tytul');
        // $wpis->setContent('przykladwoy wpis');
        // $wpis->setCategory('oferujacy');
        // $wpis->setDateAdded(new \DateTimeImmutable('tomorrow'));

        $form = $this->createForm(EditFormType::class, $wpis);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $wpis = $form->getData();

         $this->wpisRepository->save($wpis, true);

            return $this->redirectToRoute('wpisy');
        }

        return $this->render('forum/add.html.twig', ['form' => $form]);

    }
}
