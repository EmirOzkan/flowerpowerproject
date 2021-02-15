<!DOCTYPE html>
<html>
<head>
    <title>Flowerpower</title>
    <link rel="icon"  href="img/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/indextext.css">
    <link rel="stylesheet" href="css/morpy.css">
    <link rel="stylesheet" href="css/box.css">
</head>
<body>
    <div class="container">
    <?php
    session_start();
    if(isset($_SESSION["username"])):
        
    ?>
    <nav class="navbar">
    <img class="logobig" src="img/logo.png">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#artikelen">Artikelen</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="klant_gegevens_wijzigen.php">Gegevens</a></li>
            <li><a href="destroy.php" style="color:#FF0000;">Uitloggen</a></li>
        </ul>
    </nav>
    <?php else: ?>
        <nav class="navbar">
    <img class="logobig" src="img/logo.png">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="loginmedewerkers.php">Medewerkers</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <?php endif; ?>
    <section id="home">
    <div class="morpy">
        <div class="words word-1">
        <span>W</span>
        <span>e</span>
        <span>l</span>
        <span>k</span>
        <span>o</span>
        <span>m</span>
        </div>

        <div class="words word-2">
        <span>O</span>
        <span>p</span>
        </div>

        <div class="words word-3">
        <span>M</span>
        <span>i</span>
        <span>j</span>
        <span>n</span>
        </div>

        <div class="words word-4">
        <span>F</span>
        <span>l</span>
        <span>o</span>
        <span>w</span>
        <span>e</span>
        <span>r</span>
        <span>P</span>
        <span>o</span>
        <span>w</span>
        <span>e</span>
        <span>r</span>
        </div>

        <div class="words word-5">
        <span>P</span>
        <span>r</span>
        <span>o</span>
        <span>j</span>
        <span>e</span>
        <span>c</span>
        <span>t</span>
        </div>
    </div>
    </section>
    <section id="artikelen">
    <div>
        <h1>
            <p>
                <strong>
                Hier komen de artikelen
                </strong>
                <p>Wilt u een factuur generen?<a href="factuurgenerate.php"><b>Click here</b></a></p>
            </p>
        </h1>
    </div>
    </section>
    <section id="contact">
    <div class="morpy2">
        <h1 style="color:black">Contact</h1>
            <p style="color:black">
                <strong> Adres: </strong> 
                <br> Fraijlemaborg 135
                <br> 1102 CV Amsterdam
            </p>
            <p style="color:black">
                <strong> Phone Number: </strong>
                <br> +31205791111
            </p>
    </div>      
    <div class="morpy3">
            <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9755.201928280549!2d4.953721091885552!3d52.319622826426006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60b91697d8729%3A0xb5cf33c91399403c!2sMBO%20College%20Zuidoost%20-%20ROC%20van%20Amsterdam!5e0!3m2!1snl!2snl!4v1611750241817!5m2!1snl!2snl" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </p> 
    </div>
    </section>
    </div>
</body>
</html> 
