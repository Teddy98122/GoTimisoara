<!DOCTYPE html>
<html>
<head>
	<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GoTimisoara Proiect PW</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="./contact_files/css" rel="stylesheet">

    <link rel="stylesheet" href="./contact_files/style.css">

    <link rel="stylesheet" href="./contact_files/bootstrap.min.css">
    <link rel="stylesheet" href="./contact_files/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./contact_files/jquery.fancybox.min.css">
    <link rel="stylesheet" href="./contact_files/owl.carousel.min.css">
    <link rel="stylesheet" href="./contact_files/owl.theme.default.min.css">
    <link rel="stylesheet" href="./contact_files/flaticon.css">
    <link rel="stylesheet" href="./contact_files/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./contact_files/style(1).css">

    <style>
    	body {background-color: #a84832;}
    </style>

</head>
<body>

<h1>Lista utilizatori</h1>
<h3>
<?php

$endpoint = 'http://localhost/GoTimisoara-TeodorBranescu_AncaCiurel_MadalinaCapolna/GoTimisoara/php_scripts/database/info';

$session = curl_init($endpoint);

curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($session);

curl_close($session);

$search_results = json_decode($data, true);
if ($search_results === NULL) die('Error parsing json');
echo '<table>';

echo '<tr>';
echo '<td>' . '<b>ID:</b> '.'</td>';
echo '<td>' . '<b>Prenume:</b> '.'</td>';
echo '<td>'. '<b>Nume:</b> '.'</td>';
echo '<td>' . '<b>Email:</b> ' .'</td>';
echo '<td>' . '<b>Mesaj:</b>' .'</td>';
echo '</tr>';

foreach ($search_results as $coin) {
$ID = $coin["ID"];
$firstname = $coin["firstname"];
$lastname = $coin["lastname"];
$email = $coin["email"];
$message = $coin["message"];

echo '<tr>';
echo '<td>' . $ID .'</td>';
echo '<td>' . $firstname .'</td>';
echo '<td>' . $lastname .'</td>';
echo '<td>' . $email .'</td>';
echo '<td>' . $message .'</td>';
echo '</tr>';

}
echo '</table>';
?>
</h3>
</body>
</html>