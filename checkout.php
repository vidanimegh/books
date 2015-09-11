<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookdb";
	$checkedOutBy = $_GET["checkedoutby"];
	$title = $_GET["title"];
	date_default_timezone_set("Asia/Kolkata");
	$lastcheckedout = date("l, d-m-Y, h:m:s a");
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "UPDATE books SET lastcheckedoutby=?, lastcheckedout=? WHERE title=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sss",$checkedOutBy, $lastcheckedout, $title);
	$result = $stmt->execute();
	
	echo "{}";
	
	$stmt->close();
	$conn->close();
?>