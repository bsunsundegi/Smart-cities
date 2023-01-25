<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$sql = "SELECT DISTINCT(SENSORID) FROM SENSORS;";
	$result = mysqli_query($connection, $sql);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Sensor selection</title>
	</head>

	<body>
		<div class="header">
			<img src="img/donostia.png" width="300">
			<h1>Sensor selection</h1>
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

		<form action="admin_sensor_data.php" method="post">
			<p>Please, choose a sensor from the list below.</p>
			<select name="sensor_id" id="sensor_id">
			<?php
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo "<option value=" . $row["SENSORID"] . ">" . $row["SENSORID"] . "</option>";
					}
				}
			?>
			</select>
			<br>
			<button type="submit">View data</button>
		</form>

		<div class="center">
			<form action="admin_home.html" method="post">
				<button type="submit">Go back</button>
			</form>
		</div>
	</body>
</html>
