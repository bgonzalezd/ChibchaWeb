<?php
session_start();
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$renovacion = $_POST['renovacion'];

include ("../mapeo/ServicioNombreDominio.php");

$sC = new ServicioNombreDominio();
$result = $sC->editNombreDominio($codigo,$nombre,$precio,$renovacion);
echo 'Editado correctamente';

?>