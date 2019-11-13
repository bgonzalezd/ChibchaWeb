<?php
$nom_usuario = $_POST['nom_usuario'];
$clave = $_POST['clave'];
include ("../mapeo/ServicioUsuario.php");

$servicio = new ServicioUsuario();
$client = $servicio->getUserUsername($nom_usuario);
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