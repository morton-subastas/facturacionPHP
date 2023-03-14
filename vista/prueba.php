<?php

session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
  include "head.php";
  include "aside.php";

  echo "<h1>LLEGA PRUEBA</H1>";

}else{
    include "header.php";
    include "error404.php";
    echo "capital";
    ?>
    <script>
      setTimeout(function () {
        window.location.href = 'https://www.desarrollomorton.com/facturacion';
      },2000); // 5 seconds
    </script>

<?php
}

?>
