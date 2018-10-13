<?php

namespace App\Painter;

class Ellipse extends Shape
{
    protected $xRadius;

    protected $yRadius;

    public function __construct()
    {
        // Appelle le constructeur de la class parent, la class Shape
        // On parle d'un appel statique
        parent::__construct();

        $this->xRadius = 0;
        $this->yRadius = 0;
    }

    public function draw(SvgRenderer $renderer)
    {
        $renderer->drawEllipse(
            $this->location,
            $this->color,
            $this->xRadius,
            $this->yRadius,
            $this->opacity,
            $this->stroke,
            $this->strokeColor
        );
    }

    public function setRadius($xRadius, $yRadius)
    {
        $this->xRadius = $xRadius;
        $this->yRadius = $yRadius;
    }
}