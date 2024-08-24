<?php

declare(strict_types=1);

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{
    
    #[Route('api/users/show', name: 'app_user', methods: ['GET'])]
    public function showUser(): JsonResponse{
        $currentUser = $this->getUser();
        dd($currentUser);

        return new JsonResponse([
            'data' => 'User data',
            'messages' => 'User messages',
            'errors' => 'user errors',
            'statusCode' => 'User statusCode',
            'additionalData' => 'User additionalData'
        ]);
    }
}