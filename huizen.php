<?php

class House {
    private $floor;
    private $rooms;
    private $width;
    private $height;
    private $depth;
    private $volume;

    public function __construct($floor, $rooms, $width, $height, $depth) {
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->setVolume($width, $height, $depth);
    }

    private function setVolume($width, $height, $depth) {
        $this->volume = $width * $height * $depth;
    }

    public function getHouse() {
        return "Dit huis heeft {$this->floor} verdiepingen, {$this->rooms} kamers en heeft een volume van {$this->volume}m3.";
    }

    public function getPrice() {
        $price_per_cubic_meter = 1500; // Price per cubic meter
        $price = $this->volume * $price_per_cubic_meter;
        return "De prijs van het huis is: " . number_format($price, 0, ",", ".");
    }
}

$house1 = new House(2, 4, 5, 5, 4);
$house2 = new House(3, 6, 6, 5, 5);
$house3 = new House(2, 3, 4, 6, 5);

echo $house1->getHouse() . " " . $house1->getPrice() . "\n";
echo("</br>");
echo $house2->getHouse() . " " . $house2->getPrice() . "\n";
echo("</br>");
echo $house3->getHouse() . " " . $house3->getPrice() . "\n";

?>

