<?php
include_once("database2.php");
 
$result = $conn->query("SELECT * FROM medewerkers ORDER BY id DESC");
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
	<link rel="stylesheet" href="css/cloud.css">
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
    <h2>Medewerker account's</h2>
        <table class="table " id="overview">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
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
                echo "<td><a href=\"update_medewerkers.php?id=$row[id]\" class='btn btn-warning'>Edit</a> | <a href=\"delete_medewerker.php?id=$row[id]\" onClick=\"return confirm('Weet je zeker dat je wilt verwijderen?')\"class='btn btn-danger'>Delete</a></td>";        
            }
            ?>
			</tbody>
		</table>
	</div>
<h4>
<p>nieuwe medewerker account aanmaken<a href="create_medewerkers.php" style="color:#FF0000;"><b>Click hier</b></a></p>
<p>terug naar de medewerkers pagina<a href="medewerkerspage.php" style="color:#FF0000;"><b>Click hier</b></a></p>
</h4>
		<div id="clouds">
			<div class="cloud x1"></div>
			<div class="cloud x2"></div>
			<div class="cloud x3"></div>
			<div class="cloud x4"></div>
			<div class="cloud x5"></div>
		</div>
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