<?php

class Database {

    private $username = "root";
    private $password = "";
    private $dbname = "login2";
    private $hostname = "localhost";
    

    // connect database
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connected successfully"; // Dit zal worden weergegeven wanneer de verbinding tot stand is gebracht
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$db = new Database();
var_dump($db);

?>