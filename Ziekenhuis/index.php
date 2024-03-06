<?php

require_once "Person.php";
require_once "Patient.php";
require_once "Staff.php";
require_once "Doctor.php";
require_once "Nurse.php";
require_once "Appointment.php";

// maakt een patient
$patient = new Patient("patient");

// maakt een dokter
$doctor = new Doctor("doctor", 100.0);

// maakt een verpleegkundige
$nurse1 = new Nurse("Nurse 1", 50.0);
$nurse2 = new Nurse("Nurse 2", 50.0);

// Maakt een afspraak tussen patient, dokter en verpleegkundigen
$beginTime = new DateTime("2024-02-10 10:00:00");
$endTime = new DateTime("2024-02-10 11:00:00");
$appointment = new Appointment($patient, $doctor, [$nurse1, $nurse2], $beginTime, $endTime);

// Toont de kosten van de afspraak
echo "Appointment costs: $" . $appointment->getCosts();

?>
