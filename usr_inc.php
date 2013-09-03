<?php
	include("./inc/testar_sessao.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" language="javascript">


var tabela = {
	
	id: $(".tabelaPessoa tr:last"),
	
	adicionar: function(conteudo){
		tabela.id.after(conteudo);		
	}
	
	
	};


$(function(){
	
	$("#data_nasc").mask("99/99/9999");	
	$(".phone").mask("(99)9999-9999");
	
});

function caracteresInvalidos(texto){
	var caracteresInvalidos = 'àèìòùâêîôûäëïöüáéíóúãõÀÈÌÒÙÂÊÎÔÛÄËÏÖÜÁÉÍÓÚÃÕ´` ,;"';
	for (var i=0;i<caracteresInvalidos.length;i++){
		if(texto.indexOf(caracteresInvalidos[i])>=0){
			return true;
		}
	}
	return false;
}

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
	if(caracteresInvalidos(d.login.value)){
		alert("O campo login possui caracteres inválidos!");
		d.login.focus();
		return false;	
	}
	if(d.senha.value == ""){
		alert("Você deve informar a senha do usuário!");
		d.senha.focus();
		return false;
	}

	if ((d.email.value == "") || (d.email.value.indexOf('@') == -1) || (d.email.value.indexOf('.') == -1)) {
		alert("E-mail inválido ou não preenchido!");
	 	d.email.focus();
		return false;
	}
	
	if(caracteresInvalidos(d.email.value)){
		alert("O campo e-mail possui caracteres inválidos!");
		d.email.focus();
		return false;
	}
					
	$.post("usr_gravar.php", $("#formCadastro").serialize(), function(retorno){
		if(retorno){
			$("#sucesso").show("normal");
			tabela.adicionar(retorno);
			$("#reseta").trigger("click");
			setTimeout(function(){ 
				$("#sucesso").hide("normal") }, 3000);
		}else{
			alert("Usuário já cadastrado! Uitilize outro usuário...");
		}
	});
	
	return false;
}
</script>
<style type="text/css">
	.sucesso{
		display:none;
		float:right;
		width:400px;
		color:#F33;
	}
</style>
</head>
<body>
<br>
<div id="sucesso" class="sucesso"><h3>Usuário cadastrado com sucesso!</h3></div>
<form name="formCadastro" id="formCadastro" onSubmit="return validaDados()">
<input type="hidden" name="acao" value="inc">
<table width="600">
<tr>
      <td width="124"><strong>Nome do usu&aacute;rio:</strong></td>
      <td width="464"><input id="nome_usr" name="nome_usr" type="text" size="60" maxlength="60" > 
        * </td>
</tr>
<tr>
  <td><strong>Login:</strong></td>
  <td><input name="login" type="text" id="login" size="20" maxlength="20" value=""> 
    * </td>
</tr>
<tr>
	<td><strong>Senha:</strong></td>
    <td><input type="password" name="senha" id="senha" size="20" maxlength="20" value=""/> *</td>
</tr>
<tr>
     <td><strong>Endere&ccedil;o:</strong></td>
       <td><input id="endereco" name="endereco" type="text" size="60" maxlength="60"></td>
</tr>
<tr>	   
       <td><strong>Cidade:</strong></td>
       <td><input id="cidade" name="cidade" type="text" size="30" maxlength="30">       
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
	   <input name="data_nasc" type="text" id="data_nasc" size="15" maxlength="15" value=""></td>
</tr>
<tr>
  <td><strong>Sexo:</strong></td>
  <td>&nbsp;
    <input type="radio" name="sexo" value="M" id="masc" style="cursor:pointer">
   	 	<label for="masc" style="cursor:pointer">Masculino</label>
    <input type="radio" name="sexo" value="F" id="fem" style="cursor:pointer">
		<label for="fem" style="cursor:pointer">Feminino</label>
</td>
</tr>
<tr>
  <td><strong>Telefone:</strong></td>
  <td><input class="phone" name="telefone" type="text" id="telefone" size="15" maxlength="15">
    <strong>&nbsp;&nbsp;&nbsp;&nbsp;Celular:</strong>
      <input class="phone" name="celular" type="text" id="celular" size="15" maxlength="15"></td>
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
  <td><input name="email" id="email" type="text" size="60" maxlength="60">
    *</td>
</tr>
<tr>
  <td height="20"></td>
  <td>&nbsp;</td>
</tr>
<tr>      
       <td></td>
       <td>
	   <input type="reset" id="reseta" value="Limpar">
	   <input type="submit" value="Gravar Dados">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Campos obrigat&oacute;rios </td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
</table>
</form>
</body>
</html>