<?php
$cod_usuario = $_POST['cod_usuario'];
$mensaje = $_POST['mensaje'];
$asunto = $_POST['asunto'];
include ("../mapeo/ServicioCorreo.php");
include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioAuditoria.php");

$servicio = new ServicioUsuario();
$us = $servicio->getInfoUsuario($cod_usuario);
$sc = new ServicioCorreo();
$audi = new ServicioAuditoria();
$texto = "<html><head><meta charset=UTF-8'></head><body>Cordial usuario <strong>$us->nombre</strong>.<br>En respuesta a su problema: <strong>$asunto</strong>.<br>$mensaje<br>Muchisimas gracias por su comprensión y solucionaremos el problema lo más pronto posible.</body></html>";
$audi->addAuditoria('MENSAJE','Se ha respondido una respuesta',$_SESSION['cod_user']);
echo $sc->enviarCorreo($us->email,$texto);


?>