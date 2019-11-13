<?php
	if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']))) {
	  
		header('Location: '. 'index.php');
	}
?>