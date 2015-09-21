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
	$sql = "UPDATE books SET author=?, title=?, categories=?, publisher=? WHERE book_id=?";
	$stmt = $conn->prepare($sql);
	$inputJSON = file_get_contents('php://input');
	$input= json_decode( $inputJSON, TRUE ); //convert JSON into array
	$stmt->bind_param("ssssi",$input["author"],$input["title"],$input["categories"],$input["publisher"],$input["book_id"]);

	$result = $stmt->execute();
	
	$stmt->close();
	$conn->close();
?>