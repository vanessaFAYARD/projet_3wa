<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 10/10/2018
 * Time: 18:32
 */

namespace App\Painter;


class Triangle extends Shape
{
    private $point1;
    private $point2;
    private $point3;

    public function __construct()
    {
        parent::__construct();

        $this->point1 = new Point();
        $this->point2 = new Point();
        $this->point3 = new Point();
    }

    public function draw(SvgRenderer $renderer)
    {
        $renderer->drawTriangle(
            $this->point1,
            $this->point2,
            $this->point3,
            $this->color,
            $this->opacity,
            $this->stroke,
            $this->strokeColor
        );
    }

    public function setCoordinates($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $this->point1->moveTo($x1, $y1);
        $this->point2->moveTo($x2, $y2);
        $this->point3->moveTo($x3, $y3);
    }
}