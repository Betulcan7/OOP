<?php


require_once "Database.php";

class User extends Database{
    public $username;
    private $password;
    private $role;

    public function registerUser($username, $pwd, $role) {
        echo "Registreer user<br>";
        $this->username = $username;
        $this->password = $pwd;
        $this->role = $role;

        // sla de data op in de database.

    }
}



?>