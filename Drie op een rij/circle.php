<?php

class Circle {
    private $color;
    private int $length;

    public function __construct($color, $length) {
        $this->color = $color;
        $this->length = $length;
    }

    public function draw() {
        return "<svg height='" . ($this->length) . "' width='" . ($this->length) . "'>
                    <circle cx='" . ($this->length / 2) . "' cy='" . ($this->length / 2) . "' r='" . ($this->length / 2) . "' fill='" . $this->color . "' />
                </svg>";
    }
}


?>