<?php

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$clave = $_POST['clave'];
$nom_user = $_POST['nom_user'];

include ("../mapeo/ServicioCliente.php");

$sC = new ServicioCliente();
$result = $sC->addClient($nombre,$edad,$clave,$nom_user);
echo 'ok';

?>