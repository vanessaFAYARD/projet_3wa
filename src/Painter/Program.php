<?php

namespace App\Painter;

class Program
{
    public function run(SvgRenderer $renderer)
    {
        // Création et initialisation des formes géométriques
        $shape = new Rectangle();
        $shape->setColor('firebrick');
        $shape->setLocation(50, 20);
        $shape->setSize(200, 100);
        $renderer->addShape($shape);

        $shape = new Ellipse();
        $shape->setColor('seagreen');
        $shape->setLocation(600,180);
        $shape->setRadius(40, 80);
        $renderer->addShape($shape);

        $shape = new Square();
        $shape->setLocation(400, 200);
        $shape->setColor('deepskyblue');
        $shape->setSize(100);
        $shape->setOpacity(.5);
        $renderer->addShape($shape);

        $shape = new Circle();
        $shape->setLocation(300, 250);
        $shape->setColor('gold');
        $shape->setOpacity(.33);
        $shape->setRadius(180);
        $shape->setStroke(3);
        $shape->setStrokeColor('red');
        $renderer->addShape($shape);

        $shape = new Triangle();
        $shape->setCoordinates(60,60,200,250,60,250);
        $shape->setColor('purple');
        $shape->setOpacity(.75);
        $renderer->addShape($shape);

        $shape = new Polygon();
        $shape->setCoordinates([
            new Point(360, 20),
            new Point(400, 40),
            new Point(400, 80),
            new Point(360, 100),
            new Point(320, 80),
            new Point(320, 40),
        ]);
        $shape->setColor('brown');
        $shape->setOpacity(.25);
        $renderer->addShape($shape);

        // Exécution du moteur graphique
        $renderer->run();
    }
}