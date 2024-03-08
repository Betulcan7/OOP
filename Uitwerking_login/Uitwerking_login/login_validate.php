<?php
	
 
	require_once 'conn.php';
 
	// Is de login button aangeklikt?
	if(ISSET($_POST['login-btn'])){
		// Is username en password ingevuld?
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password = $_POST['password'];
		
			$sql = "SELECT * FROM user WHERE username= :name AND password= :pwd ";
			$query = $conn->prepare($sql);
			$query->execute([
				'name'=>$username,
				'pwd'=>$password
				]);
			// echo $query->debugDumpParams();
			
			
			/* Of optie 2 maar minder veilig maar handig voor debug
			$sql = "SELECT * FROM user WHERE username= $username AND password=$password";
			echo $sql;
			$query = $conn->prepare($sql);
			$query->execute();
			*/
			$cnt = $query->rowCount();
			
			if($cnt > 0) {
				// Rij uit de dataset selecteren
				$row = $query->fetch();
				
				// Session vullen
				session_start();
				$_SESSION['user'] = $row['username'];
				
				// Ga naar de homepage
				header("location: index.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'login_form.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}
?>