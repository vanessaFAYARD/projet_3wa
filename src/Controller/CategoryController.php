<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryController extends Controller
{
    /**
     * @Route("/category/add", name="category_add")
     * @Route("category/{id}/edit", name="category_edit")
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Category $category = NULL)
    {
        if(!$category) {
            $category = new Category();
        }

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        $errors = [];

        if($form->isSubmitted() && !$form->isValid()) {
            $errors = $validator->validate($category);
        }

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($category);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('category/add_category.html.twig', [
            'formCategory' => $form->createView(),
            'errors' => $errors
        ]);

    }
}
