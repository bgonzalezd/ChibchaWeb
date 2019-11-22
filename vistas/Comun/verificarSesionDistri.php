<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']) && $_SESSION['tipo_user'] == 'D')) {
		header('Location: '. 'inicio_sesion.php');
	}else{
	  		include("menuDistri.html");
	}
?>