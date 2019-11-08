<?php

$nom_usuario = $_POST['nom_usuario'];
$clave = $_POST['clave'];
include ("../mapeo/ServicioCliente.php");

$servicio = new ServicioCliente();
$client = $servicio->getClientUsername($nom_usuario);
if ($client == null){
	echo -1;
}else if($client->clave == $clave){
	session_start();
	$_SESSION['cod_user'] = $client->codigo;
	echo $client->codigo;
}else{
	echo -2;
}


?>