<?php

// Doel: registeer nieuwe gebruiker
// Auteur: Rob Wigmans

// Initialisatie

	// Connectie database: user/password, naam database, URL: localhost
	include "conn.php";

	$username = $_POST['username'];
	$password = $_POST['password'];


// Main

// Vallidatie: username > 3 tekens en < 50 tekens

$len_username = strlen($username);
echo $len_username;
echo "</br>";
if ($len_username > 3 && $len_username < 50) {
	echo "ok";
	// Zoek username op in database
	
	// SELECT * FROM `user` WHERE username = 'test' 
	$sql = "SELECT * FROM user WHERE username = :name";
	$query = $conn->prepare($sql);
	$query->execute(['name'=>$username]);
	//echo $query->debugDumpParams();
	
	// Haal 1 rij data op
	$data = $query->fetch();
	
	
	// komt de username voor in de database?
	if ($data) {
		// Username bestaat al
		echo "Username bestaat al</br>";

	} else {
		// username opslaan in tabel login
		// INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '');
		// Manier 1
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
		
		/*
		// Manier 2 (gevaarlijk ivm SQL-injection)
		$sql = "INSERT INTO user VALUES ('$username', '$password', '')";
		echo $sql;
		$query = $conn->prepare($sql);
		$query->execute();
		*/
		
	}
} else {
	
	echo "
				<script>alert('Ongeldige Username!')</script>
				<script>window.location = 'register.php'</script>
			";
}

?>
