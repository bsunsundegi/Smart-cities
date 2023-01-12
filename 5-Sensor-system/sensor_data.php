<?php
	$ip = "localhost";
	$user = "smartcities";
	$pass = "tecnun";
	$database = "SMARTCITIES";
	$connection = mysqli_connect($ip, $user, $pass, $database);

	if($connection == false) {
		echo "Connection failed";
	}

	$sensor_id = "20018-1";
	$num_values = 25;

	//$sql = "SELECT * FROM SENSORS WHERE SENSORID = '$sensor_id' ORDER BY REGISTER DESC LIMIT '$num_values';";
	$sql = "SELECT * FROM SENSORS;";
	$result = mysqli_query($connection, $sql);
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Smart city</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<h1>City light sensors</h1>
		<p>Selected sensor: 20018-1</p>
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
	</body>
</html>
