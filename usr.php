<?php
	include("./inc/testar_sessao.php");
	include("./inc/conexao.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="css/usr.css" />
<script type="text/javascript" language="javascript">

	$(function(){
		
		var mascara = {
			
			id: $("#mask"),
			fechar: function(){
				
				mascara.id.fadeOut("slow");
				$("#divAlterar").fadeOut("slow");
				
			},
			abrir: function(){			
				$("#mask").fadeIn("slow").fadeTo("slow",0.8);
				$("#divAlterar").fadeIn("slow");
			}
			
			
			};
		
		$("#cadastronovo").hide();
		
		$(".incusr").click(function(){
			if($("#cadastronovo").text() == ""){
				$("#cadastronovo").load($(this).attr("href"),function(){
					$(this).toggle("normal");
				});
			}else{
				$("#cadastronovo").toggle("normal");	
			}
			return false;
		});
		
		$("a.editar").each(function(){
			var aLink = $(this).attr("href");
			$(this).click(function(){
				mascara.abrir();
				
				$("#mask").click(function(){
					mascara.fechar();
				});
				
				$("#divAlterar").load(aLink,function(dados){
					if(!dados){
						alert("ocorreu um erro ao carregar");	
					}
				});
				return false;
			});
			
		});
		
		
		$("a.excluir").each(function(){
			var tdAtual = $(this).parent().parent();
			var aLink = $(this).attr("href");
			$(this).click(function(){
				$.post(aLink,"acao=exc",function(retorno){
					tdAtual.fadeOut("slow");
				});
				return false;
			});	
			
			
		});
		
	});

</script>
</head>
<body>
<br/>
<div id="mask"></div>
<div id="divAlterar"></div>
<b>Relação de Usuários Cadastrados </b>
<div id="div_contatos">
    <table border="1" class="tabelaPessoa">
        <tr>
          <th><strong>Codigo</strong></th>
          <th><strong>Nome Pessoa</strong></th>
          <th><strong>Login</strong></th>
          <th><strong>Email</strong></th>
          <th><strong>Alterar</strong></th>
          <th><strong>Excluir</strong></th>	
        </tr>
        <?php 
			$query = "SELECT *FROM usr ORDER BY cod_usr";
			$result = mysql_query($query);
			$num_reg = mysql_num_rows($result);
			
			for ($i=0; $i < $num_reg; $i++){
				
				$codigo = mysql_result($result,$i,'cod_usr');
				
				echo "<tr>";
				echo "<td align='center'>". mysql_result($result,$i,'cod_usr') . "</td>";
				echo "<td align='center'>". utf8_encode(mysql_result($result,$i,'nome_usr')) . "</td>";
				echo "<td align='center'>". mysql_result($result,$i,'login') . "</td>";
				echo "<td align='center'>". "<a href='mailto:" . mysql_result($result,$i,'email') . "'>" . mysql_result($result,$i,'email') ."</a>" . "</td>";
				echo "<td align='center'>". "<a href='usr_alt.php?cod=" . $codigo . "' class='editar'><img src='./imagens/btn_alterar.png' alt='Alterar' style='border:none;' title='Alterar'/>" . "</a>" . "</td>";
				if($codigo != $_SESSION['cod_usr']){
					echo "<td align='center'>". "<a href='usr_gravar.php?cod=" . $codigo . "' class='excluir'>" . "<img src='./imagens/btn_excluir.png' alt='Excluir' style='border:none;' title='Excluir' />" . "</a>" . "</td>";
				}else{
					echo "<td align='center'>-</td>";	
				}
				echo "</tr>";
			}
			
		?>
    </table>
</div>
&raquo;&nbsp;<a href="usr_inc.php" class="incusr">Incluir Novo Usuário </a>
<div id="cadastronovo"></div>
</body>
</html>