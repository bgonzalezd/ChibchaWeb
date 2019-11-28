<?php
session_start();
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$renovacion = $_POST['renovacion'];

include ("../mapeo/ServicioNombreDominio.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioNombreDominio();
$audi = new ServicioAuditoria();
$result = $sC->addNombreDominio($nombre,$precio,$renovacion,$_SESSION['cod_user']);
$audi->addAuditoria('NOMBRE_DOMINIO','Se ha agregado el nombre de dominio: ' . $nombre,$_SESSION['cod_user']);
echo 'Agregado correctamente';

?>