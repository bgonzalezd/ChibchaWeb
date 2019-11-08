<?php

function conectar()
{

    $server   = "localhost";
    $database = "chibchaweb";
    $name     = "root";
    $pass     = "12345678";
    $con      = mysqli_connect($server, $name, $pass, $database);
    mysqli_set_charset($con,'utf8');
    if (!$con) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    return $con;
}

?>