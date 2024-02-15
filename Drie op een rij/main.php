<?php

require_once "Circle.php";
require_once "Rectangle.php";
require_once "Triangle.php";
require_once "Square.php";

// Maak objecten voor elke class
$blueSquare = new Square("blue", 80);
$yellowSquare = new Square("yellow", 80);
$greenSquare = new Square("green", 80);

$blueCircle = new Circle("blue", 50);
$yellowCircle = new Circle("yellow", 50);
$greenCircle = new Circle("green", 50);

$blueRectangle = new Rectangle("blue", 100, 50);
$yellowRectangle = new Rectangle("yellow", 100, 50);
$greenRectangle = new Rectangle("green", 100, 50);

$blueTriangle = new Triangle("blue", 100, 100);
$yellowTriangle = new Triangle("yellow", 100, 100);
$greenTriangle = new Triangle("green", 100, 100);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drie op een rij</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .row {
            display: flex;
            justify-content: center; 
        }
        .shape {
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Drie op een rij</h1>
    
    <div class="container">
        <!-- Vierkanten -->
        <div class="row">
            <div class="shape"><?php echo $blueSquare->draw(); ?></div>
            <div class="shape"><?php echo $yellowSquare->draw(); ?></div>
            <div class="shape"><?php echo $greenSquare->draw(); ?></div>
        </div>

        <!-- Cirkels -->
        <div class="row">
            <div class="shape"><?php echo $blueCircle->draw(); ?></div>
            <div class="shape"><?php echo $yellowCircle->draw(); ?></div>
            <div class="shape"><?php echo $greenCircle->draw(); ?></div>
        </div>

        <!-- Rechthoeken -->
        <div class="row">
            <div class="shape"><?php echo $blueRectangle->draw(); ?></div>
            <div class="shape"><?php echo $yellowRectangle->draw(); ?></div>
            <div class="shape"><?php echo $greenRectangle->draw(); ?></div>
        </div>

        <!-- Driehoeken -->
        <div class="row">
            <div class="shape"><?php echo $blueTriangle->draw(); ?></div>
            <div class="shape"><?php echo $yellowTriangle->draw(); ?></div>
            <div class="shape"><?php echo $greenTriangle->draw(); ?></div>
        </div>
    </div>
</body>
</html>



