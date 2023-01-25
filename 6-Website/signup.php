<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$name = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["name"]);
	$surname = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["surname"]);
	$username = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["username"]);
	$password = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["password"]);
	$password_hashed = hash("sha256", $password);

	if(empty($name) || empty($surname) || empty($username) || empty($password)) {
		header("Location: signup_error_empty.html");
	}
	else {
		$sql = "SELECT * FROM USERS WHERE USERNAME = '$username' LIMIT 1;";
		$result = mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) == 0) {
			$sql = "INSERT INTO USERS VALUES ('$username', '$password_hashed', '$name', '$surname', 0);";
			$result = mysqli_query($connection, $sql);
			if($result != 0) {
				header("Location: signup_successful.html");
			}
		}
		else {
			header("Location: signup_error_username.html");
		}
	}
?>
