<?php

class Patient extends Person {
    public function __construct(string $name) {
        parent::__construct($name, "Patient");
    }

    public function determineRole(): string {
        return "Patient";
    }
}

?>
