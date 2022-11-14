<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
  <!--Script-->
  <script src ="js/jquery-3.0.0.min.js"> </script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="" src="Index.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script> 
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script src='locales/es.js'></script>
  <!--CSS-->
  <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="icon" type="image/jpg" href=""/>
</head>

<body>
<div id="navbarsidebar"></div>
<section class="p-4 my-container"></section>
<div
	<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>
<div class="row">
  <div class="col-md-12 mb-3">
  <h3 class="text-center" id="title">Calendario TAPSD</h3>
  </div>
</div>
</div>
<div id="calendar"></div>
<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>
</body>
<script>
    $.get("navbar_sidebar_calendario.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        $("#navbarsidebar").html(data);
        console.log("hola")

        $("#nombreApellidos").html("");
    });
</script>
</html>
