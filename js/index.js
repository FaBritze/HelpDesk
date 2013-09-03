// JavaScript Document
function verificaLogin(){
	if(document.getElementById("login").value == getCookie('login_cookie')){
		document.getElementById("senha").value = getCookie('senha_cookie');
	}
}

function setCookie(nome, valor, diasexpira){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + diasexpira);
	document.cookie = nome + "=" + escape(valor) + ((diasexpira==null) ? "" : ";expires=" + exdate.toUTCString());
}
function getCookie(nome){
	if (document.cookie.length > 0){
	  c_start = document.cookie.indexOf(nome + "=");
	  if (c_start!=-1){
		c_start = c_start + nome.length + 1;
		c_end = document.cookie.indexOf(";", c_start);
		
		if (c_end == -1){
			c_end=document.cookie.length;
		}
		return unescape(document.cookie.substring(c_start,c_end));
		}
	  }
	return "";
}


function iniciou(){
	document.body.bgColor='lavender';
	/*var _usuario = getCookie('login_cookie');
	var _senha = getCookie('senha_cookie');
	
	if (_usuario != null && _usuario !=""){
		document.getElementById("login").value = _usuario;	
	}
	if (_senha != null && _senha != ""){
		document.getElementById("senha").value = _senha;
	}*/
}

function validaLogin(){	
	if(document.formLogin.login.value=="" || document.formLogin.senha.value==""){
		if (!document.getElementById("login").value){
			alert("Preenche o campo login!");
			document.getElementById("login").focus();
			document.getElementById("login").className = "erro";
		}else{
			document.getElementById("login").className = "";
		}
		if (!document.getElementById("senha").value){
			alert("Preencher o campo senha!");
			document.getElementById("senha").focus();
			document.getElementById("senha").className = "erro";
		}else{
			document.getElementById("senha").className = "";
		}
		return false;
	}
	
	if (document.getElementById("salvar").checked){
		setCookie('login_cookie', document.getElementById("login").value, 5);
		setCookie('senha_cookie', document.getElementById("senha").value, 5);
	}
	
	return true;
}
 