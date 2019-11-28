<?php

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];

include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioCorreo.php");
include ("../mapeo/ServicioAuditoria.php");

$audi = new ServicioAuditoria();

$sC = new ServicioUsuario();
$result = $sC->addDistribuidor($nombre,$clave,$nom_user,$email,$tipo);
$audi->addAuditoria('USUARIO - DISTRIBUIDOR','Se ha agregado el distribuidor ' . $nombre,$_SESSION['cod_user']);
$sCo = new ServicioCorreo();
$sCo->enviarCorreoP("Bienvenido a Chibchaweb",$email,"<html><body>Le damos una cordial bienvenida a ChibchaWeb.<br>Su contraseña generada aleatoriamente es: $clave<body></html>");
echo $result;

?>