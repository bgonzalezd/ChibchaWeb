<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']) && $_SESSION['tipo_user'] == 'N')) {
		include("menuSinSesion.html");
	}else{
	  		include("menu.html");
	}
?>