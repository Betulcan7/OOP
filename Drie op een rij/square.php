<?php

class Square {
    private $color;
    private int $length;

    public function __construct($color, $length) {
        $this->color = $color;
        $this->length = $length;
    }

    public function draw() {
        return "<svg height='" . $this->length . "' width='" . $this->length . "'>
                    <rect width='" . $this->length . "' height='" . $this->length . "' fill='" . $this->color . "' />
                </svg>";
    }
}

?>
