<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']))) {
	  
		include("menuSinSesion.html");
	}else{
		include("menu.html");
	}
?>