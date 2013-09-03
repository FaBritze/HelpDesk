<?php
	include("./inc/testar_sessao.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sistema Web Help Desk ::.</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.corner.js"></script>
<script type="text/javascript" language="javascript">
$(function(){
	
	$("#conteudo").corner();
	
	$("#loading").ajaxStart(function(){
	   $(this).show();
	 });
	 
	 $("#loading").ajaxStop(function(){
	   $(this).hide();
	 });
	 
	 $(".menu a").each(
	 	function(){
			$(this).click(function(){
				$("#conteudo").load($(this).attr("href"));
				return false;
			});	
		}
	 );
	 
	 $("#conteudo").load("home.php");
	
});
</script>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="topo">
    <ul class="menu">
    	<li><a href="home.php">Home</a></li>
    	<li><a href="usr.php">Usuários</a></li>
    </ul>
    <ul class="sair"><li><a href="inc/destroi_sessao.php">Sair do Programa</a></li></ul>
</div>

<div class="conteudo" id="conteudo">
	<div id="loading" style="display:none;">Carregando...</div>
</div>

<div class="rodape">
	<div class="rodapeEsquerda">&copy; 2010 Web Help Desk - Fabricio Corporation</div>
	<p><?php echo "Seja Bem vindo ".$_SESSION['nome_usr'] ?></p>
</div>
</body>
</html>