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
    /**
     * @Route("/skills", name="skills_list")
     */
    public function show(SkillRepository $skill)
    {
        return $this->render('skill/show_skill.html.twig', [
            'skill' => $skill
        ]);
    }

    /**
     * @Route("/skills/add", name="skill_add")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Skill $skill = NULL)
    {
        if(!$skill) {
            $skill = new Skill();
        }

        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        $errors = $validator->validate($skill);

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($skill);
            $objectManager->flush();

            return $this->redirectToRoute('skills_list');
        }

        if (!empty($errors)){
            return $this->render('skill/add_skill.html.twig', [
                'formSkill' => $form->createView(),
                'errors' => $errors
            ]);
        }

        return $this->render('skill/add_skill.html.twig', [
            'formSkill' => $form->createView()
        ]);
    }
}