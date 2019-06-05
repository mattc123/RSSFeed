<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	ini_set('display_errors', 1);
	error_reporting(~0); 
?>

<html>
  <head>
  		<title>Save Feeds</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/new.css">
		<div class="navbar">
		<a href="rss.php">Home</a>
		<a class="active" href="Savefeed.php">Save Feeds</a>
		<a href="editfeeds.php">Edit Feeds</a>
		<a href="logout.php">Logout</a>
		</div>
  
	<?php
	echo "<p>Currently logged in as: " . $_SESSION["username"] . ".</p>";
	?>

</head>
<body>
			<form action = "save.php" method = "post">
				<label for="feedname"><b>Feed Name</b></label>
				<input type="text" placeholder="Enter Feed Name" name="name" required>

				<label for="feedlink"><b>Feed Link</b></label>
				<input type="text" placeholder="Enter Feed Link" name="link" required>

				<button type="submit">Save</button>
			</form>

</body>
</html>
