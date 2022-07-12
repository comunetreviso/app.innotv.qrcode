<?php

// phpinfo();
include 'config.php';
include 'inizio_pagina.php';

?>

<h1>Generatore di QRCODE</h1>
<div>
	
	<form action=insert.php method="get">
		URL: <input type="text" name="url"> <input type="submit"
			value="GENERA">
	</form>
</diV>
<div>
	<table border='1'>
	<tr>
	<th>id</th>
	<th>URL reale</th>
	<th>URL qrcode (che poi viene rediretto verso l'URL reale)</th>
	<th>file</th>
	<th>visite</th>
	</tr>
	
<?php

$sql = 'SELECT * FROM qrcode;';
//echo $sql;
echo "<br>\n";

$result = mysqli_query($connessione, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td style="text-align:center">';
    echo htmlentities($row['id']);
    echo '</td>';
    echo '<td>';
    echo '<a href="'.htmlentities($row['redirect']).'">'.htmlentities($row['redirect']).'</a>';
    echo '</td>';
    echo '<td>';
    echo '<a href="'.htmlentities($row['qrcode']).'">'.htmlentities($row['qrcode']).'</a>';
    echo '</td>';
    echo '<td>';
    echo '<img src="'.htmlentities(str_replace($serverDir, '', $row['file'])).'" width="100px" height="100px">';
    echo '</td>';
    echo '<td style="text-align:center">';
    //calcolo le visite ottenute
    $sqlLog = 'SELECT id FROM log WHERE id_qrcode=\''.$row['id'].'\';';
    //echo $sqlLog;
    //echo "<br>\n";
    $resultLog = mysqli_query($connessione, $sqlLog);
    echo mysqli_num_rows($resultLog);
    echo '</td>';
    echo '</tr>';
}

?>
</table>
</div>

<?php

include 'fine_pagina.php';

?>