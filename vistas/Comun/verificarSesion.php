<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']))) {
	  
		header('Location: '. 'index.php');
	}else{
	  	$ser = new ServicioUsuario();
	  	$us = $ser->getInfoUsuario($_SESSION['cod_user']);
	  	if($us->tipo_usuario == 'A'){
	  		include("menuAdmin.html");
	  	}else{
	  		include("menu.html");
	  	}
	}
?>