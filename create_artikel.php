<?php
include_once 'database2.php';


if (isset($_POST['create'])) {
	$user_id = $_POST['user_id'];
	$artikel = $_POST['artikel'];
	$aantal = $_POST['aantal'];

	$pdoQuery = "INSERT INTO artikelen VALUES (:id, :artikel, :aantal);";

	$pdoquery_run = $conn->prepare($pdoQuery);

	$pdoquery_exc = $pdoquery_run->execute(array(
		"artikel"=>$artikel,
		"aantal"=>$aantal, 
		"id"=>$user_id 
	));

	if($pdoquery_exc)
	{
		echo 
		'<div class="alert alert-success" role="alert">
		Gelukt! <a class="alert-link"></a>.
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
	<title>Flowerpower</title>
	<link rel="icon"  href="img/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stylewave.css">
</head>
<body>
<section>
<?php
session_start();
	if(isset($_SESSION["usernamemede"]))
	{
		echo '<h4>Medewerker: '.$_SESSION["usernamemede"].'</h1>';
	}else{
		header("location:index.php");
	}
?>

<h2>Nieuwe artikelen invoeren</h2>
	<div class="form-box">
		<form action="" method="POST">
			Artikel:<br>
			<input type="hidden" name="user_id">
			<input type="text" name="artikel">
			<br>
			Aantal:<br>
			<input type="text" name="aantal">
			<br>
			<input type="submit" value="create" name="create">
			<h4>
				<p>Terug naar artikel overzicht<a href="overzicht_artikelen.php" style="color:#FF0000;"><b>Click hier</b></a></p>
			</h4>
		</form>
	</div>
	<div class="wave wave1"></div>
	<div class="wave wave2"></div>
	<div class="wave wave3"></div>
	<div class="wave wave4"></div>
</section>
</body>
</html>