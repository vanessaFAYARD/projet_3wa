<?php

namespace App\Controller;

use App\Painter\Program;
use App\Painter\SvgRenderer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PainterController extends Controller
{
    /**
     * @Route("/project/{id}/painter", name="painter")
     */
    public function index()
    {
        $program = new Program();
        $svgRenderer = new SvgRenderer();

        $program->run($svgRenderer);

        return $this->render('project/painter.html.twig', [
            'svgRenderer' => $svgRenderer->getResult()
        ]);
    }
}
