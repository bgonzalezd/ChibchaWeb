<?php
	session_start();
	$codigo = $_SESSION['cod_user'];
	if ($codigo == null){
		header('Location: '. 'index.php');
	}
?>