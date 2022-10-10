<?php

namespace App\Controller;

use App\Form\NewProjectType;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('admin/index.html.twig', [
            'controller' => 'admin',
        ]);
    }

    #[Route('/admin/new_project', name: 'new_project')]
    public function newProject(EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(NewProjectType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('projects');
        }
        return $this->render('admin/newProject.html.twig', [
            'controller' => 'admin',
            'form' => $form->createView()
        ]);
    }
    #[Route('/admin/projects', name: 'projects')]
    public function projects(ProjectsRepository $projects): Response
    {
        $projects = $projects->findAll();

        return $this->render('admin/projects.html.twig', [
            'controller' => 'admin',
            'projects' => $projects
        ]);
    }
}
