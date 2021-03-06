<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 06/08/2018
 * Time: 11:38
 */

namespace App\Controller;


use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class SkillController extends AbstractController
{
    public function show(SkillRepository $skillRepository)
    {
        $skills = $skillRepository->findAll();
        return $this->render('skill/skill.html.twig', [
            'skills' => $skills
        ]);

    }

    /**
     * @Route("/skills/add", name="skill_add")
     * @Route("skills/{id}/edit", name="skill_edit")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Skill $skill = NULL)
    {
        if(!$skill) {
            $skill = new Skill();
        }

        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        $errors = [];

        if($form->isSubmitted() && !$form->isValid()) {
            $errors = $validator->validate($skill);
        }
        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($skill);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('skill/add_skill.html.twig', [
            'formSkill' => $form->createView(),
            'errors' => $errors
        ]);
    }
}