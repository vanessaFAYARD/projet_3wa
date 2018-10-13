<?php

namespace App\Painter;


class Point
{
    private $x;
    private $y;

    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return "{$this->x},{$this->y}";
    }

    public function move($dx, $dy)
    {
        $this->x += $dx;
        $this->y += $dy;
    }

    public function moveTo($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }
}