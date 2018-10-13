<?php

namespace App\Painter;

class Square extends Rectangle
{
    public function setSize($size, $height = 0)
    {
        $this->width = $size;
        $this->height = $this->width;
    }
}