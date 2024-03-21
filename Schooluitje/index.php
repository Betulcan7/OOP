<?php

require_once "vendor/autoload.php";  // Laadt alle afhankelijkheden van het project via composer.

use Schooltrip\Person; // Importeert de Person klasse.
use Schooltrip\Teacher; // Importeert de Teacher klasse.
use Schooltrip\Student; // Importeert de Student klasse.
use Schooltrip\Group; // Importeert de Group klasse.
use Schooltrip\Schooltrip; // Importeert de Schooltrip klasse.

// Creëert twee groepen met unieke namen.
$group = new Group("SOD2A");
$group2 = new Group("SOD2B");

// Creëert studenten en wijst ze toe aan de gecreëerde groupen.
$student1 = new Student("Piet", $group);
$student2 = new Student("Jan", $group, true, true);
$student3 = new Student("Kees", $group2, true, true);
$student4 = new Student("Klaas", $group2, true, true);
$student5 = new Student("Mohammed", $group, true);
$student6 = new Student("Eefje", $group2, true, true);
$student7 = new Student("Martijn", $group2);
$student8 = new Student("Pieter", $group, true, true);

// Creëert leraren met hun namen en salarissen.
$teacher1 = new Teacher("Wigmans", 10000);
$teacher2 = new Teacher("Brugge", 9500);
$teacher3 = new Teacher("van Helden", 9000);
$teacher4 = new Teacher("vd Lugt", 15000);

// Creëert een schoolreis naar de Efteling.
$schooltrip = new Schooltrip("Efteling");

// Voegt studenten toe aan de schoolreis.
$schooltrip->addStudent($student1);
$schooltrip->addStudent($student2);
$schooltrip->addStudent($student3);
$schooltrip->addStudent($student4);
$schooltrip->addStudent($student5);
$schooltrip->addStudent($student6);
$schooltrip->addStudent($student7);
$schooltrip->addStudent($student8);

// Haalt de lijst van schoolreizen op.
$schooltrip->getSchooltripList();

// Start het genereren van een HTML-tabel om de schoolgegevens weer te geven.
print "<pre>";
// var_dump($schooltrip);  // Gecommenteerd: zou de volledige structuur van het schooltrip-object dumpen.

print "<table border='1'>
            <thead>
                <tr>
                    <th>Docent</th>
                    <th>Student</th>
                    <th>Klas</th>
                    <th>Betaald</th>
                </tr>
            </thead>";
foreach($schooltrip->getSchooltripList() as $schooltripList) {
    $students = $schooltripList->getStudentList();
    print "<tr>";
    // Toont de naam van de leraar voor elke schoolreislijst.
    print "<td>".$schooltripList->getTeacher()->getName()."</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    ";
print "</tr>";

// Loopt door elke student in de lijst en toont hun gegevens.\
// Toont de groepsnaam; deze regel bevat een fout, omdat 'getClassname' een string teruggeeft,
// geen object met een 'getGroupname' methode.
foreach ($students as $student)
{
    print "<tr>";
    print "<td></td>
            <td>".$student->getName()."</td>
            <td>".$student->getClassname()->getGroupname()."</td>
            <td>".$student->getPaid()."</td>
            ";
        print "</tr>";
}

}
print "</table>";


?>