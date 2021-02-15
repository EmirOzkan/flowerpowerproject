<?php 
include "database2.php";

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
	$sql = "DELETE FROM `klanten` WHERE `id`='$user_id'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Klanten succesvol verwijderd uit database.";
		echo '<br /><br /><a href="overzicht_klanten.php">Terug</a>';
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>