<?php
include 'database2.php';
	$sql = "SELECT * FROM medewerkers WHERE id = :id";

	$query = $conn->prepare($sql);

	$query->execute([
		'id' => $_GET['id']
	]);

	$rows = $query->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['update'])) {
	$user_id = $_POST['user_id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$pdoQuery = "UPDATE medewerkers SET username=:username, email=:email, password=:password WHERE id=:id";

	$pdoquery_run = $conn->prepare($pdoQuery);

	$pdoquery_exc = $pdoquery_run->execute(array(
		"username"=>$username,
		"email"=>$email, 
		"password"=>password_hash($password, PASSWORD_DEFAULT),
		"id"=>$user_id 
	));

	if($pdoquery_exc)
	{
		echo 
		'<div class="alert alert-success" role="alert">
		A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	  </div>';
	}
	else
	{
		echo '<script>alert("Data not Updated")</script';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./style2.css">
</head>
<body>
<section
<?php
session_start();
	if(isset($_SESSION["usernamemede"]))
	{
		echo '<h4>Medewerker: '.$_SESSION["usernamemede"].'</h1>';
	}else{
		header("location:index.php");
	}
?>

<h2>Medewerker informatie updaten</h2>
	<form action="" method="POST">
		Username:<br>
		<input type="hidden" name="user_id" value="<?php  print_r($rows[0]['id']); ?>">
		<input type="text" name="username" value="<?php print_r($rows[0]['username']); ?>"/>
		<br>
		Email:<br>
		<input type="email" name="email" value="<?php print_r($rows[0]['email']); ?>">
		<br>
		Password:<br>
		<input type="password" name="password" value="<?php print_r($rows[0]['password']); ?>">
		<br>
		<input type="submit" value="Update" name="update">
		<h4>
			<p>Terug naar medewerker overzicht<a href="overzicht_medewerkers.php" style="color:#FF0000;"><b>Click hier</b></a></p>
		</h4>
	</form>
	<div class="wave wave1"></div>
	<div class="wave wave2"></div>
	<div class="wave wave3"></div>
	<div class="wave wave4"></div>
</section>
</body>
</html>
