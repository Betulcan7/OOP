<?php

require_once "House.php";
require_once "Room.php";
$House1 = new House();

$Room1 = new Room(5.2, 5.1, 5.5);
$Room2 = new Room(4.8, 4.6, 4.9);
$Room3 = new Room(5.9, 2.5, 3.1);

$House1->addRoom($Room1);
$House1->addRoom($Room2);
$House1->addRoom($Room3);

echo "Inhoud kamers:<br>";
foreach ($House1->getRooms() as $room) {
    echo "- Lengte: " . $room->getLength() . "m Breedte: " . $room->getWidth() . "m Hoogte: " . $room->getHeight() . "m.<br>";
}

echo "<br>Volume Totaal = " . $House1->getTotalVolume() . "m3<br>";
echo "Prijs van het huis is = €" . number_format($House1->getPrice(), 0, ",", ".") . "<br>";

?>
