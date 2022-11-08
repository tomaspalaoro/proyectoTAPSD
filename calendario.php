<?php
include("PHP/variables.inc.php");
require("PHP/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calendario</title>
    <!--Script-->
    <script src ="calendario/js/jquery-3.0.0.min.js"> </script>
    <script src="calendario/js/popper.min.js"></script>
    <script src="calendario/js/bootstrap.min.js"></script>
    <script type="" src="calendario/Index.js"></script>
    <script type="text/javascript" src="calendario/js/moment.min.js"></script>
    <script type="text/javascript" src="calendario/js/fullcalendar.min.js"></script>
    <script src='calendario/locales/es.js'></script>
    <!--CSS-->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="calendario/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="calendario/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="calendario/css/home.css">
    <link rel="icon" type="image/jpg" href=""/>
</head>
<body>

<div id="navbarsidebar"></div>
<?php
include("calendario/index.php");
?>
</body>
<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("<?php echo $_SESSION['sesion']; ?>");
    });
</script>
</html>
