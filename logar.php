<?php

	include("./inc/conexao.php");
	
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$sql_usr = "SELECT * FROM usr WHERE login='" . $login . "' AND senha='" . $senha . "'";

	$resultado = mysql_query($sql_usr);
	
	if(mysql_num_rows($resultado)!=0){
		
		session_start();
		$_SESSION['cod_usr'] = mysql_result($resultado, 0, 'cod_usr');
		$_SESSION['nome_usr'] = mysql_result($resultado, 0, 'nome_usr');
		
		header("location: menu.php");
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/logar.js"></script>
<link type="text/css" rel="stylesheet" href="css/logar.css" />
<title>Erro!</title>
</head>

<body bgcolor="lavender" onload="retorna()">
	<h1>Usuário Inválido!</h1>
    <p>Por favor verifique se a digitação está correta ou se você lembra da sua senha...</p>
    <div id="voltar"></div>
</body>
</html>