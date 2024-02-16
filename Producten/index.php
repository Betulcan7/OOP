<?php

require_once "productlist.php";
require_once "music.php";
require_once "movie.php";
require_once "game.php";

// Maak een nieuwe productenlijst
$productList = new ProductList();

// Voeg muziek toe aan de productenlijst
$music = new Music("Test1", 7.09, 21, "Extra info", 0.50, "Music", "Artiest 1", ["number 1", "number 2"]);
$productList->addProduct($music);

$music2 = new Music("Test2", 15.13, 21, "Extra info", 1.00, "Music", "Artiest 2", ["number 3", "number 4"]);
$productList->addProduct($music2);

// Voeg films toe aan de productenlijst
$movie1 = new Movie("Starwars 1", 15.13, 21, "Extra info", 0.5, "DVD", "HD");
$productList->addProduct($movie1);

$movie2 = new Movie("Starwars 2", 22.39, 21, "Extra info", 1.0, "Blueray", "Full HD");
$productList->addProduct($movie2);

// Voeg games toe aan de productenlijst
$game = new Game("Call of Duty", 17.87, 21, "Extra info", 0.50, "FPS", "Action", ["8gb geheugen", "970 GTX"]);
$productList->addProduct($game);

$game2 = new Game("Call of Duty 2", 213.92, 21, "Extra info", 1.00, "FPS", "Action", ["16gb geheugen", "2070 RTX"]);
$productList->addProduct($game2);

// Toon alle producten
$productList->displayProducts();

?>
