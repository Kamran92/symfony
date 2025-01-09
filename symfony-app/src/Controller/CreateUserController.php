<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class CreateUserController extends AbstractController
{
    #[Route('api/create-user', name: 'app_create_user', methods: "POST")]
    public function createUser(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $requestContentUser = json_decode($request->getContent(), true);

        $user = new User();

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $requestContentUser['password'],
        );

        $user->setEMail($requestContentUser['mail']);
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);

        $entityManager->flush();

        return $this->json(['success' => true,]);
    }
}
