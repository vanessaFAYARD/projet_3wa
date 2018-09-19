<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactMailController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     *
     */
   public function contact(Request $request, ValidatorInterface $validator)
    {

        $firstName = $lastName = $email = $object = $message =  NULL;
        $contact_error_firstNameMin = NULL;

        $form = $this->createFormBuilder()
            ->add('firstName',
                TextType::class,
                array(
                    'constraints' => array(
                        new NotBlank(array('message' => 'Merci de saisir votre Nom')),
                        new Length(array(
                            'min' => 3,
                            'minMessage' => 'Le champ Nom doit contenir au moins 3 caractères'
                        )))))
            ->add('lastName',
                TextType::class,
                array(
                    'constraints' => array(
                        new NotBlank(array('message' => 'Merci de saisir votre Prénom')),
                        new Length(array(
                            'min' => 3,
                            'minMessage' => 'Le champ Prénom doit contenir au moins 3 caractères'
                        )))))
            ->add('object',
                TextType::class,
                array(
                    'constraints' => array(
                        new NotBlank(
                            array(
                                'message' => 'Merci de saisir l\'objet de votre message')),
                        new Length(array(
                            'min' => 3,
                            'minMessage' => 'Le champ Objet doit contenir au moins 3 caractères'
                        )))))
            ->add('email',
                EmailType::class,
                array(
                    'constraints' => array(
                        new NotBlank(array('message' => 'Merci de saisir votre email')),
                        new Email(array(
                            'message' => 'Merci de saisir un email valide',
                            'checkMX' => true
                        )))))
            ->add('message',
                TextareaType::class,
                array(
                    'constraints' => array(
                        new NotBlank(array('message' => 'Merci de saisir votre message')),
                        new Length(array(
                            'min' => 8,
                            'minMessage' => 'le champ doit contenir au moins 8 caractères'
                        )))))
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        /* if ($form->isSubmitted()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            dump($data);
            $firstName = $form["firstName"]->getData();
            $lastName = $form["lastName"]->getData();
            $email = $form["email"]->getData();
        } */

        $errors = $validator->validate($form);

        if ($form->isSubmitted() && $form->isValid()) {
            //$data = $form->getData();
            //$this->mail_utf8($data);
            if ($request->isMethod('POST')){
                $this->addFlash(
                    'notice',
                    'Ok');
                $this->addFlash(
                    'sent',
                    'Ok');
            } else {
                $this->addFlash(
                    'notice',
                    'form can\'t be reached like this');
            }
        }


        return $this->render('contact/form_contact.html.twig', [
            'formContact' => $form->createView(),
            'firstName'   => $firstName,
            'lastName'    => $lastName,
            'email'       => $email,
            'object'     => $object,
            'message'    => $message,
            'errors'      => $errors
        ]);


        /*
        $defaultData = array('message' => 'Type your message here');
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class)
        $form = $this->createFormBuilder($defaultData)
            ->add('firstName', TextType::class)
            ->add('message', TextareaType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            dump($data);
        } */
    }


    public function mail_utf8(array $data)
    {
        dump($data);
        $to = 'vanessa.fayard@gmail.com';

        $name = $data["firstName"].' '.$data['lastName'];
        $email = $data["email"];
        $object = $data["object"];
        $message = $data["message"];

        $from_user = "=?UTF-8?B?".base64_encode($name)."?=";
        $subject = "=?UTF-8?B?".base64_encode($object)."?=";

        $headers = "From: $from_user <$email>\r\n".
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";


        return mail($to, $subject, $message, $headers);
    }
}
