<?php
	if (session_id() == '') {
	  
		header('Location: '. 'index.php');
	}
?>