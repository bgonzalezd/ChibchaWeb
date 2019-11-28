<?php
session_start();
$nombre = $_POST['nombre'];
$cod_nombre = $_POST['cod_nombre'];

include ("../mapeo/ServicioDominio.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioDominio();
$audi = new ServicioAuditoria();
$result = $sC->addDominio($nombre,$cod_nombre,$_SESSION['cod_user'],'I');
$audi->addAuditoria('DOMINIO_ADQUIRIDO','Se ha solicitado un dominio',$_SESSION['cod_user']);
echo 'Solicitud enviada correctamente';

?>