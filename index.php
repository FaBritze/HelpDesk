<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>..:: Sistema de Help Desk - Logar ::..</title>
<script type="text/javascript" language="javascript" src="js/index.js"></script>
<link type="text/css" rel="stylesheet" href="css/index.css"/>
</head>
<body onLoad="iniciou()">
<form action="logar.php" method="POST" name="formLogin" onSubmit="return validaLogin()">

	<fieldset class="centro">
    	<legend>Sistema de HelpDesk</legend>
		<span class="caixa">
        <label>Login: </label>
		<input name="login" id="login" type="text" size="15" title="Digite aqui seu login..."/>
		</span>
    	<span class="caixa">
        	<label>Senha: </label>
    		<input name="senha" id="senha" type="password" size="15" title="Digite aqui sua senha..." onFocus="verificaLogin()"/>
        </span>
        <span class="caixa">
	        <input type="checkbox" id="salvar" style="cursor:pointer;"/>
            <label for="salvar" style="width:120px;" class="lembrar">Lembrar minha senha</label>
        </span>
        <input name="submit" class="btn" type="submit" value="Logar"/>
    </fieldset>
</form>
</body>
</html>
