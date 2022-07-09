<?php
	$Starting_Point= $_POST['Starting_Point'];
	$Ending_Point = $_POST['Ending_Point'];
	$Departure_Date = date("d/m/y");
    $Return_Date = date("d/m/y");
	$Email = $_POST['Email'];
    $Mobile_Number = $_POST['Mobile_Number'];
	$Address = $_POST['Address'];
    $City = $_POST['City'];
	$Pin_Code = $_POST['Pin_Code'];
	$State = $_POST['State'];
	$Country = $_POST['Country'];
	


	// Database connection
	$conn = new mysqli('localhost','root','','project1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into details(Starting_Point,Ending_Point,Departure_Date,Return_Date,Email,Mobile_Number,Address,City,Pin_Code,State,Country) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssississ", $Starting_Point,$Ending_Point,$Departure_Date,$Return_Date,$Email,$Mobile_Number,$Address,$City,$Pin_Code,$State,$Country);
		$execval = $stmt->execute();
		echo $execval;
		echo "Details Stored successfully...";
		$stmt->close();
		$conn->close();
	}
    header("Location: http://localhost/project/last.html");
    exit();
   

?>