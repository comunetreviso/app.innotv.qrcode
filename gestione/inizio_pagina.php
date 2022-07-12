<?php
/*
 * error_reporting(E_ALL); // report all errors
 * ini_set("display_errors", 1);
 * ini_set("display_startup_errors", 1);
 */
include ("config.php");
include ("funzioni.php");


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connessione = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("Connessione non riuscita: " . mysqli_error());

?>
