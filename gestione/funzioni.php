<?php

//questa funzione converte la stringa data in una stringa nel formato date time per il database mysql
function convertiData2MysqlDateTIme($data) {
	$anno=substr($data, 6, 4);
	$mese=substr($data, 3, 2);
	$giorno=substr($data, 0, 2);
	return ($anno."-".$mese."-".$giorno." 00:00:00");
}

function convertiMysqlDateTime2Data($data) {
	$anno=substr($data, 0, 4);
	$mese=substr($data, 5, 2);
	$giorno=substr($data, 8, 2);
	return ($giorno."/".$mese."/".$anno);
}

function convertiData2MysqlDate($data) {
	$anno=substr($data, 6, 4);
	$mese=substr($data, 3, 2);
	$giorno=substr($data, 0, 2);
	return ($anno."-".$mese."-".$giorno);
}

function convertiMysqlDate2Data($data) {
	$anno=substr($data, 0, 4);
	$mese=substr($data, 5, 2);
	$giorno=substr($data, 8, 2);
	return ($giorno."/".$mese."/".$anno);
}

function dataEstesa ($data) {
	//$array_giorni = array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
	//$array_mesi = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
	$array_giorni = array('domenica', 'lunedì', 'martedì', 'mercoledì', 'giovedì', 'venerdì', 'sabato');
	$array_mesi = array('gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre');
	$timestamp=mktime(0,0,0,substr($data,5,2),substr($data,8,2),substr($data,0,4));
	$stringa=$array_giorni[date('w',$timestamp)]." ".date('j',$timestamp)." ".$array_mesi[date('n',$timestamp)-1]." ".substr($data,0,4);
	return $stringa;
}

function dataEstesaMaiuscola ($data) {
	$array_giorni = array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
	//$array_mesi = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
	//$array_giorni = array('domenica', 'lunedì', 'martedì', 'mercoledì', 'giovedì', 'venerdì', 'sabato');
	$array_mesi = array('gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre');
	$timestamp=mktime(0,0,0,substr($data,5,2),substr($data,8,2),substr($data,0,4));
	$stringa=$array_giorni[date('w',$timestamp)]." ".date('j',$timestamp)." ".$array_mesi[date('n',$timestamp)-1]." ".substr($data,0,4);
	return $stringa;
}


?>
