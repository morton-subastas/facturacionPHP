<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if( ($fac !== '')){

    include "head.php";
    include "aside.php";
    include 'funciones_RFC.php';
    require_once ("../Controlador/controladorUsuarios.php");
    require_once ("../Modelo/modeloUsuarios.php");

    $filtro = "Todas";
    $auctions = getAuctions ($filtro);
    $cuantos  = count($auctions);
    $suma = 0;
    $all_AnUser = ControladorUsuarios::SearchUser($fac);
    $rol_bd = $all_AnUser['usu_rol'];
    ?>

    <div class="container">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header"><h1><strong style="color:#004D43 !important">Envío correo pago consignantes</strong></h1><br><br></legend>
                <form  class="col-lg-12"  action="searchPayments" method="post" >
                  <div class="form-group">
                    <div class="row datos">
                      <div class="col-md-8 mx-auto  prim-form">
                        <input type='hidden' name='rol' id='rol' value='<?php echo $rol_bd;?>'>
                          <select name="subasta" class="form-select select-sub" >
                            <?php
                            while ($suma <= $cuantos) {
                              echo "<option value='".$auctions[$suma]["saleno"].','.$auctions[$suma]["salename"]."'>".$auctions[$suma]["saleno"]."-".$auctions[$suma]["salename"]."-".$auctions[$suma]["saledate"]."</option>";
                              $suma = $suma + 1;
                            }

                            ?>

                          </select>
                        <!-- </div> -->
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                    <div class="col-md-3  text-center"></div>
                    <div class="col-md-6  text-center">
                      <button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Buscar</button>
                    </div>
                    <div class="col-md-3  text-center"></div>

                  </div>
                </form>
          </fieldset>
        </div>
      </div>
    </div>



<?php
}else{
  echo "<CENTER><h1> NO TIENE PERMISOS</h1></CENTER>";
}
?>
