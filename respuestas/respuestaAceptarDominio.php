<?php
session_start();
$codigo = $_POST['codigo'];
$accion = $_POST['accion'];

include ("../mapeo/ServicioDominio.php");

$sC = new ServicioDominio();
if($accion == 'A'){
	$sC->aceptarDominio($codigo);
}else{
	$sC->negarDominio($codigo);
}
echo 'Acción realizada correctamente';

?>