<?php

class Appointment {
    private Patient $patient;
    private Doctor $doctor;
    private array $nurses;
    private DateTime $beginTime;
    private DateTime $endTime;

    public function __construct(Patient $patient, Doctor $doctor, array $nurses, DateTime $beginTime, DateTime $endTime) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurses = $nurses;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
    }

    public function getCosts(): float {
        // Berekent de duur van de afspraak in uren
        $duration = $this->endTime->diff($this->beginTime)->h;

        // Berekent het salaris van de arts
        $doctorSalary = $this->doctor->calculateSalary();

        // Berekent het salaris van de verpleegkundigen
        $nursesSalary = 0.0;
        foreach ($this->nurses as $nurse) {
            $nursesSalary += $nurse->calculateSalary();
        }

        // Return totale kosten van de afspraak
        return $duration * $doctorSalary + $nursesSalary;
    }
}

?>

