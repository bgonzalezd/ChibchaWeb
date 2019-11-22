<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']) && $_SESSION['tipo_user'] == 'A')) {
		header('Location: '. 'inicio_sesion.php');
	}else{
	  		include("menuAdmin.html");
	}
?>