<!DOCTYPE html>
<html lang="en" >
<head> 
    <meta charset="utf-8">
    <title>Flowerpower</title>
    <link rel="icon"  href="img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylewave.css">
    <link rel="stylesheet" href="css/cloud.css">
</head>
<body>
<section>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
        <a href="index.php">
            <img src="img/logo.png">
        </a> 
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="overzicht_artikelen.php">Overzicht artikel</a>
            </li>
            <li class ="nav-item">
            <a class="nav-link" href="overzicht_medewerkers.php">Overzicht medewerkers</a>
            </li>
            <li class ="nav-item">
            <a class="nav-link" href="overzicht_klanten.php">Overzicht klanten</a>
            </li>
            <li class ="nav-item">
            <a class="nav-link" href="destroy.php">Uitloggen</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="float:right;">
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
            </div>
            </li>
        </ul>
    </nav>

    <?php
        session_start();
        if(isset($_SESSION["usernamemede"]))
        {
            echo '<h1>Medewerker: '.$_SESSION["usernamemede"].'</h1>';
        }else{
            header("location:index.php");
        }
    ?>
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
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 