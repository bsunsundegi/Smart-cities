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

	$sql = "SELECT * FROM SENSORS WHERE SENSORID = '$sensor_id' ORDER BY REGISTERID DESC LIMIT $num_values;";
	$result = mysqli_query($connection, $sql);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sensor data</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<div class="video-card-container">
			<div class="video-card">
				<a href="video.html">
					<img src="img/video.png" class="video-card-image" alt="" size="fill">
				</a>
				Video Surveillance
			</div>

			<div class="video-card">
				<a href="sensor_selection.php">
					<img src="img/sensors.png" class="video-card-image" alt="" size="fill">
				</a>
				Sensors
			</div>

			<div class="video-card">
				<a href="suggestions.html">
					<img src="img/suggestions.png" class="video-card-image" alt="" size="fill">
				</a>
				Suggestions
			</div>
		</div>

		<h1>City light sensors</h1>
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
						echo $row["TIMESTAMP"];
						echo "</td><td>";
						echo $row["TEMPERATURE"];
						echo "</td><td>";
						echo $row["ENERGY"];
						echo "</td><td>";
						echo $row["STATUS"];
						echo "</td></tr>";
					}
				}
				else {
					echo "Error. The data is not available.";
				}
			?>
		</table>

		<div class="posicion-boton">
			<input type="button" value="<- Back to Main" style="height:60px; width:110px" onclick="location.href='index.html'">
		</div>
	</body>
</html>
