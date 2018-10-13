<?php

namespace App\Painter;

class Polygon extends Shape
{
    protected $coordinates;

    public function __construct()
    {
        parent::__construct();

        $this->coordinates = [];
    }

    public function draw(SvgRenderer $renderer)
    {
        $renderer->drawPolygon(
            $this->coordinates,
            $this->color,
            $this->opacity,
            $this->stroke,
            $this->strokeColor
        );
    }

    public function addCoordinate(Point $coordinate)
    {
        $this->coordinates[] = $coordinate;
    }
    public function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;
    }
}