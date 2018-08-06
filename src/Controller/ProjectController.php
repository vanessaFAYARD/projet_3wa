<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 06/08/2018
 * Time: 10:33
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects_list")
     */
    public function project()
    {
        return $this->render('project/show_project.html.twig');
    }
}