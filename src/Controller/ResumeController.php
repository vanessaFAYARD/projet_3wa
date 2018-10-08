<?php

namespace App\Controller;

use App\Entity\Resume;
use App\Form\ResumeType;
use App\Repository\ProjectRepository;
use App\Repository\ResumeRepository;
use App\Repository\SkillRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ResumeController extends AbstractController
{
    /**
     * @Route("/resume/add", name="resume_add")
     * @Route("resume/{id}/edit", name="resume_edit")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Resume $resume = NULL)
    {
        if(!$resume) {
            $resume = new Resume();
        }

        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);

        $errors = [];

        if($form->isSubmitted() && !$form->isValid()) {
            $errors = $validator->validate($resume);
        }

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($resume);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('resume/add_resume.html.twig', [
            'formResume' => $form->createView(),
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/resume", name="resume")
     *
     */
    public function show(ResumeRepository $resumeRepository, ProjectRepository $projectRepository, SkillRepository $skillRepository)
    {
        $resumes = $resumeRepository->findAll();
        $projects = $projectRepository->findAll();
        $skills = $skillRepository->findAll();

        return $this->render('resume/resume.html.twig', [
            'resumes' => $resumes,
            'projects' => $projects,
            'skills' => $skills
        ]);
    }
}
