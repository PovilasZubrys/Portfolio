<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomeController extends AbstractController
{
    public function __construct(EntityManagerInterface $em, ProjectsRepository $projects)
    {
        $this->em = $em;
        $this->projectsRepository = $projects;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $projects = $this->projectsRepository->findBy(['position' => [1,2,3]]);

        return $this->render('home/index.html.twig', [
            'projects' => $projects
        ]);
    }
}
