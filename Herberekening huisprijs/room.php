<?php

class Room {
    // Attributen
    private $length;
    private $width;
    private $height;

    // Constructor
    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    // Getter voor hoogte
    public function getHeight() {
        return $this->height;
    }

    // Getter voor breedte
    public function getWidth() {
        return $this->width;
    }

    // Getter voor lengte
    public function getLength() {
        return $this->length;
    }

    // Methode om volume van de kamer te berekenen
    public function getVolume() {
        return $this->length * $this->width * $this->height;
    }
}

?>
