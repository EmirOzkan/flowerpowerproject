<?php
include_once 'database.php';

if(isset($_POST['login']))
{
	$fieldnames = array('username','password');

	$error = false;

	foreach ($fieldnames as $fieldname) {
		if (!isset($_POST[$fieldname]) OR empty($_POST[$fieldname])){
			$error = true;
		}
	}

	if(!$error){

		$login = new config();
	
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$login->loginmede($username, $password);
	}
}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Flowerpower</title>
    <link rel="icon"  href="img/logo.png">
    <link rel="stylesheet" href="css/loginmede.css">
</head>
<body>
<div class="box">
  <h2 style="color:#87CEEB;">Login Medewerkers</h2>
  <form action="" method="post">
    <div class="inputBox">
      <input type="username" name="username">
      <label>Username</label>
    </div>
    <div class="inputBox">
      <input type="password" name="password">
      <label>Password</label>
    </div>
    <input type="submit" name="login" value="Login">
    <p style="color:#87CEEB;">This page is for empoyees only!</p>
    <p style="color:#87CEEB;">Do not try to register, it won't work ;D</p>
    <p style="color:#87CEEB;">Back to the main menu?<a href="index.php" style="color:#98FB98;"><b>Click here</b></a></p>
  </form>
</div>
</body>
</html> 