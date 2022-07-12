<?php

// phpinfo();
include 'config.php';
include 'inizio_pagina.php';

$url = $_GET['url'];

//costruisco l'url che verrà rediretto all'url richiesto

//$sha512url = hash('sha512', $url); // fungerà anche da nome file del qrcode
$sha512url = hash('md5', $url); // fungerà anche da nome file del qrcode

$urlRedirect = $baseUrlRedirect . '/' . $sha512url;

$filename = $baseDir.'/'.$sha512url.'.png';

// genero il file con le google api

$googleChartAPI = 'https://chart.apis.google.com/chart';
$size = 500;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $googleChartAPI);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($urlRedirect));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$img = curl_exec($ch);
curl_close($ch);

if ($img) {
    file_put_contents($filename, $img);
} else {
die ('errore generazione qrcode');
}

//scrivo nel database il qrcode

$sql = "INSERT INTO `qrcode`.`qrcode` (`id`, `qrcode`, `redirect`, `file`) VALUES (NULL, '".addslashes($urlRedirect)."', '".addslashes($url)."', '".addslashes($filename)."');";
//echo $sql;
//echo "<br>\n";

$result = mysqli_query($connessione, $sql);

include 'fine_pagina.php';

header('Location: index.php');
?>