// JavaScript Document

contador = 5;

function retorna(){
	document.getElementById("voltar").innerHTML = "<a href='index.php'>Voltar (" + contador + ")<a/>";
 	setTimeout(contar,1000);
}

function contar(){
	if(contador == 0){
		if(document.cookie.indexOf("login_cookie")>=0){
			deleteCookie("login_cookie");
			deleteCookie("senha_cookie");
		}
		window.location = "index.php";
	}else{
		contador--;
		document.getElementById("voltar").innerHTML = "<a href='index.php'>Voltar (" + contador + ")<a/>";	
		retorna();
	}
}
function deleteCookie(nome){
	var exdate = new Date();
	exdate.setTime(exdate.getTime() + (-1 * 24 * 3600 * 1000));
	document.cookie = nome + "=" + escape("")+ ((-1  == null) ? "" : "; expires=" + exdate);
} 
