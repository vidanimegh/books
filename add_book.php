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
	$sql = "INSERT INTO books(author, categories, title, publisher) VALUES(?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$inputJSON = file_get_contents('php://input');
	$input= json_decode( $inputJSON, TRUE ); //convert JSON into array
	$stmt->bind_param("ssss",$input["author"],$input["categories"],$input["title"],$input["publisher"]);

	$result = $stmt->execute();
	
	$stmt->close();
	$conn->close();
?>