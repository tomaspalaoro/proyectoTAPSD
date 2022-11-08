<?php

/**********CONSTANTES PARA CAMBIAR*******/

const DB_NAME = 'tapsd';
const url_base = "http://localhost/";

/******************************************/

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
if (!defined('ruta_admin')){
    define('ruta_admin',url_base."proyectoTAPSD/admin.php");
}
if (!defined('ruta_calendario')){
    define('ruta_calendario',url_base."proyectoTAPSD/calendario.php");
}
const ruta_login = url_base."proyectoTAPSD/login.php";
const ruta_index = url_base."proyectoTAPSD/index.php";
const ruta_tecnico = url_base."proyectoTAPSD/tecnico.php";
const ruta_logout = url_base."proyectoTAPSD/PHP/logout.php";
const ruta_registrar = url_base."proyectoTAPSD/PHP/registrar.php";
const ruta_verificar = url_base."proyectoTAPSD/PHP/verificar.php";

