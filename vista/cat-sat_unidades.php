<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
require_once ("../Controlador/controladorUnidades.php");
require_once ("../Modelo/modeloUnidades.php");

$c_Unidades =  controladorUnidades::ctrlUnidades();

error_reporting(0);
if (($_POST['id'] != '')) {
    $nuevo = new controladorUnidades();
    $asd = $nuevo->deleteUnidad($_POST['id']);
    if ($asd == 1){
        ?>
        <div class="alert alert-success">
            <a href="#" class="alert-link">¡Registro eliminado con èxito!</a>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            <a href="#" class="alert-link">¡Ocurrir un inconveniente, concte àrea de Sistemas!</a>
        </div>
        <?php
    }
    header( "refresh:1; url=CAT-SAT_Unidades.php" );
}else{
    echo $_POST['id'];
}

if (($_POST['clave'] != '')   && ($_POST['descripcion'] != '') ) {
    $nuevo = new controladorUnidades();
    $asd = $nuevo->setUnidad($_POST['clave'], $_POST['descripcion']);
    if ($asd == 1){
        ?>
        <div class="alert alert-success">
            <a href="#" class="alert-link">¡Registro ingresado con èxito!</a>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            <a href="#" class="alert-link">¡Ocurrir un inconveniente, concte àrea de Sistemas!</a>
        </div>
        <?php
    }
    header( "refresh:1; url=CAT-SAT_Unidades.php" );
}else{
    echo $_POST['clave'];
}

?>

<div class="container">
    <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                <li class="breadcrumb-item"><a href="../vista/cat_sat.php">Catálogos S.A.T</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unidades</li>
              </ol>
            </nav>
          </fieldset>
            <fieldset>
              <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogo S.A.T.</strong> - <strong>Unidades</strong></h1></legend>
              <br>
              <div class="box">
                  <div class="box-header" style="text-align:center">
                      <button type="button" class="btn btn-success btn-lg agregar" data-toggle="modal" data-target="#AgregaConceptos">Nuevo</button>
                  </div>
                  <br>
                  <br>
              </div>
            <form action="#" method="post" class="col-lg-12">
                <div class="col-md-12">
                    <div class="box-body">
                        <table id="table" class="table table-bordered tabla-fac">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($c_Unidades as $key => $value){
                                    echo '<form action="#" method="post" class="col-lg-12">';
                                    echo '<input type="hidden" id="id" name="id" value='.$value['unidad_clave'].'>';
                                    echo "<tr>";
                                        echo "<td>".$value['unidad_clave']."</td>";
                                        echo "<td>".$value['unidad_nombre']."</td>";
                                        echo '<td> <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                    echo "</tr>";
                                    echo '</form>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        </fieldset>
    </div>
</div>
    <!-------------------------------------------------------------------------------------------------->
    <!----------------------------AQUÌ COMIENZA EL MODAL------------------------------------------------>
    <!-------------------------------------------------------------------------------------------------->
    <div class="modal fade"  id="AgregaConceptos" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box-body">
                      <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Registro</strong></h3></legend>
                    <form action="#" method="post" class="col-lg-12">
                            <div class="form-group">
                                    <label>Clave</label>
                                    <input type="text" class="form-control" id="clave" name="clave"  required="">
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required=""></textarea>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top: none">
                          <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-success btn-lg agregar">Agregar</button>
                          </div>
                            <!--<input type="button" class="btn btn-primary" data-toggle="modal" value="Crear"  />-->
                            <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-danger btn-lg eliminar" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
