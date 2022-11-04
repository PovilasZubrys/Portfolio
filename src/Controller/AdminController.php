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
    private $em;
    private $projectsRepository;

    public function __construct(ProjectsRepository $projectsRepository, EntityManagerInterface $em)
    {
        $this->projectsRepository = $projectsRepository;
        $this->em = $em;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('admin/index.html.twig', [
            'controller' => 'admin',
        ]);
    }

    #[Route('/admin/projects/new_project', name: 'new_project')]
    public function newProject(EntityManagerInterface $em, Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $projects->findBy(['deleted' => '0']);

        return $this->render('admin/projects.html.twig', [
            'controller' => 'admin',
            'projects' => $projects
        ]);
    }

    #[Route('/admin/projects/deleted', name: 'deleted_projects')]
    public function deletedProjects(ProjectsRepository $projects): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $projects->findBy(['deleted' => '1']);

        return $this->render('admin/deletedProjects.html.twig', [
            'controller' => 'admin',
            'projects' => $projects
        ]);
    }

    #[Route('/admin/projects/recover/{id}', name: 'recover')]
    public function recover($id, ProjectsRepository $projects): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $projects->find($id);
        $projects->setDeleted(0);
        $this->em->flush();

        return $this->redirectToRoute('deleted_projects');
    }

    #[Route('/admin/projects/delete/{id}', name: 'delete')]
    public function delete($id, ProjectsRepository $projects): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $projects->find($id);
        $projects->setDeleted(1);
        $this->em->flush();

        return $this->redirectToRoute('projects');
    }
}
