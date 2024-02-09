<?php

require_once "House.php";
require_once "Room.php";
$House1 = new House();

$Room1 = new Room(5,5,5);
$Room2 = new Room(4,4,4);
$Room3 = new Room(2,2,1);

$House1->addRoom($room1);
$House2->addRoom($room2);


?>