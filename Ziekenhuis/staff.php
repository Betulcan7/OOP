<?php

abstract class Staff extends Person {
    protected float $salary;

    public function __construct(string $name, string $role, float $salary = 0.0) {
        parent::__construct($name, $role);
        $this->salary = $salary;
    }

    abstract public function calculateSalary(): float;

    public function getSalary(): float {
        return $this->salary;
    }
}

?>
