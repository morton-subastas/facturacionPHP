<?php

session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
  include "head.php";
  include "aside.php";

// $datVerificacion = $_POST["subasta"];
//echo "E-".$fac."-<br>";
?>
<div class="container">
  <!-- <?php
  if ($datVerificacion != NULL) {
    echo $datVerificacion ;
  }else {
    echo "no llega";
  }
   ?> -->
  <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend class="text-center header"><h1><strong style="color:#004D43 !important">Correos</strong> <strong>Morton</strong></h1></legend>
                <div class="row" style="text-align:center">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_devolucionPieza">-->
                                <a href="emails/email_M_devolucionPieza">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Devolución de piezas_</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_devolucionNormal">-->
                                <!--<a href="emails/email_M_devolucionNormal">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Devolución normales_</button>
                                </a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_notificacion">-->
                                <a href="emails/email_M_notificacion">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Notificación previas a subasta</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <br><br>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_reencontrar">-->
                                <!--<a href="emails/email_M_reencontrar">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Para reencontratar_</button>
                                </a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_resultados">-->
                                <a href="emails/email_M_resultados">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Resultados generales_</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <!--<a href="emails/email_notificacionSubasta">-->
                                <!--<a href="emails/email_M_notificacionSubasta">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Notificación subasta_</button>
                                </a>-->
                            </div>
                        </div>
                    </div>
                </div>

              </fieldset>
        </form>
      </div>
    </div>
</div>


<?php
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
