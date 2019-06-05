<?php
	session_start();
	require_once("search.php");
?>

<html>
  <head>
    	<title>Save Feeds</title>
		<link rel="stylesheet" href="css/new.css">
		<link rel="stylesheet" href="css/style.css">
		<div class="navbar">
		<a class="active" href="#home">Home</a>
		<a href="Savefeed.php">Save Feeds</a>
		<a href="editfeeds.php">Edit Feeds</a>
		<a href="logout.php">Logout</a>
		</div>
		
		
	<?php
	echo "<p>Welcome: " . $_SESSION["username"] . ".</p>";
	?>
  
  <script>
function showRSS(str) {
  if (str.length==0) { 
    document.getElementById("rssOutput").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rssOutput").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getrss.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>


<form>
<select onchange="showRSS(this.value)">
<option value="">Select an RSS-feed:</option>
<?php
for($i = 1; $i<=$num_results; $i++){
	$row = mysqli_fetch_array($results);

?>
<option value="<?php echo $row["feeds"]?>"> <?php echo $row["feeds"]?> </option>
<?php
}
?>

</select>
</form>


<br>
<div id="rssOutput">RSS-feed will be listed here...</div>
</body>
</html>
  





