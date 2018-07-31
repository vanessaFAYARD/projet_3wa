<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 30/07/2018
 * Time: 15:17
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/log_admin", name="admin")
     */
    public function admin()
    {
        return $this->render('log_adm/log_adm.html.twig');
    }
}