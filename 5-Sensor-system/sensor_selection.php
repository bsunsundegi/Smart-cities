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
		<title>Sensor selection</title>
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
		<form action="sensor_data.php" method="post">
		<label>Please, choose a sensor from the list below.V4</label><br><br>
		<?php
			$sensor1 = "20018-1";
			$sensor2 = "20019-1";
			$sensor3 = "20020-1";
		?>
		<select name="sensor_id" id="sensor_id">
		<?php
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo "<option value=" . $row["SENSORID"] . ">" . $row["SENSORID"] . "</option>";
				}
			}
			echo "<option value=" . $sensor1 . ">" . $sensor1 . "</option>";
		?>
		</select>
		<button type="submit">View data</button>
	        </form>
	</body>
</html>
