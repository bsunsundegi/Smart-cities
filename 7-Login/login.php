<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$username = $_POST["username"];
	$password = $_POST["password"];
	$password_hashed = hash("sha256", $password);

	if(empty($username) || empty($password)) {
		header("Location: login_error.html");
	}
	else {
		$sql = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password_hashed';";
		$result = mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($row["ADMIN"] == 1) {
				header("Location: home_admin.html");
			}
			else {
				header("Location: user_home.html");
			}
		}
		else {
			header("Location: login_error.html");
		}
	}
?>
