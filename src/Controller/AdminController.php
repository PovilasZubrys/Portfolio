<?php

namespace App\Controller;

use App\Entity\Projects;
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
    public function newProject(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $lastPos = $this->em->createQueryBuilder()
            ->select('p.position')
            ->from(Projects::class, 'p')
            ->orderBy('p.position', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();


        $form = $this->createForm(NewProjectType::class);
        $form->handleRequest($request);

        if($lastPos != null) {
            $nextPos = $lastPos['position'] + 1;
            $form->get('position')->setData($nextPos);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->em->persist($data);
            $this->em->flush();

            return $this->redirectToRoute('projects');
        }
        return $this->render('admin/newProject.html.twig', [
            'controller' => 'admin',
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/projects', name: 'projects')]
    public function projects(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $this->projectsRepository->findBy(['deleted' => '0']);

        return $this->render('admin/projects.html.twig', [
            'controller' => 'admin',
            'projects' => $projects
        ]);
    }

    #[Route('/admin/projects/deleted', name: 'deleted_projects')]
    public function deletedProjects(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $this->projectsRepository->findBy(['deleted' => '1']);

        return $this->render('admin/deletedProjects.html.twig', [
            'controller' => 'admin',
            'projects' => $projects
        ]);
    }

    #[Route('/admin/projects/recover/{id}', name: 'recover')]
    public function recover($id): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $this->projectsRepository->find($id);
        $projects->setDeleted(0);
        $this->em->flush();

        return $this->redirectToRoute('deleted_projects');
    }

    #[Route('/admin/projects/delete/{id}', name: 'delete')]
    public function delete($id): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $projects = $this->projectsRepository->find($id);
        $projects->setDeleted(1);
        $this->em->flush();

        return $this->redirectToRoute('projects');
    }

    #[Route('/admin/projects/edit/{id}', name: 'edit')]
    public function edit($id, Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $result = $this->projectsRepository->findOneBy([
            'id' => $id
        ]);

        $oldPos = $result->getPosition();

        $form = $this->createForm(NewProjectType::class, $result);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $currentProjectWithPosition =
                $this->em->createQueryBuilder()
                    ->select('p.position, p.id')
                    ->from(Projects::class, 'p')
                    ->where('p.position = ' . $data->getPosition() . ' AND p.id != ' . $id)->getQuery()->getOneOrNullResult();

            if (!empty($currentProjectWithPosition)) {
                $projectToUpdate = $this->projectsRepository->findOneBy(['id' => $currentProjectWithPosition['id']]);
                $projectToUpdate->setPosition($oldPos);
            }

            $this->em->persist($data);
            $this->em->flush();

            return $this->redirectToRoute('projects');
        }

        return $this->render('admin/editProject.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/update', name: 'update')]
    public function updateWebsite()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        chdir('..');
        $output = shell_exec('sh build.sh');
        chdir('public');

        return $this->render('admin/index.html.twig', [
            'releaseLog' => $output
        ]);
    }
}
