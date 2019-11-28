<?php
session_start();
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$renovacion = $_POST['renovacion'];

include ("../mapeo/ServicioNombreDominio.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioNombreDominio();
$audi = new ServicioAuditoria();
$result = $sC->editNombreDominio($codigo,$nombre,$precio,$renovacion);
$audi->addAuditoria('NOMBRE_DOMINIO','Se ha editado el nombre de dominio: ' . $nombre,$_SESSION['cod_user']);
echo 'Editado correctamente';

?>