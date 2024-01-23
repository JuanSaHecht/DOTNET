<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
$boardTest = "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL";
print("tablero");
var_dump($boardTest);


$url = "https://localhost:7246/ChessGame?board=".$boardTest;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$json = curl_exec($ch);
//var_dump($response);
if (!$json)
{
	echo curl_error($ch);
}
curl_close($ch);
$x = json_decode($json,true);
var_dump($x);
?>