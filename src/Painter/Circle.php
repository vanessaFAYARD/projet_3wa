<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 10/10/2018
 * Time: 18:24
 */

namespace App\Painter;

class Circle extends Ellipse
{
    public function setRadius($radius, $yRadius = 0)
    {
        $this->xRadius = $radius;
        $this->yRadius = $this->xRadius;
    }
}