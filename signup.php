
<?php
	$newemail = $_REQUEST['newemail'];
	$newpass = $_REQUEST['newpass'];
	// Database connection
	$conn = new mysqli('localhost','root','','emslogin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(newemail, newpass) values(?, ?)");
		$stmt->bind_param("ss", $newemail, $newpass);
		$execval = $stmt->execute();
		echo $execval;
		echo "signup successfully...";
		$stmt->close();
		$conn->close();
	}
?>