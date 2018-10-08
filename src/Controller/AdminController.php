<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 30/07/2018
 * Time: 15:17
 */

namespace App\Controller;

use App\Entity\Admin;
use App\Form\RegistrationAdminType;
use App\Repository\AdminRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends Controller
{
    /*
    public function admin(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $admin = new Admin();
        $form = $this->createForm(RegistrationAdminType::class, $admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($admin, $admin->getPassword());

            $admin->setPassword($hash);

            $manager->persist($admin);
            $manager->flush();
        }

        return $this->render('log_adm/log_adm.html.twig', [
            'form' => $form->createView()
        ]);
    }
    */

    /**
     * @Route("/log_admin", name="admin")
     */
    public function login(AuthenticationUtils $authenticationUtils, AdminRepository $admin)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('log_adm/log_adm.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        
    }
}