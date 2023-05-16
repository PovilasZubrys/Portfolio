<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    private $em;
    private $userPasswordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->em = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        $result = true;

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if (!empty($_POST)) {
            $result = $this->handleData($_POST);
        }

        if (!$result || empty($_POST)) {
            return $this->render('registration/register.html.twig');
        }

        return $this->redirectToRoute('home');
    }

    private function handleData(array $postData): bool
    {
        if (!isset($postData['email'])) {
            $this->addFlash('error', 'No email set');
            return false;
        }
        if (!isset($postData['password']) || !isset($postData['repeat_password'])) {
            $this->addFlash('error', 'No password set');
            return false;
        }
        if ($postData['password'] != $postData['repeat_password']) {
            $this->addFlash('error', 'Passwords do not match');
            return false;
        }
        if (strlen($postData['password']) < 8) {
            $this->addFlash('error', 'Password too short');
            return false;
        }

        $user = new User();
        $user->setEmail($postData['email']);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $postData['password']));

        $this->em->persist($user);
        $this->em->flush();

        return true;
    }
}
