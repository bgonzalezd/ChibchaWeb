<?php
session_start();
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$tipo_distribuidor = $_POST['tipo_distribuidor'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioUsuario();
$audi = new ServicioAuditoria();
$result = $sC->editDistribuidor($codigo,$nombre,$email,$tipo_distribuidor);
$audi->addAuditoria('USUARIO - DISTRIBUIDOR','Se ha editado el distribuidor: ' . $nombre,$_SESSION['cod_user']);
echo 'Editado correctamente';

?>