<?php 

class config {
	private $host;
	private $dbname;
	private $username;
	private $password;
	private $con;

	function __construct()
	{
		$this->host ="localhost";
		$this->username="root";
		$this->password="";
		$this->dbname="flowerpower";

		try {

			$dsn ='mysql:host='. $this->host.';dbname='.$this->dbname;
			$this->con = new PDO($dsn, $this->username, $this->password);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			return $this->con;
		}catch(PDOexception $e)
		{
			echo "connection failed" . $e->getMessage();
		}

	}

	function insertDetails($username, $email, $password)
	{
		$sql = "INSERT INTO klanten VALUES (:id, :username, :email, :password);";

		$stmt = $this->con->prepare($sql);

		$stmt->execute([
			'id' => NULL,
			'username' => $username,
			'email' => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		]);

		header('Location: index.php');
	}

	function insertmede($username, $email, $password)
	{
		$sql = "INSERT INTO medewerkers VALUES (:id, :username, :email, :password);";

		$stmt = $this->con->prepare($sql);

		$stmt->execute([
			'id' => NULL,
			'username' => $username,
			'email' => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		]);

		header('Location: overzicht_medewerkers.php');
	}

	
	function login($username, $password){

		$query = "SELECT * FROM klanten WHERE username = :username;";
		
		$stmt = $this->con->prepare($query);
			
		$stmt->execute([
			'username' => $username
		]);

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if(count($row) > 0){ 

			$check = password_verify($password, $row[0]['password']);
			
			if ($check) {
				session_start();

				$_SESSION['klant_row'] = $row[0];
				$_SESSION['username'] = $row[0]['username'];
				header('Location: index.php');
			}else{
				echo "login failed";
			}

		}else{
			echo "invalid username or password";
		}
		
	}
	function loginmede($username, $password){

		$query = "SELECT * FROM medewerkers WHERE username = :username;";
		
		$stmt = $this->con->prepare($query);
			
		$stmt->execute([
			'username' => $username
		]);

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if(count($row) > 0){ 

			$check = password_verify($password, $row[0]['password']);
			
			if ($check) {
				session_start();
				$_SESSION['usernamemede'] = $row[0]['username'];
				header('Location: medewerkerspage.php');
			}else{
				echo "login failed";
			}

		}else{
			echo "invalid username or password";
		}
		
	}

	
}	



?>