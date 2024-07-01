
<?php
//error_reporting(1);
session_start();
$fac = $_SESSION['email'];
if(($fac != '')){
  include "head.php";
  include "aside.php";

  echo '<center>

  <div class="authentication-form mx-auto">
    <h1><strong style="color:#004D43">MortonSubastas</strong> <strong style="color:#333">Desarrollo</strong></h1><br><br>
      <div class="logo-centered">
          <a href="">
              <img src="../assets/img/logo.png" alt="logo">
          </a>
      </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 my-auto no-padding"></div>
  <div class="col-xl-4 col-lg-4 col-md-4 my-auto no-padding" align = "justify">
  <h5>Este desarrollo es interno y se recomienda que la contraseña sea actualizada por lo menos cada 3 meses. Para cualquier
  anomalía o mal uso es responsabilidad del usuario, por lo tanto si existe algun fallo reportarla al área de Sistemas, ya que todo se registra.

  <br><br><b>Medios de contacto:</b><br>
  Marco Bartolo ext. 6885<br>
  mbartolo@mortonsubastas.com</h5>

  <br><br><br>
  Última actualización 23 de Abril del 2022
  </center>
  </div>';

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
?>
