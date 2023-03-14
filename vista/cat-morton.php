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
                    <!-- <div class="col-md-12">
                      <a href="../../facturacion/vista/facturacion">Inició</a>/
                    </div> -->
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Catalogo Morton</li>
                </ol>
              </nav> -->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Catálogos Morton</li>
                </ol>
              </nav>

              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos</strong> <strong>Morton</strong></h1></legend>
                        <div class="row" style="text-align:center">
                          <div class="col-md-4">
                              <div class="box">
                                  <div class="box-header">
                                      <a href="cat-morton_emisores">
                                          <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Emisores</button>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="box">
                                  <div class="box-header">
                                      <a href="cat-morton_comisiones">
                                          <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Comisiones</button>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_receptores">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Receptores</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>

                            </div>
                            <br>
                            <br>
                            <div class="row" style="text-align:center">
                              <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_rutatimbres">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Ruta-Timbres</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_serviciosproductos">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Servicios-Productos</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_pac">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Timbrado PAC</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="row" style="text-align:center">
                              <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_usuarios">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Usuarios</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="box">
                                      <div class="box-header">
                                          <a href="cat-morton_cuentascontables">
                                              <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos">Cuentas Contables</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                            </div>


                        <br>
                        <div class="box-body">
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
}?>
