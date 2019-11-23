<?php
session_start();
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$renovacion = $_POST['renovacion'];

include ("../mapeo/ServicioNombreDominio.php");

$sC = new ServicioNombreDominio();
$result = $sC->addNombreDominio($nombre,$precio,$renovacion,$_SESSION['cod_user']);
echo 'Agregado correctamente';

?>