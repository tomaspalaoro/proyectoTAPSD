<?php

/**********CONSTANTES PARA CAMBIAR*******/

if (!defined('DB_NAME')) define('DB_NAME',"tapsd");
if (!defined('url_base')) define('url_base',"http://localhost/");

/******************************************/

if (!defined('DB_HOST')) define('DB_HOST',"localhost");
if (!defined('DB_USER')) define('DB_USER',"root");
if (!defined('DB_PASS')) define('DB_PASS',"");

if (!defined('ruta_admin')) define('ruta_admin',url_base."proyectoTAPSD/admin.php");
if (!defined('ruta_login')) define('ruta_login',url_base."proyectoTAPSD/login.php");
if (!defined('ruta_index')) define('ruta_index',url_base."proyectoTAPSD/index.html");
if (!defined('ruta_tecnico')) define('ruta_tecnico',url_base."proyectoTAPSD/tecnico.php");
if (!defined('ruta_logout')) define('ruta_logout',url_base."proyectoTAPSD/PHP/logout.php");
if (!defined('ruta_registrar')) define('ruta_registrar',url_base."proyectoTAPSD/PHP/registrar.php");
if (!defined('ruta_verificar')) define('ruta_verificar',url_base."proyectoTAPSD/PHP/verificar.php");
if (!defined('ruta_avatares')) define('ruta_avatares',"../IMG/Avatares/");
//Para las imagenes desde el servidor
if (!defined('ruta_avataresFront')) define('ruta_avataresFront',"IMG/Avatares/");

