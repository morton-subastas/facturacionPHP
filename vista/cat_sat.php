<?php
error_reporting(0);

if(!isset($_SESSION))
{
  session_start();
}


//$logueado = 1;
//echo "logueado".$logueado;
if((session_id() != '') OR (session_name() != '')){
  include "head.php";
  include "aside.php";
?>



<div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
              <fieldset>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Catálogos S.A.T</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                      <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos</strong> <strong>S.A.T</strong></h1></legend>
                      <div class="row" style="text-align:center">
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_conceptoServicio">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Concepto Servicio</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_formapago">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Forma-Pago</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_lugarexpedicion"> <!-- SON LOS CP-->
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal">Lugar Expedición</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_metodopago">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Método Pago</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="row" style="text-align:center">
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_monedas">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Monedas</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_tipocomprobante">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Tipo Comprobante</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_unidades">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Unidades</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <div class="box-header">
                                    <a href="cat-sat_uso">
                                        <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Uso</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                      </div>
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
<?php
}else{
    include "header.php";
    include "error404.php";
}?>
