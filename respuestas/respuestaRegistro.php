<?php

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioUsuario();
$audi = new ServicioAuditoria();
$result = $sC->addUsuario($nombre,$clave,$nom_user,$email);
$audi->addAuditoria('USUARIO','Se ha registrado un nuevo usuario: ' . $nombre . ' - ' . $email,$_SESSION['cod_user']);

echo $result;

?>