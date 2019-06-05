<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	ini_set('display_errors', 1);
	error_reporting(~0);
?>
<html>
  <head>
    <title>RSS Login</title>
  </head>
  <body>

  <?php


	$username = htmlentities ($_POST["username"]);
	$_SESSION["username"] = $username;


    $username = $_POST["username"];
    $password = $_POST["password"];

    $host = "****";
    $user = "****";
    $pass = "****";
    $database = "****";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));

    //securirty in here

    $user_in_db = null;
    $salt = null;
    $password_in_db = null;


    $username = $connection->real_escape_string ($username);
    $password = $connection->real_escape_string ($password);

    $query_check = "select Username, Salt, Password from User where Username = ?;";


    $prep = $connection->prepare ($query_check);
    $prep->bind_param ("s", $username);
    $prep->execute();

    $prep->bind_result ($user_in_db, $salt, $password_in_db);
    $prep->fetch();


    if ($user_in_db != null) {
      $password = hash("sha256", $salt . $password);


      if ($password == $password_in_db) {
        //  echo "<p>Login successful.</p>";
        //  echo "<p> the currant user is $curruser .</p>";
			 	
        header('Location: rss.php');
        exit;

      }
  
      else {
          echo "<p>Incorrect Password, try again.</p>";
          echo "<a href = \"index.html\">Login/Register</a>";
      }

    }
    else {
      echo "<p>Invalid login, please enter a valid username and password or register a new account</p>";
      echo "<a href = \"index.html\">Login/Register</a>";
    }


  ?>

  </body>
</html>
