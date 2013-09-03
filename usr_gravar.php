<?php

include("./inc/testar_sessao.php");
include("./inc/conexao.php");
include("./inc/funcoes.php");

$acao = $_POST['acao'];

switch($acao){
	
	case "inc":
	
		 $sql = "select * from usr where login = '$login'";
		 $rs = mysql_query($sql);
		 
		 if (mysql_num_rows($rs)>0){
			 print false;
			 exit;
		 }
		 
		 $nome_usr     = utf8_decode($_POST['nome_usr']);
		 $login 	   = utf8_decode($_POST['login']);
		 $senha		   = utf8_decode($_POST['senha']);
		 $endereco     = utf8_decode($_POST['endereco']);
		 $cidade       = utf8_decode($_POST['cidade']);
		 $uf 	   	   = utf8_decode($_POST['uf']);
		 $data_nasc    = decodeData($_POST['data_nasc']);
		 $sexo 		   = utf8_decode($_POST['sexo']);
		 $telefone 	   = utf8_decode($_POST['telefone']);
		 $celular      = utf8_decode($_POST['celular']);
		 $estado_civil = utf8_decode($_POST['estado_civil']);
		 $email 	   = utf8_decode($_POST['email']);
		 
		 $sql_inc = "INSERT INTO usr(login, senha, nome_usr, endereco, cidade, uf, data_nasc, sexo, telefone, celular, estado_civil, email)
		 		  	 		VALUES ('$login', '$senha', '$nome_usr', '$endereco', '$cidade', '$uf', '$data_nasc', '$sexo', '$telefone', '$celular', '$estado_civil', '$email')";
		 mysql_query($sql_inc) or die(mysql_error());
		 
		 $sql_src = "SELECT * FROM usr WHERE nome_usr = '" . $nome_usr ."'";
		 $result = mysql_query($sql_src);
		 mysql_query($sql_src) or die(mysql_error());
		 
		 $codigo = mysql_result($result,0,'cod_usr');
		 
		 $str = "<tr><td align='center'>". $codigo . "</td><td align='center'>". utf8_decode($nome_usr) . "</td><td align='center'>". utf8_decode($login) . "</td><td align='center'>". "<a href='mailto:" . $email . "'>" . $email ."</a></td><td align='center'><a href='usr_alt.php?cod=" . $codigo . "' class='editar'><img src='./imagens/btn_alterar.png' alt='Alterar' style='border:none;' title='Alterar'/></a></td><td align='center'><a href='usr_gravar.php?cod=" . $codigo . "' class='excluir'><img src='./imagens/btn_excluir.png' alt='Excluir' style='border:none;' title='Excluir' /></a></td></tr>";

		print utf8_decode($str);
		
	break;
	
	case "alt":
	
		 $nome_usr     = utf8_decode($_POST['nome_usr']);
		 $login 	   = utf8_decode($_POST['login']);
		 $senha		   = utf8_decode($_POST['senha']);
		 $endereco     = utf8_decode($_POST['endereco']);
		 $cidade       = utf8_decode($_POST['cidade']);
		 $uf 	   	   = utf8_decode($_POST['uf']);
		 $telefone 	   = utf8_decode($_POST['telefone']);
		 $celular      = utf8_decode($_POST['celular']);
		 $estado_civil = utf8_decode($_POST['estado_civil']);
		 $email 	   = utf8_decode($_POST['email']);
	
		$sql = "UPDATE usr SET nome_usr='" . $nome_usr . "', senha='" . $senha . "', endereco='" . $endereco . "',cidade='" . $cidade . "', uf='" . $uf . "',celular='" . $celular . "',estado_civil='" . $estado_civil . "',email='" . $email . "' WHERE login='" . $login . "'";
	
		mysql_query($sql) or die(mysql_error());
		
	break;
	
	case "exc":
	
		$codigo = $_GET['cod'];
		
		$sql = "DELETE FROM usr WHERE cod_usr=" . $codigo;
		
		mysql_query($sql) or die(mysql_error());
	
	break;
	
}
?>