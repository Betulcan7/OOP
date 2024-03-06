<?php

abstract class Person {
    protected string $name;
    protected string $role;

    public function __construct(string $name, string $role) {
        $this->name = $name;
        $this->role = $role;
    }

    abstract public function determineRole(): string;

    public function getName(): string {
        return $this->name;
    }
}

?>
