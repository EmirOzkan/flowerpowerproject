<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "flowerpower";

try {
  $dsn = 'mysql:host='. $host .'; dbname='.$dbname;
  $conn = new PDO($dsn, $user, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  //echo "Connected successfully";
} 
catch(PDOException $e) 
{
  $error->getMessage();
  echo '<h1>Database failed to connect</h1>';
}
?> 