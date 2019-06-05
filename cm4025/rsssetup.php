<html>
  <head>
    <title>Database</title>
  </head>

  <body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);
	
	
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "db1304093_cmm007";
	
	####database connections need to be changed in the following files:################## sorry
	#login.php
	#reg.php
	#save.php
	#search.php
	#delete.php
	#editfeeds.php
	#fedit.php
	###################################################################


		$enabled = true;
		
		function makeConnection() {
		global $host, $user, $pass, $database;
	
		$connection  = mysqli_connect($host, $user, $pass, $database)
	      or die ("Error is " . mysqli_error ($connection));  

		return $connection;
	}
		
		
		function createTable ($table, $sql, $connection) {
			$query = "DROP TABLE " . $table;
			$ret = $connection->query ($query);

		  if ($ret) {
		    echo "<p>Table Dropped!</p>";
		  }
		  else {
		    echo "<p>Table not dropped: " . mysqli_error($connection); + "</p>"; 
		  }    

			$query = $sql;
			$ret = $connection->query ($query);

		  if ($ret) {
		    echo "<p>Table created!</p>";
		  }
		  else {
		    echo "<p>Something went wrong: " . mysqli_error($connection); + "</p>";
		  }    

		}

		$connection = makeConnection();

				
		if ($enabled == true) {
										
			createTable	("User", "CREATE TABLE User ( Username varchar (15), Password varchar (512), Salt varchar (256))", $connection);
			createTable	("rfeeds", "CREATE TABLE rfeeds ( Username varchar (15), feedname varchar (50), feeds varchar (512))", $connection);
 

		}

			mysqli_close ($connection);

		?> 

		
		<p>Done</p>
	</body>
</html> 
