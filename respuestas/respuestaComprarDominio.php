<?php
session_start();
$codigo = $_POST['codigo'];
$email = $_POST['email'];
$precio = $_POST['precio'];
$etiqueta = $_POST['etiqueta'];
$nombre = $_POST['nombre'];

include ("../mapeo/ServicioDominio.php");
include ("../mapeo/ServicioCorreo.php");
include ("../mapeo/ServicioAuditoria.php");

$comi = 0.15;

if($etiqueta == 'BASICO'){
	$comi = 0.1;
}

$valo = floatval($precio)*$comi;

$sC = new ServicioDominio();
$audi = new ServicioAuditoria();
$sC->comprarDominio($codigo);
$sCo = new ServicioCorreo();
$audi->addAuditoria('DOMINIO_ADQUIRIDO','Se ha comprado un dominio',$_SESSION['cod_user']);

$sCo->enviarCorreoP("Venta de dominio",$email,"<html><body>Por medio del siguiente correo, se le informa que el dominio <strong>$nombre</strong> con un valor de $<strong>$precio</strong>.<br>Debido a que es un distribuidor <strong>$etiqueta</strong>. El valor de la comisión es $<strong>$valo</strong><br>Gracias por la atención<body></html>");
echo 'Acción realizada correctamente';

?>