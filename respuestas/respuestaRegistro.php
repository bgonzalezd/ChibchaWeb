<?php

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];
$email = $_POST['email'];

include ("../mapeo/ServicioUsuario.php");

$sC = new ServicioUsuario();
$result = $sC->addUsuario($nombre,$clave,$nom_user,$email);

echo $result;

?>