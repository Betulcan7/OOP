<?php

class House {
    // Attributen
    private $volume;
    private $rooms = [];

    // Methode om een kamer aan het huis toe te voegen
    public function addRoom($room) {
        $this->rooms[] = $room;
    }

    // Methode om alle kamers van het huis op te halen
    public function getRooms() {
        return $this->rooms;
    }

    // Methode om de totale volume van het huis te berekenen
    public function getTotalVolume() {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->getVolume();
        }
        return $totalVolume;
    }

    // Methode om de prijs van het huis te berekenen
    public function getPrice() {
        $price_per_cubic_meter = 1500; // Prijs per kubieke meter
        return $this->getTotalVolume() * $price_per_cubic_meter;
    }
}

?>
