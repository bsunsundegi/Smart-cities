<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$sql = "SELECT * FROM SUGGESTIONS;";
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

		<div class="admin-navigation-bar">
			<a href="admin_video.html">
				<img src="img/video.png" width="350" height="125">
			</a>

			<a href="admin_sensor_selection.php">
				<img src="img/sensors.png" width="200" height="125" height="125">
			</a>

			<a href="admin_suggestions.php">
				<img src="img/suggestions.png" width="325" height="125">
			</a>
		</div>

		<?php
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo "<b>Username:</b> ";
					echo $row["USERNAME"] . "<br>";
					echo "<b>Email:</b> ";
					echo "<a href='mailto:" . $row['EMAIL'] . "'>" . $row['EMAIL'] . "</a><br>";
					echo "<b>Issue:</b> ";
					echo $row["ISSUE"] . "<br>";
					echo "<b>Message:</b> ";
					echo $row["MESSAGE"];
					echo "<br><br>";
				}
			}
			else {
				echo "Error. The data is not available.";
			}
		?>

		<div class="center">
			<form action="admin_home.html" method="post">
				<button type="submit">Go back</button>
			</form>
		</div>
	</body>
</html>
