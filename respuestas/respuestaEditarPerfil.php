<?php
session_start();
$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");
include ("../mapeo/ServicioAuditoria.php");

$sC = new ServicioUsuario();
$audi = new ServicioAuditoria();
$result = $sC->editPerfil($_SESSION['cod_user'],$nombre,$clave, $nom_user, $email);
$audi->addAuditoria('USUARIO','Se han editado los datos personales del usuario',$_SESSION['cod_user']);
echo 'Editado correctamente';

?>