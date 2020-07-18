<?php
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');



try{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "gotimisoara";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname,"3333");
}catch(PDOException $e){
	echo $e->getMessage();
}


function insertData(){
	global $firstname, $lastname, $email, $message, $conn;
	$sql = "INSERT INTO contact (firstname, lastname,email,message)
	values ('$firstname','$lastname','$email','$message')";
	if ($conn->query($sql)){
	echo "Inserare efectuata cu succes !";
	}
	else{
	echo "Error: ". $sql ."
	". $conn->error;
	}
}

function showData(){
	global $conn;
	$sql1 = "SELECT id, firstname, lastname, email, message FROM contact";
	$result = $conn->query($sql1);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "<br> id: ". $row["id"]. " - firstname: ". $row["firstname"]. " " . " - lastname ". $row["lastname"]. " - email ". $row["email"]." ". " - message ". $row["message"]."<br>";
	    }
	} else {
	    echo "0 results";
	} 
}

//insertData();
//showData();
$conn->close();
?>