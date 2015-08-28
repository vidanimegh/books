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
	$sql = "SELECT * FROM books";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    echo '{"books":[';

    	    $first = true; 
    	    while($row=$result->fetch_assoc()){
        	//  cast results to specific data types

            	if($first) {
            		$first = false;
            	} else {
            		echo ',';
            	}
            	echo json_encode($row);
    	    }
    	    echo ']}'; 
	} else {
	    echo "0 results";
	}
	$conn->close();
?>