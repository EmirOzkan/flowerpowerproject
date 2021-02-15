<?php
include_once 'database.php';

if(isset($_POST['register']))
{	

	$fieldnames = array('username', 'email', 'password');

	$error = false;

	foreach ($fieldnames as $fieldname) {
		if (!isset($_POST[$fieldname]) OR empty($_POST[$fieldname])) {
			$error = true;
		}
	}

	if (!$error) {
		$register = new config();

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$register->insertDetails($username, $email, $password);
	}

}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Flowerpower</title>
    <link rel="icon"  href="img/logo.png">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="box">
  <h2 style="color:#87CEEB;">Register</h2>
  <form action="register.php" method="post">
    <div class="inputBox">
      <input type="username" name="username">
      <label>Username</label>
    </div>
    <div class="inputBox">
      <input type="email" name="email">
      <label>Email</label>
    </div>
    <div class="inputBox">
      <input type="password" name="password">
      <label>Password</label>
    </div>
    <input type="submit" name="register" value="Register">
    <p style="color:#87CEEB;">Already a account? <a href="login.php" style="color:#98FB98;"><b>Login here</b></a></p>
    <p style="color:#87CEEB;">Back to the main menu?<a href="index.php" style="color:#98FB98;"><b>Click here</b></a></p>
  </form>
</div>
</body>
</html> 