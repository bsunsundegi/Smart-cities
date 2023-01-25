<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$username = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["username"]);
	$password = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["password"]);
	$password_hashed = hash("sha256", $password);

	if(empty($username) || empty($password)) {
		header("Location: login_error.html");
	}
	else {
		$sql = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password_hashed' LIMIT 1;";
		$result = mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$name = $row["NAME"];
			if($row["ADMIN"] == 1) {
				header("Location: admin_home.html");
			}
			else {
				header("Location: user_home.php?name=" . $name . "&username=" . $username);
			}
		}
		else {
			header("Location: login_error.html");
		}
	}
?><?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$username = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["username"]);
	$password = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i", "", $_POST["password"]);
	$password_hashed = hash("sha256", $password);

	if(empty($username) || empty($password)) {
		header("Location: login_error.html");
	}
	else {
		$sql = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password_hashed' LIMIT 1;";
		$result = mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$name = $row["NAME"];
			if($row["ADMIN"] == 1) {
				header("Location: admin_home.html");
			}
			else {
				header("Location: user_home.php?name=" . $name . "&username=" . $username);
			}
		}
		else {
			header("Location: login_error.html");
		}
	}
?>
