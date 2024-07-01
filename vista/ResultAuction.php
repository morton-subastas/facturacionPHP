<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if (($fac != '')) {

  //echo "-ABCDEFG-";
  include "head.php";
  include "aside.php";

  /**************************************************************
   *CONEXION A RFC
   ***************************************************************/
  switch ($fac) {
    case 'jjuarez@mortonsubastas.com':
      $filtro = "JoyeriaAntiguedades";
      break;
      //case 'eibarra@mortonsubastas.com':
    case 'cpascual@mortonsubastas.com':
      $filtro = "Libros";
      break;
    case 'ebonilla@mortonsubastas.com':
      $filtro = "ArteObra";
      break;
    case 'mjimenez@mortonsubastas.com':
    case 'mramirez@mortonsubastas.com':
      $filtro = "Oportunidades";
      break;
    case 'msanchez@mortonsubastas.com':
    case 'rcerecedo@mortonsubastas.com':
    case 'mbartolo@mortonsubastas.com':
    case 'ehernandez@mortonsubastas.com':
      $filtro = "Todas";
      break;
  }
  include 'funciones_RFC.php';

  //list($numsub, $saledate, $saledept, $locate) = getAuctions();
  $variable = getAuctions($filtro);

  $variable_pre = getAuctionsAll($filtro);
  //    echo "--------------"; var_dump($variable[0]); echo "--------------";
  //echo "0)En proceso de construccion<br>";
  //echo "muestraA";
  //var_dump($variable);
  $cuantos  = count($variable); //."<br>";
  $cuantos_pre = count($variable_pre);
  $suma = 0;
  $suma_pre = 0;

  //echo "antes";
  require_once("../Controlador/controladorUsuarios.php");
  require_once("../Modelo/modeloUsuarios.php");
  //echo "<br>VISTA: envia controlador";
  $all_AnUser = ControladorUsuarios::SearchUser($fac);
  //var_dump($all_AnUser['usu_rol']);
  $rol_bd = $all_AnUser['usu_rol'];
?>

  <!-- SI LLEGA ----------------------------------------------------------------- -->
  <div class="container">
    <div class="col-md-12">
      <div class="well well-sm">
        <fieldset>
          <legend class="text-center header">
            <h1><strong style="color:#004D43 !important">Subastas</strong> <strong>Disponibles</strong></h1><br><br>
          </legend>
          <?php
          $accion = trim($_GET["acc"]);
          //echo $accion;
          if (($fac == 'msanchez@mortonsubastas.com') || ($fac == 'rcerecedo@mortonsubastas.com') || ($fac == 'mbartolo@mortonsubastas.com')) {
            echo '<form  class="col-lg-12"  action="SearchSellers2" method="post" >';
          } else {
            if ($accion == "not") {
              //echo "notificaciones";
              echo '<form  class="col-lg-12"  action="NotificationPreview" method="post" >';
            }
            if ($accion == "res") {
              //echo "resultados";
              echo '<form  class="col-lg-12"  action="AuctionDoes" method="post" >';
            }
          }
          ?>
          <!--<form  class="col-lg-12"  action="prueba" method="post" >-->
          <div class="form-group">
            <div class="row datos">
              <div class="col-md-8 mx-auto  prim-form">
                <!-- <p>Subasta :</p> -->
                <!-- <div class="caja"> -->
                <input type='hidden' name='rol' id='rol' value='<?php echo $rol_bd; ?>'>
                <?php if ($accion == "res") { ?>
                  <h4>RESULTADO DE SUBASTA</h4>

                  <select name="pre_subasta" class="form-select select-sub">
                    <?php
                    while ($suma <= $cuantos) {
                      //echo "1)".$variable[$suma]["saleno"]."<br>";
                      //echo "2)".$variable[$suma]["salename"]."<br>";
                      //echo "3)".$variable[$suma]["saledate"]."<br><br>";

                      echo "<option value='" . $variable[$suma]["saleno"] . "&" . $variable[$suma]["saledate"] . "&" . $variable[$suma]["salename"] . "'>" . $variable[$suma]["saleno"] . "-" . $variable[$suma]["salename"] . "-" . $variable[$suma]["saledate"] . "</option>";
                      $suma = $suma + 1;
                    }
                    ?>

                  </select>
                <?php } ?>
                <?php //if (($accion == "not") || ($fac == 'msanchez@mortonsubastas.com')){ 
                ?>
                <?php if ($accion == "not") { ?>
                  <br>
                  <h4>NOTIFICACIONES PREVIAS SUBASTA</h4>
                 
                  <select name="pre_subasta" class="form-select select-sub">
                    <?php
                    while ($suma_pre <= $cuantos_pre) {
                      //echo "1)".$variable[$suma]["saleno"]."<br>";
                      //echo "2)".$variable[$suma]["salename"]."<br>";
                      //echo "3)".$variable[$suma]["saledate"]."<br><br>";

                      echo "<option value='" . $variable_pre[$suma_pre]["saleno"] . "&" . $variable_pre[$suma_pre]["saledate"] . "&" . $variable_pre[$suma_pre]["salename"] . "'>" . $variable_pre[$suma_pre]["saleno"] . "-" . $variable_pre[$suma_pre]["salename"] . "-" . $variable_pre[$suma_pre]["saledate"] . "</option>";
                      $suma_pre = $suma_pre + 1;
                    }
                    ?>
                  </select>
                <?php } ?>
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
}
?>