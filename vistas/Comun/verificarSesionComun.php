<?php
	session_start();
	$codigo = $_SESSION['cod_user'];
	if ($codigo != null){
		include("menu.html");
	}else{
		include("menuSinSesion.html");
	}
?>