<?php
	if (session_id() == '') {
	  
		include("menuSinSesion.html");
	}else{
		include("menu.html");
	}
?>