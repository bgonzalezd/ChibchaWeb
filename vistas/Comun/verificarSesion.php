<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']))) {
	  
		header('Location: '. 'index.php');
	}else{
	  	$ser = new ServicioUsuario();
	  	$us = $ser->getInfoUsuario($_SESSION['cod_user']);
	  	if($us->tipo_usuario == 'A'){
	  		header('Location: '. 'distribuidores.php');
	  	}else{
	  		header('Location: '. 'hosting.php');
	  	}
	}
?>