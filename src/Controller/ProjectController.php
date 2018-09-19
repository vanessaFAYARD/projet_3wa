<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 06/08/2018
 * Time: 10:33
 */

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProjectController extends AbstractController
{
    public function show(ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->findAll();

        return $this->render('project/show_project.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/projects/add", name="project_add")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Project $project = NULL)
    {
        if(!$project) {
            $project = new Project();
        }

        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        $errors = $validator->validate($project);

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($project);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        if(!empty($errors)) {
            return $this->render('project/add_project.html.twig', [
                'formProject' => $form->createView(),
                'errors' => $errors
            ]);
        }

        return $this->render('project/add_project.html.twig', [
            'formProject' => $form->createView()
        ]);
    }

}