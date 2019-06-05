<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	ini_set('display_errors', 1);
	error_reporting(~0); ###### errors turned off as some feeds are missing values ##########
?>

<html>
  <head>
    	<title>Save Feeds</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/new.css">
	
		<div class="navbar">
		<a href="rss.php">Home</a>
		<a href="savefeed.php">Save Feeds</a>
		<a class="active" href="editfeeds.php">Edit Feeds</a>
		<a href="logout.php">Logout</a>
		</div>
		
  
	<?php
	echo "<p>Currently logged in as: " . $_SESSION["username"] . ".</p>";
	?>
</head>


<?php
	$username = $_SESSION["username"];
    
     
    $host = "****";
    $user = "****";
    $pass = "****";
    $database = "****";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));
	  
	  
	$query_ = "select * from rfeeds where Username =\"$username\"";
	$results = $connection->query ($query_);
    $num_results = mysqli_num_rows ($results);
	
	  if ($num_results == 0) {
		  echo "Sorry, no feeds to edit!";
    }
     
?> 

<body>


<?php
while($row = mysqli_fetch_array($results)){
	
echo " $row[feedname]: $row[feeds] <button> <a href = 'edit.php?edit=$row[feeds]'> Edit </a> </button> <button> <a href = 'delete.php?edit=$row[feeds]'> Delete </a> </button><br>";

};
?>




</body>
</html>
