<html>
  <head>
    <title>Update Links</title>
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
	error_reporting(~0); ###### errors turned off as some feeds are missing values ##########
?>


  
	<?php
	echo "<p>Welcome: " . $_SESSION["username"] . ".</p>";
	?>
	
	<?php
	$link = $_POST["link"];
	$name = $_POST["name"];
	$username = $_SESSION["username"];
		
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "db1304093_cmm007";
	
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));
	  
	  
	$query_check = "select * from rfeeds where Username =\"$username\" AND feeds = \"$link\"";
	$results = $connection->query ($query_check);
    $num_results = mysqli_num_rows ($results);

    if ($num_results != 0) {
	      $query = "update rfeeds set feeds =\"$link\", feedname = \"$name\" where feeds = \"$link\" and Username = \"$username\"";
    
	  $results = $connection->query ($query);
	      if (!$results) {
      echo "<p>" . mysqli_error($connection) . "</p>";
    }
	echo "Feed updated<br>";
	echo "<a href = \"rss.php\">Home Page</a><br>";
	echo "<a href = \"editfeeds.php\">Delete/ Edit Another Feed?</a>";
	
    }else{
	  
	  	echo "No Feed to delete?<br>";
	}

    
  	  
	?>


</body>
</html>