<?php

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");

$sC = new ServicioUsuario();
$result = $sC->addUsuario($nombre,$edad,$clave,$nom_user,$email);

echo $result;

?>