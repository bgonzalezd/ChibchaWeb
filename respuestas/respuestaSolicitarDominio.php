<?php
session_start();
$nombre = $_POST['nombre'];
$cod_nombre = $_POST['cod_nombre'];

include ("../mapeo/ServicioDominio.php");

$sC = new ServicioDominio();
$result = $sC->addDominio($nombre,$cod_nombre,$_SESSION['cod_user'],'I');
echo 'Solicitud enviada correctamente';

?>