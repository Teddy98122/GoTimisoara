<?php
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');
if (!empty($firstname)){
if (!empty($lastname)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gotimisoara";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO contact (firstname, lastname,email,message)
values ('$firstname','$lastname','$email','$message')";
if ($conn->query($sql)){
echo "Inserare efectuata cu succes !";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Prenumele nu poare sa fie gol";
die();
}
}
else{
echo "Numele nu poare sa fie gol";
die();
}
?>