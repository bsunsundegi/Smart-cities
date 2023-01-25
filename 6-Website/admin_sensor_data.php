<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "DONOSTIA";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$num_values = 25;
	$sensor_id = $_POST["sensor_id"];

	$sql = "SELECT * FROM SENSORS WHERE SENSORID = '$sensor_id' AND DATETIME BETWEEN DATE_SUB(now(), INTERVAL 2 WEEK) AND NOW() ORDER BY REGISTERID DESC;";
	$result = mysqli_query($connection, $sql);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Sensor data</title>
	</head>

	<body>
		<div class="header">
			<img src="img/donostia.png" width="300">
			<h1>Sensor data</h1>
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

		<p>Selected sensor: <?php echo $sensor_id; ?></p>
		<table>
			<tr>
				<th>
					Datetime
				</th>
				<th>
					Temperature
				</th>
				<th>
					Energy
				</th>
				<th>
					Light status
				</th>
			</tr>
			<?php
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo "<tr><td>";
						echo $row["DATETIME"];
						echo "</td><td>";
						echo $row["TEMPERATURE"];
						echo "</td><td>";
						echo $row["ENERGY"];
						echo "</td><td>";
						echo $row["LIGHTSTATUS"];
						echo "</td></tr>";
					}
				}
				else {
					echo "Error. The data is not available.";
				}
			?>
		</table>

		<div class="center">
			<form action="admin_home.html" method="post">
				<button type="submit">Go back</button>
			</form>
		</div>
	</body>
</html>
