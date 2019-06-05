<html>
  <head>
    <title>RSS Registration</title>
  </head>
  <body>


  <?php

    $username = $_POST["username"];
    $password= $_POST["password"];

    $prep = 0;

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "db1304093_cmm007";

    $results = null;


    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connection));

    $query_check = "select Username from User where Username = ?;";

    $prep = $connection->prepare ($query_check);
    $prep->bind_param ("s", $username);
    $prep->execute();

    $prep->bind_result ($results);
    $prep->fetch();


    if ($results != null) {
      echo "<p>That username already exists</p>";
      echo "<a href = \"index.html\">login</a>";
      exit;
    }

    $prep->close();

    $salt = uniqid (mt_rand(), true);
    $username = $connection->real_escape_string ($username);
    $password= $connection->real_escape_string ($password);

    $password = hash("sha256", $salt . $password);

    $query = "insert into User (Username, Password, Salt) values (\"$username\", \"$password\", \"$salt\")";

    $results = $connection->query ($query);

    echo $connection->error;

    echo "<p>Registration successful</p>";
    echo "<a href = \"index.html\">login</a>";



	?>

  </body>
</html>
