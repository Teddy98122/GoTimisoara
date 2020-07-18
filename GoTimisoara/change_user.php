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

<h1><b>Modificare utilizatori</b></h1>
<h3>
 <form action="http://localhost/GoTimisoara-TeodorBranescu_AncaCiurel_MadalinaCapolna/GoTimisoara/php_scripts/database/modify" method="post">

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="number" name="ID" class="form-control" placeholder="ID">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name="firstname" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="email" class="form-control" placeholder="Email address">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" id="" class="form-control" placeholder="Mesajul tau !" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                </div>
              </div>
            </form>
</h3>
</body>
</html>