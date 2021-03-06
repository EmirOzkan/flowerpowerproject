<?php
include 'database2.php';


if (isset($_POST['pwd_change'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $pdoQuery = "UPDATE klanten SET password=:password WHERE id=:id";

    $pdoquery_run = $conn->prepare($pdoQuery);

    $pdoquery_exc = $pdoquery_run->execute([
        "password"=>password_hash($password, PASSWORD_DEFAULT),
        "id"=>$user_id
    ]);

    if($pdoquery_exc)
    {
      $pwd_msg = true;
    }
    else
    {
      $pwd_msg = false;
    }
}

if (isset($_POST['update'])) {
	$user_id = $_POST['user_id'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	$pdoQuery = "UPDATE klanten SET username=:username, email=:email WHERE id=:id";

	$pdoquery_run = $conn->prepare($pdoQuery);

	$pdoquery_exc = $pdoquery_run->execute(array(
		"username"=>$username,
		"email"=>$email, 
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
		echo '<script>alert("Data is niet updated")</script>';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Flowerpower</title>
	<link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php if(isset($pwd_msg)): 
        if($pwd_msg == true): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>Wachtwoord succesvol gewijzigd
            </div>
<?php  elseif($pwd_msg == false): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>Wachtwoord niet gewijzigd
    </div>
    <?php endif; ?>
<?php endif; ?> 

    <section>
    <?php
    session_start();
        if(isset($_SESSION["username"]))
        {
            echo '<h4>Klant: '.$_SESSION["username"].'</h1>';
            $rows = $_SESSION["klant_row"];
        }else{
            header("location:index.php");
        }
    ?>

    <h2>Klanten informatie updaten</h2>
        <form action="" method="POST">
            Username:<br>
            <input type="hidden" name="user_id" value="<?php  print_r($rows['id']); ?>">
            <input type="text" name="username" value="<?php print_r($rows['username']); ?>"/>
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php print_r($rows['email']); ?>">
            <br>
            <input type="submit" value="Update" name="update">
            <h4>
                <p>Terug naar de home pagina?<a href="index.php"><b>Click hier</b></a></p>
            </h4>
        </form>
    </section>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Wachtwoord Wijzigen 
    </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">       
                    <form action="" method="POST">
                        <input type="hidden" name="user_id" value="<?php  print_r($rows['id']); ?>">
                        <input type="password" class="form-control" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="pwd_change" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
