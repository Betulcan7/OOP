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
    
        try {
            // Maak verbinding met de database
            $pdo = new PDO("mysql:host=localhost;dbname=login_oop", "jouw_gebruikersnaam", "jouw_wachtwoord");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Inschakelen van foutmodus voor uitzonderingen
    
            // Voorbereidde statement om de gebruiker toe te voegen aan de database
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
        } catch (PDOException $e) {
            // Vang eventuele fouten op die optreden bij het maken van de verbinding of het uitvoeren van de query
            array_push($errors, "Databasefout: " . $e->getMessage());
        }  
    
        return $errors;
    }
    
    
    

    function ValidateUser(){
        $errors=[];

        if (empty($this->username)){
            array_push($errors, "Gebruikersnaam mag niet leeg zijn.");
        } elseif (strlen($this->username) < 3 || strlen($this->username) > 50) {
            array_push($errors, "Gebruikersnaam moet tussen de 3 en 50 tekens lang zijn.");
        }

        if (empty($this->password)){
            array_push($errors, "Wachtwoord mag niet leeg zijn.");
        }
    
        return $errors;
    }

    public function LoginUser(){
        // Connecteer met de database
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=login_oop", "gebruikersnaam", "wachtwoord");
        } catch (PDOException $e) {
            die("Databasefout: " . $e->getMessage());
        }
    
        // Zoek gebruiker in de tabel 'user'
        $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `username` = ?");
        $stmt->execute([$this->username]);
        $user = $stmt->fetch();
    
        if ($user) {
            // Gebruiker gevonden, vul de sessie
            $_SESSION['username'] = $this->username;
            return true;
        } else {
            // Gebruiker niet gevonden
            return false;
        }
    }
    
    // Check if the user is already logged in
    public function IsLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function GetUser($username){
        // Maak verbinding met de database
        $pdo = new PDO("mysql:host=localhost;dbname=login_oop", "jouw_gebruikersnaam", "jouw_wachtwoord");
    
        
        $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `username` = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Controleer of de gebruiker is gevonden
        if ($user) {
            
            $this->username = $user['username'];
            $this->email = $user['email']; 
            
        } else {
            // Gebruiker niet gevonden, retourneer NULL
            return NULL;
        }
    }
    
    public function Logout(){
        // Start de sessie
        session_start();
    
        // Verwijder alle sessievariabelen
        $_SESSION = [];
    
        // Vernietig de sessie
        session_destroy();
    
        // Stuur de gebruiker terug naar de indexpagina
        header('location: index.php');
        exit; 
    }
}
?>
