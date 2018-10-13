<?php

namespace App\Painter;

abstract class Shape
{
    protected $color;

    protected $location;

    protected $opacity;

    protected $stroke;

    protected $strokeColor;

    public function __construct()
    {
        $this->color = 'black';
        $this->location = new Point();
        $this->opacity = 1;
        $this->stroke = 0;
        $this->strokeColor = 'black';
    }

    // Méthode abstraite draw(), elle ne contient rien
    // Chaque classe qui hérite de Shape doit impérativement implémenter une méthode draw()
    abstract function draw(SvgRenderer $renderer);

    public function setLocation($x, $y)
    {
        $this->location->moveTo($x, $y);
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }

    public function setStroke(int $stroke)
    {
        $this->stroke = $stroke;
    }

    public function setStrokeColor(string $strokeColor)
    {
        $this->strokeColor = $strokeColor;
    }
}