<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CompanyController extends Controller
{
    /**
     * @Route("/company/add", name="company_add")
     * @Route("company/{id}/edit", name="company_edit")
     *
     */
    public function form(Request $request, ObjectManager $objectManager, ValidatorInterface $validator, Company $company = NULL)
    {
        if(!$company) {
            $company = new Company();
        }

        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        $errors = [];

        if($form->isSubmitted() && !$form->isValid()) {
            $errors = $validator->validate($company);
        }

        if($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($company);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('company/add_company.html.twig', [
            'formCompany' => $form->createView(),
            'errors' => $errors
        ]);
    }
}
