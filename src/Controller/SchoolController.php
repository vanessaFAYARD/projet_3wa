<?php

namespace App\Controller;

use App\Entity\School;
use App\Form\SchoolType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SchoolController extends Controller
{
    /**
     * @Route("/school/add", name="school_add")
     * @Route("school/{id}/edit", name="school_edit")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, School $school = NULL)
    {
        if(!$school) {
            $school = new School();
        }

        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        $errors = [];

        if($form->isSubmitted() && !$form->isValid()) {
            $errors = $validator->validate($school);
        }

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($school);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('school/add_school.html.twig', [
            'formSchool' => $form->createView(),
            'errors' => $errors
        ]);
    }
}
