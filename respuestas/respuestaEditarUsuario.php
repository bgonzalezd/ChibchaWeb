<?php
session_start();
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$nom_usuario = $_POST['nom_usuario'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioUsuario();
$audi = new ServicioAuditoria();
$result = $sC->editUsuario($codigo,$nombre,$nom_usuario,$email);
$audi->addAuditoria('USUARIO','Se ha editado el usuario: ' . $nombre,$_SESSION['cod_user']);
echo 'Editado correctamente';

?>