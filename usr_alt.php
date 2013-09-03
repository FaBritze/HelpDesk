<?php
	include("./inc/testar_sessao.php");
	include("./inc/conexao.php");
	include("./inc/funcoes.php");
	
	$cod_usr = $_GET['cod'];
	$query = "SELECT *FROM usr WHERE cod_usr=" . $cod_usr;
	$result = mysql_query($query);
	
	if(!mysql_num_rows($result)){
		header("location:menu.php");
		exit;
	}
	
	$nomeusuario = mysql_result($result,0,"nome_usr");
	$loginusuario = mysql_result($result,0,"login");
	$senhausuario = mysql_result($result,0,"senha");
	$enderecousuario = mysql_result($result,0,"endereco");
	$cidadeusuario = mysql_result($result,0,"cidade");
	$ufusuario = mysql_result($result,0,"uf");
	$datausuario = encodeData(mysql_result($result,0,"data_nasc"));
	$sexousuario = mysql_result($result,0,"sexo");
	$telefoneusuario = mysql_result($result,0,"telefone");
	$celularusuario = mysql_result($result,0,"celular");
	$estadocivilusuario = mysql_result($result,0,"estado_civil");
	$emailusuario = mysql_result($result,0,"email");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript">

	
	var mascara = {
			
		id: $("#mask"),
		
		fechar: function(){
			mascara.id.fadeOut("slow");
			$("#divAlterar").fadeOut("slow");
				
		}};
		
$(function(){
	
	var estadoCivil = $("#hiddenEstadoCivl").val();
	$("#estado_civil").val(estadoCivil);
	
	
});

function validaDados(){
	
	var d = document.formCadastro;

	if( d.nome_usr.value == "" ) {
		alert("Você deve informar o nome do usuário!");
	 	d.nome_usr.focus();
		return false;
	}
	if( d.login.value == "" ) {
		alert("Você deve informar o login do usuário!");
	 	d.login.focus();
		return false;
	}
	if(d.senha.value == ""){
		alert("Você deve informar a senha do usuário!");
		d.senha.focus();
		return false;
	}

	if ((d.email.value == "") || (d.email.value.indexOf('@') == -1) || (d.email.value.indexOf('.') == -1) || d.email.value.indexOf(',')>=0) {
		alert("E-mail inválido ou não preenchido!");
	 	d.email.focus();
		return false;
	}
	$("#login").attr("disabled","");
	$.post("usr_gravar.php", $("#formCadastro").serialize(), function(retorno){
		$("#login").attr("disabled","disabled");
		mascara.fechar();
	});
	
	return false;
}
</script>
</head>
<body>
<br>
<form name="formCadastro" id="formCadastro" onSubmit="return validaDados()">
<input type="hidden" name="acao" value="alt" />
<input type="hidden" value="<?php echo $cod_usr ?>" />
<input type="hidden" value="<?php echo $estadocivilusuario?>" id="hiddenEstadoCivl" />
<table width="600">
<tr>
      <td width="124"><strong>Nome do usu&aacute;rio:</strong></td>
      <td width="464"><input id="nome_usr" name="nome_usr" type="text" size="60" maxlength="60" value="<?php echo utf8_encode($nomeusuario) ?>" /></td>
</tr>
<tr>
  <td><strong>Login:</strong></td>
  <td><input name="login" type="text" id="login" size="20" maxlength="20" disabled="disabled" value="<?php echo $loginusuario ?>"></td>
</tr>
<tr>
	<td><strong>Senha:</strong></td>
    <td><input type="text" name="senha" id="senha" size="20" maxlength="20" value="<?php echo $senhausuario ?>"/></td>
</tr>
<tr>
     <td><strong>Endere&ccedil;o:</strong></td>
       <td><input id="endereco" name="endereco" type="text" size="60" maxlength="60" value="<?php echo utf8_encode($enderecousuario) ?>" /></td>
</tr>
<tr>	   
       <td><strong>Cidade:</strong></td>
       <td><input id="cidade" name="cidade" type="text" size="30" maxlength="30" value="<?php echo utf8_encode($cidadeusuario) ?>" />
         &nbsp;&nbsp;&nbsp;<strong>UF:</strong><span class="texto">
       <select name="uf" id="uf">
         <OPTION value="AC">Acre</OPTION>
         <OPTION value="AL">Alagoas</OPTION>
         <OPTION value="AP">Amap&aacute;</OPTION>
         <OPTION value="AM">Amazonas</OPTION>
         <OPTION value="BA">Bahia</OPTION>
         <OPTION value="CE">Cear&aacute;</OPTION>
         <OPTION value="DF">Distrito Federal</OPTION>
         <OPTION value="ES">Esp&iacute;rito Santo</OPTION>
         <OPTION value="GO">Goi&aacute;s</OPTION>
         <OPTION value="MA">Maranh&atilde;o</OPTION>
         <OPTION value="MT">Mato Grosso</OPTION>
         <OPTION value="MS">Mato Grosso do Sul</OPTION>
         <OPTION value="MG">Minas Gerais</OPTION>
         <OPTION value="PA">Par&aacute;</OPTION>
         <OPTION value="PB">Para&iacute;ba</OPTION>
         <OPTION value="PR">Paran&aacute;</OPTION>
         <OPTION value="PE">Pernambuco</OPTION>
         <OPTION value="PI">Piau&iacute;</OPTION>
         <OPTION value="RJ">Rio de Janeiro</OPTION>
         <OPTION value="RN">Rio Grande do Norte</OPTION>
         <OPTION value="RS">Rio Grande do Sul</OPTION>
         <OPTION value="RO">Rondonia</OPTION>
         <OPTION value="RR">Roraima</OPTION>
         <OPTION value="SC" selected="selected">Santa Catarina</OPTION>
         <OPTION value="SP">S&atilde;o Paulo</OPTION>
         <OPTION value="SE">Sergipe</OPTION>
         <OPTION value="TO">Tocantins</OPTION>
       </SELECT>
       </span></td>
</tr>
<tr>	   
       <td><strong>Data Nascimento: </strong></td>
       <td>
	   <input name="data_nasc" type="text" id="data_nasc" size="15" maxlength="15" value="<?php echo $datausuario ?>" disabled="disabled" /></td>
</tr>
<tr>
  <td><strong>Sexo:</strong></td>
  <td>
  	<input type="text" id="sexo" disabled="disabled" size="15" value="<?php echo $sexousuario ?>"/>
  <!--&nbsp;
    <input type="radio" name="sexo" value="M" id="masc" style="cursor:pointer">
   	 	<label for="masc" style="cursor:pointer">Masculino</label>
    <input type="radio" name="sexo" value="F" id="fem" style="cursor:pointer">
		<label for="fem" style="cursor:pointer">Feminino</label>-->
</td>
</tr>
<tr>
  <td><strong>Telefone:</strong></td>
  <td><input class="phone" name="telefone" type="text" id="telefone" size="15" maxlength="15" value="<?php echo $telefoneusuario ?>" />
    <strong>&nbsp;&nbsp;&nbsp;&nbsp;Celular:</strong>
      <input class="phone" name="celular" type="text" id="celular" size="15" maxlength="15" value="<?php echo $celularusuario ?>" /></td>
</tr>
<tr>
  <td><strong>Estado Civil: </strong></td>
  <td><select name="estado_civil" id="estado_civil">
    <option value="Solteiro">Solteiro</option>
    <option value="Casado">Casado</option>
    <option value="Separado">Separado</option>
    <option value="Viuvo">Vi&uacute;vo</option>
    <option value="Uniao estavel">Uni&atilde;o Est&aacute;vel</option>
  </select></td>
</tr>
<tr>
  <td><strong>E-mail:</strong></td>
  <td><input name="email" id="email" type="text" size="60" maxlength="60" value="<?php echo $emailusuario ?>" /></td>
</tr>
<tr>
  <td height="20"></td>
  <td>&nbsp;</td>
</tr>
<tr>      
       <td></td>
       <td>
           <input type="submit" value="Alterar Dados">
	   </td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
</table>
</form>
</body>
</html>