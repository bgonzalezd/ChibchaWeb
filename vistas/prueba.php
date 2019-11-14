<?php

	$server   = "13.82.134.144";
    $database = "chibchaweb1";
    $name     = "postgres";
    $pass     = "ANDRES2018uebS3";
    $port 	  = '5432';
    $con      = pg_connect("host=$server dbname=$database port=$port user=$name password=$pass");
    if (!$con) {
        die("Conexion fallida: " . mysqli_connect_error());
        
    }

?>