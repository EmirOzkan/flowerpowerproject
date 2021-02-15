<?php
include 'database2.php';
	$sql = "SELECT * FROM artikelen WHERE id = :id";

	$query = $conn->prepare($sql);

	$query->execute([
		'id' => $_GET['id']
	]);

	$rows = $query->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['update'])) {
	$user_id = $_POST['user_id'];
	$artikel = $_POST['artikel'];
	$aantal = $_POST['aantal'];

	$pdoQuery = "UPDATE artikelen SET artikel=:artikel, aantal=:aantal WHERE id=:id";

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
		update is gelukt
	  </div>';
	}
	else
	{
		echo '<script>alert("Data is niet updated")</script';
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

<h2>Artikel informatie updaten</h2>
	<form action="" method="POST">
		Artikelen:<br>
		<input type="hidden" name="user_id" value="<?php  print_r($rows[0]['id']); ?>">
		<input type="text" name="artikel" value="<?php print_r($rows[0]['artikel']); ?>"/>
		<br>
		Aantallen:<br>
		<input type="text" name="aantal" value="<?php print_r($rows[0]['aantal']); ?>">
		<br>
		<input type="submit" value="Update" name="update">
		<h4>
			<p>Terug naar artikelen overzicht?<a href="overzicht_artikelen.php" style="color:#FF0000;"><b>Click hier</b></a></p>
		</h4>
	</form>
	<div class="wave wave1"></div>
	<div class="wave wave2"></div>
	<div class="wave wave3"></div>
	<div class="wave wave4"></div>
</section>
</body>
</html>