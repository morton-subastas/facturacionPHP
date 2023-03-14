<?php

error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
    include "head.php";
    include "aside.php";

    echo '<embed src="MANUAL_FACTURACION.pdf" type="application/pdf" width="100%" height="600px" />';

  }else{
    include "header.php";
    include "error404.php";
  }
 ?>
