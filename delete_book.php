<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookdb";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DELETE FROM books WHERE book_id=?";
	$stmt = $conn->prepare($sql);
	
	$path = $_SERVER['REQUEST_URI'];
	$pieces = explode("/", $path);
	$id = $pieces[3];
	$stmt->bind_param("i",$id);

	$result = $stmt->execute();
	
	$stmt->close();
	$conn->close();
?>