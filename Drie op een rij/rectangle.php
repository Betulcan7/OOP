<?php

class Rectangle {
    private $color;
    private int $height;
    private int $width;

    public function __construct($color, $height, $width) {
        $this->color = $color;
        $this->height = $height;
        $this->width = $width;
    }

    public function draw() {
        return "<svg height='" . $this->height . "' width='" . $this->width . "'>
                    <rect width='" . $this->width . "' height='" . $this->height . "' fill='" . $this->color . "' />
                </svg>";
    }
    
    
}
?>
