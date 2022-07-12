<?php

// phpinfo();
include 'config.php';
include 'inizio_pagina.php';

/*echo "<br />\n";
echo "<br />\n";
print_r($_SERVER);
echo "<br />\n";
echo "<br />\n";
print_r($_ENV);
echo "<br />\n";
echo "<br />\n";
print_r($_REQUEST);
echo "<br />\n";
echo "<br />\n";
*/

$qrcode = str_replace('http://', 'https://', $_SERVER['SCRIPT_URI']);

//echo $qrcode;
//echo "<br>\n";

if ($qrcode != ($baseUrlRedirect . '/')) {

    $sql = 'SELECT * FROM qrcode WHERE qrcode=\'' . addslashes($qrcode) . '\';';
    //echo $sql;
    //echo "<br>\n";

    $result = mysqli_query($connessione, $sql);
    $row = mysqli_fetch_array($result);
    $redirect = $row['redirect'];

    if ($redirect != '') {

        //echo $redirect;
        //echo "<br>\n";

        //inserisco il log della visita
        
        $sqlLog = "INSERT INTO `qrcode`.`log` (`id`, `date`, `SCRIPT_URI`, `REMOTE_ADDR`, `id_qrcode`, `redirect`) VALUES (NULL, NOW(), '".addslashes($_SERVER['SCRIPT_URI'])."', '".addslashes($_SERVER['REMOTE_ADDR'])."', '".$row['id']."', '".$row['redirect']."' );";
        //echo $sql;
        //echo "<br>\n";
        $result = mysqli_query($connessione, $sqlLog);
        
        include 'fine_pagina.php';
        
        header('Location: '.$redirect);
        
    } else {

        echo 'ERRORE: qrcode non valido';

        include 'fine_pagina.php';
    }
} else {

    echo 'ERRORE: nessun qrcode selezionato';

    include 'fine_pagina.php';
}

?>