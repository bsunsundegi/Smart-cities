<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sensors</title>
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="index_sensor.css">
	<link rel="shortcut icon" href="favicon.png">
</head>
<body>

	<?php
		$servername = "localhost";
		$username = "smartcities";
		$password = "tecnun";
		$dbname = "SMARTCITIES";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT SENSORID, TIMESTAMP, TEMPERATURE FROM SENSORS";
		$result = $conn->query($sql);
	?>

	<div class="video-card-container">
		<div class="video-card">
		<a href="index_video.html">
		<img src="video.png" class="video-card-image" alt="" size="fill">
		</a>
		Video Surveillance
		</div>

		<div class="video-card">
		<a href="index_sensor.html">
		<img src="sensor.png" class="video-card-image" alt="" size="fill">
		</a>
		Sensors
		</div>

		<div class="video-card">
		<a href="index_suggestion.html">
		<img src="suggestions.png" class="video-card-image" alt="" size="fill">
		</a>
		Suggestions
		</div>
</div>
<div class="posicion-boton">
	<input type="button" value="<- Back to Main" style="height:60px; width:110px" onclick="location.href='index.html'">
</div>
<div class="sensor">
	<table>
		<tr>
			<th>Sensor Id</th>
			<th>Timestamp</th>
			<th>Temperature</th>
		</tr>
	</table>
</div>
</body>
</html>
