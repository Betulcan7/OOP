<?php
// Functie: classdefinitie User 
// Auteur: Wigmans

class User{

    // Eigenschappen 
    public $username;
    public $email;
    private $password;
    
    function SetPassword($password){
        $this->password = $password;
    }
    function GetPassword(){
        return $this->password;
    }

    public function ShowUser() {
        echo "<br>Username: $this->username<br>";
        echo "<br>Password: $this->password<br>";
        echo "<br>Email: $this->email<br>";
    }

    public function RegisterUser(){
        $status = false;
        $errors=[];
        if($this->username != "" || $this->password != ""){

            // Check user exist
            try {
                // Maak verbinding met de database
                $pdo = new PDO("mysql:host=localhost;dbname=login_oop", "gebruikersnaam", "wachtwoord");

                // Voorbereidde statement om te controleren of de gebruiker al bestaat
                $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `username` = ?");
                $stmt->execute([$this->username]);
                $existingUser = $stmt->fetch();

                if($existingUser) {
                    array_push($errors, "Gebruikersnaam bestaat al.");
                } else {
                    // Voeg gebruiker toe aan de database
                    $stmt = $pdo->prepare("INSERT INTO `user` (`username`, `password`) VALUES (?, ?)");
                    $stmt->execute([$this->username, $this->password]);

                    // Controleer of de gebruiker succesvol is toegevoegd
                    if ($stmt->rowCount() > 0) {
                        // Gebruiker succesvol toegevoegd
                        $status = true;
                    } else {
                        // Voeg een foutmelding toe aan $errors array
                        array_push($errors, "Er is een fout opgetreden tijdens het toevoegen van de gebruiker aan de database.");
                    }
                }
            } catch (PDOException $e) {
                // Vang eventuele fouten op die optreden bij het maken van de verbinding of het uitvoeren van de query
                array_push($errors, "Databasefout: " . $e->getMessage());
            }  
        }
        return $errors;
    }

    function ValidateUser(){
        $errors=[];

        if (empty($this->username)){
            array_push($errors, "Invalid username");
        } else if (empty($this->password)){
            array_push($errors, "Invalid password");
        }

        // Test username > 3 tekens en < 50 tekens
        
        return $errors;
    }

    public function LoginUser(){

        // Connect database

        // Zoek user in de table user
       echo "Username:" . $this->username;


        // Indien gevonden dan sessie vullen


        return true;
    }

    // Check if the user is already logged in
    public function IsLoggedin() {
        // Check if user session has been set
        
        return false;
    }

    public function GetUser($username){
        
        // Doe SELECT * from user WHERE username = $username
        if (false){
            //Indien gevonden eigenschappen vullen met waarden uit de SELECT
            $this->username = 'Waarde uit de database';
        } else {
            return NULL;
        }   
    }

    public function Logout(){
        session_start();
        // remove all session variables
       

        // destroy the session
        
        header('location: index.php');
    }
}
?>

