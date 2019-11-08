<?php

$dominio = $_POST['dominio'];
include ("../mapeo/ServicioNombreDominio.php");

$servicio = new ServicioNombreDominio();
$arr = $servicio->getValidOptions($dominio);
echo json_encode($arr);


?>