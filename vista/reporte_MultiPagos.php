<?php
//error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
  include "head.php";
  include "aside.php";

  echo "MULTIPAGOS-VIEW<br>";
  require_once ("../Controlador/controladorMultiPagos.php");



  $c_MultiPagos =  ControladorMultiPagos::ctrl_getAllPayments();

  var_dump($c_MultiPagos);
}else{
  include "header.php";
  include "error404.php";


  ?>
  <script>
      setTimeout(function () {
          window.location.href = 'https://www.desarrollomorton.com/admin/facturacion';
        },2000); // 5 seconds
  </script>
<?php

}
