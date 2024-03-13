<?php

class Flower
{
    // attributen
    public $color;
    public $name;


    // constructor
    function __construct ($name, $color) {
        
        $this->name = $name;
        $this->color = $color;

    }

    function setColor($color) 
    {
        $this->color = $color;
    }


}


$flower1 = new Flower("zonnebloem", "oranje");
$flower2 = new Flower("paardebloem", "wit");

var_dump($flower1);
echo("</br>");
var_dump($flower2);
echo("</br>");

$flower1->setColor ("groen");
var_dump($flower1);

?>