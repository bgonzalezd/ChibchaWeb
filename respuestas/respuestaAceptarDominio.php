<?php
session_start();
$codigo = $_POST['codigo'];
$accion = $_POST['accion'];

include ("../mapeo/ServicioDominio.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioDominio();
$audi = new ServicioAuditoria();
if($accion == 'A'){
	$sC->aceptarDominio($codigo);
	$audi->addAuditoria('DOMINIO_ADQUIRIDO','Se ha aceptado un dominio',$_SESSION['cod_user']);
}else{
	$sC->negarDominio($codigo);
	$audi->addAuditoria('DOMINIO_ADQUIRIDO','Se ha negado un dominio',$_SESSION['cod_user']);
}
echo 'Acción realizada correctamente';

?>