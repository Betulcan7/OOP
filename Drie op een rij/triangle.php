<?php

class Triangle {
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
                  <polygon points='0," . $this->height . " " . $this->width . "," . $this->height . " " . ($this->width / 2) . ",0' fill='" . $this->color . "' />
              </svg>";
  }
  
}
?>
