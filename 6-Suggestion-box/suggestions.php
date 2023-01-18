<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	// Get the post records
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
                <title>Suggestion registered</title>
        </head>
        <body>
                <main>
                        <div class="titulo">
                                <h3 class="titulo">Suggestion box</h3>
                        </div>
                        <p>Your suggestion has been registered.</p>
                        <form action="user_home.php" method="post">
                                <div class="button">
                                        <button class="button" type="submit">Send another suggestion</button>
                                </div>
                        </form>
                        <form action="login.html" method="post">
                                <div class="button">
                                        <button class="button" type="submit">Log out</button>
                                </div>
                        </form>
                </main>
        </body>
</html>
