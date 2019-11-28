<?php
session_start();
$nombre = $_POST['nombre'];
$sistema = $_POST['sistema'];
$tipo = $_POST['tipo'];

include ("../mapeo/ServicioHosting.php");
include ("../mapeo/ServicioAuditoria.php");

$audi = new ServicioAuditoria();

$sC = new ServicioHosting();
$result = $sC->addHosting($nombre,$sistema, $_SESSION['cod_user'],$tipo);
$audi->addAuditoria('HOSTING_ADQUIRIDO','Se ha comprado un hosting',$_SESSION['cod_user']);
echo "Ok";

?>