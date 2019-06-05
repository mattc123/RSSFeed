<html>
  <head>
    <title>delete Links</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/new.css">

		<div class="navbar">
		<a href="rss.php">Home</a>
		<a class="active" href="Savefeed.php">Save Feeds</a>
		<a href="editfeeds.php">Edit Feeds</a>
		<a href="logout.php">Logout</a>
		</div>
  </head>
  <body>


<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	ini_set('display_errors', 1);
	error_reporting(~0); 
?>


  	
	<?php
	$link=$_GET["edit"];
	$username = $_SESSION["username"];
		
    $host = "****";
    $user = "****";
    $pass = "****";
    $database = "****";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));
	  
	  
	$query_check = "select * from rfeeds where Username =\"$username\" AND feeds = \"$link\"";
	$results = $connection->query ($query_check);
    $num_results = mysqli_num_rows ($results);

    if ($num_results != 0) {
	      $query = "delete from rfeeds where Username =\"$username\" AND feeds = \"$link\"";
    
	  $results = $connection->query ($query);
	      if (!$results) {
      echo "<p>" . mysqli_error($connection) . "</p>";
    }
	echo "Feed Deleted<br>";
	echo "<a href = \"rss.php\">Home Page</a><br>";
	echo "<a href = \"editfeeds.php\">Delete/ Edit Another Feed?</a>";
	
    }else{
	  
	  	echo "No Feed to delete?<br>";
	}

    

    


	  
	  
	?>


</body>
</html>