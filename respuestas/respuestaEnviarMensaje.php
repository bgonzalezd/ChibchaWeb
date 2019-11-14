<?php
session_start();
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

include ("../mapeo/ServicioMensaje.php");

$sM = new ServicioMensaje();
$sM->enviarMensaje($_SESSION['cod_user'],$asunto,$mensaje);

echo "Ok";

?>