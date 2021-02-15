<?php 
include "database2.php";

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
	$sql = "DELETE FROM `artikelen` WHERE `id`='$user_id'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Artikel succesvol verwijderd uit database.";
		echo '<br /><br /><a href="overzicht_artikelen.php">Terug</a>';
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>