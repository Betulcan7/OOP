<!DOCTYPE html>

<html lang="en">

<body>

	<h3>PDO Login and Registration</h3>
	<hr/>

	<h3>Welcome op de HOME-pagina!</h3>
	<br />
	<?php

	// Activeer de session
	session_start();
	
	// Check login session: staat de user in de session?
	if(!isset($_SESSION['user'])){
		// Alert not login
		echo "U bent niet ingelogd. Login in om verder te gaan.<br><br>";
		// Toon login button
		echo '<a href = "login_form.php">Login</a>';
	} else {
		
		// select userdata from database
		require 'conn.php';
		$id = $_SESSION['user'];
		$sql = $conn->prepare("SELECT * FROM `user` WHERE `username`='$id'");
		$sql->execute();
		$row = $sql->fetch();
		
		// Print userdata
		echo "<h2>Het spel kan beginnen</h2>";
		echo "Je bent ingelogd met:<br/>";
		echo "Inlognaam: " . $row['username'] . "<br/>";
		echo "Password:". $row['password'];
		echo "<br><br>";
		echo '<a href = "logout.php">Logout</a>';
	}
	
	?>

</body>
</html>

