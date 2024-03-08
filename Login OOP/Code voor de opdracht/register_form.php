<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h3>PHP - PDO Login and Registration</h3>
    <hr/>

    <form action="register_form.php" method="POST">  
        <h4>Register here...</h4>
        <hr>
        
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <br />
        <div>
            <button type="submit" name="register-btn">Register</button>
        </div>
        <a href="index.php">Home</a>
    </form>

    <?php
    if(isset($_POST['register-btn'])){
        require_once('classes/user.php');
        $user = new User();

        $user->username = $_POST['username'];
        $user->SetPassword($_POST['password']);

        $errors = $user->RegisterUser();

        if(count($errors) > 0){
            $message = implode("<br>", $errors);
            echo "<script>alert('" . $message . "')</script>";
        } else {
            echo "<script>alert('User registered successfully')</script>";
            // Redirect to login page or any other page after successful registration
            // header("location: login_form.php");
        }
    }
    ?>
</body>
</html>
