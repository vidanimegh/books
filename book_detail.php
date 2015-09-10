<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookdb";
	$title = $_GET["title"];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM books WHERE title='".$title."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    	$row=$result->fetch_assoc();
        echo json_encode($row); 
	} else {
	    echo "{}";
	}
	$conn->close();
?>