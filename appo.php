
<?php
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
    $email = $_REQUEST['email'];
    $service = $_REQUEST['service'];
    $date = $_REQUEST['date'];
	// Database connection
	$conn = new mysqli('localhost','root','','appointment');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customers(name, number, email, service, date) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sissi", $name, $number, $email, $service, $date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Booking successfully...";
		$stmt->close();
		$conn->close();
	}
?>