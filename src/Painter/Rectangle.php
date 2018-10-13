<?php

namespace App\Painter;

class Rectangle extends Shape
{
    protected $height;

    protected $width;

    public function __construct()
    {
        // Appelle le constructeur de la class parent, la class Shape
        // On parle d'un appel statique
        parent::__construct();

        $this->height = 0;
        $this->width  = 0;
    }

    public function draw(SvgRenderer $renderer)
    {
        $renderer->drawRectangle(
            $this->location,
            $this->color,
            $this->width,
            $this->height,
            $this->opacity
        );
    }

    public function setSize($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}