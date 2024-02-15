<?php


require_once "Database.php";

class User extends Database{
    public $username;
    private $password;
    private $role;

    public function registeruser($username, $password, $role) {
        echo "Registeer user <br>";
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;

        // sla de data op in de database.

    }
}



?>