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
                if(true){
                    array_push($errors, "Username bestaat al.");
                } else {
                    $sql = "INSERT INTO user VALUES (:name, :pwd, '')";
		            $query = $conn->prepare($sql);
		            $query->execute([
			        'name'=>$username,
			        'pwd'=>$password
			    ]);
		
		echo "
				<script>alert('New record created successfully!')</script>
				<script>window.location = 'login_form.php'</script>
			";
                    
                    $status = true;
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
        // Check if the user is already logged in
        public function IsLoggedin() {
         // Start de sessie
        session_start();

        // Controleer of de sessievariabele voor ingelogde gebruiker is ingesteld
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
        }


        public function GetUser($username){
            // Maak verbinding met de database
            $pdo = new PDO("mysql:host=localhost;dbname=login_oop", "jouw_gebruikersnaam", "jouw_wachtwoord");
        
            // Voorbereidde statement om de gebruiker op te halen met de opgegeven gebruikersnaam
            $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `username` = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Controleer of de gebruiker is gevonden
            if ($user) {
                // Vul de eigenschappen van het User-object met waarden uit de database
                $this->username = $user['username'];
                $this->email = $user['email']; // Als je ook de e-mail van de gebruiker wilt ophalen
                // Andere eigenschappen kunnen hier worden toegevoegd
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
        
            // Stuur de gebruiker terug naar de indexpagina of een andere gewenste bestemming
            header('location: index.php');
            exit; // Zorg ervoor dat er na de header() geen andere code wordt uitgevoerd
        }
        


    }

    

?>