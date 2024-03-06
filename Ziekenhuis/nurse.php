<?php

class Nurse extends Staff {
    public function __construct(string $name, float $salary = 0.0) {
        parent::__construct($name, "Nurse", $salary);
    }

    public function determineRole(): string {
        return "Nurse";
    }

    public function calculateSalary(): float {
        return $this->salary; // Salaris van de verpleegkundige
    }
}

?>
