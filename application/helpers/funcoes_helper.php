<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************
* Arquivo do Helper (Auxiliar) com funções de conversão e tratamento de strings
* específicas do idioma português.
*******************************************************************************/
function limpar($string){
    $string = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}

function reais($decimal){
    return "R$".number_format((double)$decimal,2,",",".");
}

function dataBr_to_dataMySQL($data){
    $campos = explode("/",$data);
    return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
}

function dataMySQL_to_dataBr($data){
    return date("d/m/Y" , strtotime($data));
}

function nome_campo($string){
	$string = str_replace("_"," ",$string);
	$string = ucwords($string);
	return $string;
}