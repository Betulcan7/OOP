<?php


class room {

    // attributen van het kamer
    private float $length;
    private float $width;
    private float $height;


    public function __construct($length, $width, $height) {

        $this->length = $length;
        $this->width = $width;
        $this->height = $height;

    }
}


public function getHeight() {
    $this->height = $height;
}

public function getWidth() {
    $this->width = $width;
}

public function getLength() {
    $this->length = $length;
}

public function getVolume() {
    
}



?>