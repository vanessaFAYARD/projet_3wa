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
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Category $category = NULL)
    {
        if(!$category) {
            $category = new Category();
        }

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        $errors = $validator->validate($category);

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($category);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        if(!empty($errors)) {
            return $this->render('category/add_category.html.twig', [
                'formCategory' => $form->createView(),
                'errors' => $errors
            ]);
        }

        return $this->render('category/add_category.html.twig', [
            'formCategory' => $form->createView()
        ]);

    }
}
