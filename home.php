<?php
	include("./inc/testar_sessao.php");
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<h1>Seja bem vindo <?php echo $_SESSION['nome_usr']?>! </h1>
<h2>Para navegar no sistema de help desk da Fabricio Corporation utilize o menu no topo desta página.</h2>
<h2>Dúvidas e sugestões devem ser encaminhadas para <a href="mailto:fabricio.e.reche@gmail.com">fabricio.e.reche@gmail.com</a></h2>
</body>
</html>