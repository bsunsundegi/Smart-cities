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

		<p>Welcome <?php echo $_GET["name"]; ?>! Introduce your suggestions.</p>
		<form action="user_suggestions.php" method="post">
			<label>Email:</label>
			<input type="text" name="email" placeholder="Email">
			<br><br>
			<label>Issue:</label>
			<input type="text" name="issue" placeholder="Issue">
			<br><br>
			<label>Message:</label>
			<input type="text" name="message" placeholder="Message">
			<br>
			<input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
			<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
			<button class="button" type="submit" rows="5" cols="100">Submit</button>
		</form>
	</body>
</html>
