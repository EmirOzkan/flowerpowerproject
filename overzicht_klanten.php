<?php
include_once("database2.php");
 
$result = $conn->query("SELECT * FROM klanten ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Flowerpower</title>
	<link rel="icon"  href="img/logo.png">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/stylewave.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
<section>
<?php
session_start();
	if(isset($_SESSION["usernamemede"]))
	{
		echo '<h1>Medewerker: '.$_SESSION["usernamemede"].'</h1>';
	}else{
		header("location:index.php");
	}
?>
<div class="container">
    <h2>Klanten account's</h2>
        <table class="table " id="overview">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">username klant</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>	
            <?php     
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td><a href=\"update_klanten.php?id=$row[id]\" class='btn btn-warning'>Edit</a> | <a href=\"delete_klant.php?id=$row[id]\" class='btn btn-danger' onClick=\"return confirm('Weet je zeker dat je wilt verwijderen?')\">Delete</a></td>";        
            }
            ?>
			</tbody>
		</table>
	</div>
<h4>
<p>Nieuwe klanten account aanmaken <a href="create_klant.php" style="color:#FF0000;"><b>Click hier</b></a></p>
<p>Terug naar de medewerkers pagina <a href="medewerkerspage.php" style="color:#FF0000;"><b>Click hier</b></a></p>
</h4>
		<div class="wave wave1"></div>
		<div class="wave wave2"></div>
		<div class="wave wave3"></div>
		<div class="wave wave4"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
		$(document).ready( function () {
    		$('#overview').DataTable({
				aLengthMenu: [
					[5, 10, 25, 50, 150 , -1],
					[5, 10, 25, 50, 150, "All"]
				]
			});
		});
	</script>
</section>	
</body>
</html>