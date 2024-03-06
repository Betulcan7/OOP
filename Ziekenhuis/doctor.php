<?php

class Doctor extends Staff {
    public function __construct(string $name, float $salary = 0.0) {
        parent::__construct($name, "Doctor", $salary);
    }

    public function determineRole(): string {
        return "Doctor";
    }

    public function calculateSalary(): float {
        return 0.0; // Dokters krijgen alleen betaald per afspraak
    }
}

?>


