<?php
	header('Content-Type: text/html; charset=utf-8');
	ini_set('display_errors', 1);
	error_reporting(~0); 
?>
<?php
	
	$username = $_SESSION["username"];

    $host = "****";
    $user = "****";
    $pass = "****";
    $database = "****";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));
	  
	  
	$query_check = "select feeds from rfeeds where Username =\"$username\"";

	$results = $connection->query ($query_check);
    $num_results = mysqli_num_rows ($results);
	
	
	
	  	  
?> 