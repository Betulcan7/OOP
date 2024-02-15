<?php

// auteur:
// functie: startpagina

require_once "user.php";


// maak object user aan
$user = new User();

// Registreer user
$user->registeruser("jantje", "geheim", "admin");

var_dump($user);




?>