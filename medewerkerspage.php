<?php
session_start();
if(isset($_SESSION["username"]))
{
    echo '<h3>Het inloggen is gelukt medewerker! - '.$_SESSION["username"].'</h3>';
    echo '<br /><br /><a href="destroy.php">Uitloggen</a>';
}else{
    header("location:index.php");
}