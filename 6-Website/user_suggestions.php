<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	// Get the post records
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$issue = $_POST["issue"];
	$message = $_POST["message"];

	// Database insert SQL code
	$sql = "INSERT INTO SUGGESTIONS (USERNAME, EMAIL, ISSUE, MESSAGE) VALUES ('$username', '$email', '$issue', '$message');";

	// Insert in database
	$result = mysqli_query($connection, $sql);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Suggestion box</title>
	</head>
	<body>
		<div class="header">
			<img src="img/donostia.png" width="300">
			<h1>Suggestion box</h1>
			<form action="login.html" method="post">
				<button type="submit">Log out</button>
			</form>
		</div>

		<p>Your suggestion has been registered.</p>

		<div class="center">
			<form action="user_home.html" method="post">
				<input type="hidden" name="name" value="<?php echo $name; ?>">
				<input type="hidden" name="username" value="<?php echo $username; ?>">
				<button type="submit">Go back</button>
			</form>
		</div>
	</body>
</html>
