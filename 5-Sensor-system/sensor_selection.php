<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "SMARTCITIES";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$sql = "SELECT SENSORID FROM SENSORS;";
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
		<h1>City light sensors</h1>
		<form action="sensor_data.php" method="post">
		<label>Please, choose a sensor from the list below.</label><br>
		<select name="sensor_id" id="sensor_id">
		<?php
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo <option value="$row["SENSORID"]"">"$row["SENSORID"]"</option>";
			}
		?>
		</select>
		<input type="text" name="username" placeholder="Usuario">
        </form>
	</body>
</html>
