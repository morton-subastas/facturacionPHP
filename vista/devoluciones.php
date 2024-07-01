<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

//echo "*".$fac."*";
if( ($fac !== '')){

  //echo "-ABCDEFG-";
    include "head.php";
    include "aside.php";

    if( ($fac == 'mjimenez@mortonsubastas.com') || ($fac=='jjuarez@mortonsubastas.com') || ($fac == 'vmartinez@mortonsubastas.com') or ($fac == 'mramirez@mortonsubastas.com')){
            switch($fac){
              case 'jjuarez@mortonsubastas.com':
                    $filtro = "JoyeriaAntiguedades";
              break;
              case 'eibarra@mortonsubastas.com':
                    $filtro = "Libros";
              break;
              case 'ebonilla@mortonsubastas.com':
                    $filtro = "ArteObra";
              break;
              case 'mjimenez@mortonsubastas.com':
              case 'mramirez@mortonsubastas.com':
                    $filtro = "Oportunidades";
              break;
              case 'vmartinez@mortonsubastas.com':
              case 'rcerecedo@mortonsubastas.com':
              case 'mbartolo@mortonsubastas.com':
                    $filtro = "Todas";
              break;
            }
            include 'funciones_RFC.php';
            $variable = getAuctions ($filtro);
            $cuantos  = count($variable); //."<br>";
            $suma = 0;

    //echo "antes";
    require_once ("../Controlador/controladorUsuarios.php");
    require_once ("../Modelo/modeloUsuarios.php");
    //echo "<br>VISTA: envia controlador";
    $all_AnUser = ControladorUsuarios::SearchUser($fac);
    //var_dump($all_AnUser['usu_rol']);
    $rol_bd = $all_AnUser['usu_rol'];
    ?>

    <div class="container">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header"><h1><strong style="color:#004D43 !important">Devoluciones</strong></strong></h1><br><br></legend>
                <?php
                    echo '<form  class="col-lg-12"  action="searchDevolver" method="post" >';
                  ?>
                <!--<form  class="col-lg-12"  action="prueba" method="post" >-->
                  <div class="form-group">
                    <div class="row datos">
                      <div class="col-md-8 mx-auto  prim-form">
                        <!-- <p>Subasta :</p> -->
                        <!-- <div class="caja"> -->
                        <input type='hidden' name='rol' id='rol' value='<?php echo $rol_bd;?>'>

                          <select name="subasta" class="form-select select-sub" >
                            <?php
                            while ($suma <= $cuantos) {
                              echo "<option value='".$variable[$suma]["saleno"].','.$variable[$suma]["salename"]."'>".$variable[$suma]["saleno"]."-".$variable[$suma]["salename"]."-".$variable[$suma]["saledate"]."</option>";
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
}
else{
  //echo "<CENTER><h1> NO TIENE PERMISOS</h1></CENTER>";
}
}else{
  echo "<CENTER><h1> NO TIENE PERMISOS</h1></CENTER>";
}
?>
