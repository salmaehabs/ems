<?php
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	// Database connection
	$conn = new mysqli('localhost','root','','emslogin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(email, password) values(?, ?)");
		$stmt->bind_param("ss", $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "login successfully...";
		$stmt->close();
		$conn->close();
	}
	
?>