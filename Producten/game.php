<?php

class Game {
    private string $name;
    private float $purchasePrice;
    private int $tax;
    private string $description;
    private float $profit;
    private string $category;
    private string $genre;
    private array $requirements;

    public function __construct($name, $purchasePrice, $tax, $description, $profit, $category, $genre, $requirements) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->description = $description;
        $this->profit = $profit;
        $this->category = $category;
        $this->genre = $genre;
        $this->requirements = $requirements;
    }
    
    // Getter voor de naam
    public function getName(): string {
        return $this->name;
    }

    // Getter voor de categorie
    public function getCategory(): string {
        return $this->category;
    }

    // Getter voor de verkoopprijs
    public function getSalesPrice(): float {
        // Bereken de verkoopprijs (inkoopprijs + winst + btw)
        return $this->purchasePrice + $this->profit + ($this->purchasePrice * $this->tax / 100);
    }

    // Getter voor de informatie
    public function getInfo(): string {
        return "Extra info, Genre: {$this->genre}, Requirements: " . implode(", ", $this->requirements);
    }
}

?>


