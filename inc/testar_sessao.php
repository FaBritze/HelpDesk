<?php

	session_start();

	if(!isset($_SESSION['cod_usr'])){
		header("location: index.php");
		exit;
	}
?>