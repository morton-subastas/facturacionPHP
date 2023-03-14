<?php
session_start();
$_SESSION["paleta2"] = "";
$_SESSION["subasta2"] = "";
$_SESSION["fecha_participa2"] = "";


//session_destroy();
//session_unset();

header('Location: facturacion');

?>
