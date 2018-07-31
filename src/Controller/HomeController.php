<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 26/07/2018
 * Time: 09:12
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('website/home.html.twig');
    }
}