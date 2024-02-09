<?php


class House {

    // attributen van het huis
    private int $floor;
    private int $rooms;
    private Room $rooms[];

    public function {
        $this->floor = $floor;
        $this->rooms = $rooms;

    }

}

public function addRooms() {

}

public function getRooms() {

    return "Inhoud kamers: </br> Lengte: {$this->length} Breedte: {$this->width} Hoogte: {$this->height}.";
}

public function getTotalVolume() {

    return "Volume Totaal = {$this->volume}.";
}

public function getPrice() {

    return "Prijs van het huis is = {$this->price}.";
}

?>