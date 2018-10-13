<?php
/**
 * Created by PhpStorm.
 * User: uneviemotrose
 * Date: 10/10/2018
 * Time: 15:49
 */

namespace App\Painter;



class SvgRenderer
{
    // Tableau de chaînes de caractères de balises SVG
    private $results;

    // Tableau d'objets géométriques de la classe Shape ou de ses dérivés (= ses enfants)
    private $shapes;

    public function __construct()
    {
        $this->results = [];
        $this->shapes = [];
    }

    public function addShape(Shape $shape)
    {
        // ajout d'un objet géométrique au tableau d'objets
        array_push($this->shapes, $shape);
        // Autre façon de l'écrire
//        $this->shapes[] = $shape;
    }

    public function drawEllipse(Point $center, $color, $xRadius, $yRadius, $opacity, $stroke, $strokeColor)
    {
        // Ajout d'une balise SVG <ellipse>
        array_push(
            $this->results,
            "<ellipse cx='{$center->getX()}' cy='{$center->getY()}' rx='$xRadius' ry='$yRadius' fill='$color' opacity='$opacity' stroke='$strokeColor' stroke-width='$stroke' />"
        );
    }

    public function drawPolygon(array $points, $color, $opacity, $stroke, $strokeColor)
    {
        // Ajout d'une balise SVG <polygon>
        $points = implode(' ', $points);
        // Lors de l'affichage de nos instances de Point, __toString() est appelée retournant x,y

        array_push(
            $this->results,
            "<polygon points='$points' fill='$color' opacity='$opacity' stroke='$strokeColor' stroke-width='$stroke' />"
        );
    }

    public function drawRectangle(Point $origin, $color, $width, $height, $opacity)
    {
        // Création de variables intermédiaires si besoin

        // Ajout d'une balise SVG <rect>
        array_push(
            $this->results,
            "<rect x='{$origin->getX()}' y='{$origin->getY()}' width='$width' height='$height' fill='$color' opacity='$opacity' />"
        );
    }

    public function drawTriangle(Point $point1, Point $point2, Point $point3, $color, $opacity, $stroke, $strokeColor)
    {
        // Ajout d'une balise SVG <polygon>
        // Lors de l'affichage de nos instances de Point, __toString() est appelée retournant x,y
        array_push(
            $this->results,
            "<polygon points='$point1 $point2 $point3' fill='$color' opacity='$opacity' stroke='$strokeColor' stroke-width='$stroke' />"
        );
    }

    public function getResult()
    {
        // On serialize nos résultats en les mettants côté à côté (nos balises SVG)
        return '<svg width="800" height="600">'.implode($this->results).'</svg>';
    }

    public function run()
    {
        // Boucle sur le tableau d'objets géométriques
        foreach ($this->shapes as $shape) {
            $shape->draw($this);
        }
    }
}