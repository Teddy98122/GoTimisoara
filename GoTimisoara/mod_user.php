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

<h1>Utilizatorul modificat</h1>
<h3>
<?php
//////////// Fisier nefolosit //////////////////

$ID= filter_input(INPUT_POST, 'ID');
$endpoint = 'http://localhost/GoTimisoara-TeodorBranescu_AncaCiurel_MadalinaCapolna/GoTimisoara/php_scripts/database/update/'.$ID;

$session = curl_init($endpoint);

curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'PUT');

$data = curl_exec($session);

curl_close($session);

$search_results = json_decode($data, true);
//echo "Operatie efectuata !";
?>
</h3>
</body>
</html>