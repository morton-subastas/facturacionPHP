<?php
//$ar = fopen("layout.txt", "r") or die ("r¡Error!, A genera archivo");
$ar = fopen("layout.txt", "w") or die ("¡wError!, A genera archivo");

$asu = "PRUEBA";

fwrite($ar, $asu);
fwrite($ar, "\n");

echo "Se creo correctamen el archivo";
fclose($ar);
?>
