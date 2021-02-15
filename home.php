<!DOCTYPE html>
<html>
<head>
  <title>Flowerpower</title>
  <link rel="icon"  href="logo.png">
  <link rel="stylesheet" href="css/balloon.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION["username"]))
{
    echo '<h3>Het inloggen is gelukt! - '.$_SESSION["username"].'</h3>';
    $getip = getRealIpAddr();
    echo "Uw ip adres is $getip";
    $today = date("Y-m-d H:i:s");
    echo "<br /><br />De datum van vandaag is $today";
    echo '<br /><br />De tijd in ' . date_default_timezone_get() . " is " . date("H:i:s");
    date_default_timezone_set("Asia/Calcutta");
    echo '<br /><br />De tijd in (de andere kant van de wereld) ' . date_default_timezone_get() . " is " . date("H:i:s");
    echo '<br /><br /><a href="destroy.php">Uitloggen</a>';
}else{
    header("location:index.php");
}


function getRealIpAddr(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
var timestamp = '<?=date("H:i:s");?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
<div style="position: fixed;top: -100px;left:900px;background: #ffeb3b;width: 200px;height: 200px;border-radius: 999px;"></div>
<main>
  <div class="balloon"></div>
  <div class="basket"></div>  
  <div class="cloud"></div>
</main>
</body>
</html> 