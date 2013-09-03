<?php

function decodeData($data){
	
	$auxData = explode("/", $data);
	$dia = $auxData[0];
	$mes = $auxData[1];
	$ano = $auxData[2];
	
	$novaData = $ano . "-" . $mes . "-" . $dia;
	
	return $novaData;
}


function encodeData($data){
	
	$auxData = explode("-", $data);
	$ano = $auxData[0];
	$mes = $auxData[1];
	$dia = $auxData[2];
	
	$novaData = $dia . "/" . $mes . "/" . $ano;
	
	return $novaData;
	
}

?>