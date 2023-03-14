<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
require_once ("../Controlador/controladorFormaPago.php");
require_once ("../Modelo/modeloFormaPago.php");


$c_FormaPago =  ControladorFormaPago::ctrlFormaPago_f();

//var_dump($icono);

$botonStatus = $_POST['status'];
$valor = explode("-",$botonStatus);
//echo "valore-".$valor."<br>";
//echo "STATUS-".$botonStatus."<br>";
if($botonStatus != ''){
  $estatus = $valor[0];
  $clave = $valor[1];

  $r_status = ControladorFormaPago::ctrlUpdateFormaPago($clave, $estatus);
  if($r_status == 1){
    //header("Refresh:10");

    header("location:cat-sat_formapago.php");
    header("Refresh:3");
    //echo '<script type="text/JavaScript"> location.reload(); exit; </script>';

  }
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
                    <li class="breadcrumb-item active" aria-current="page">Forma de Pago</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                      <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogo S.A.T.</strong> - <strong>Forma de Pago</strong></h1></legend>
                        <br>
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Estatus</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($c_FormaPago as $key => $value){
                                    echo "<tr>";
                                        echo "<td>".$value['formapago_clave']."</td>";
                                        echo "<td>".$value['formapago_descripcion']."</td>";
                                        echo "<td>";
                                        $clave = $value['formapago_clave'];
                                            if ($value['status'] == "ACTIVO"){
                                                echo " <button type='submit' id='status' name='status' value='INACTIVO-".$clave."' class='btn btn-success'>ON</button>";
                                              }if($value['status'] == "INACTIVO"){
                                                echo " <button type='submit' id='status' name='status' value='ACTIVO-".$clave."' class='btn btn-danger'>OFF</button>";
                                              }
                                            echo "</td>";
                                        echo '<td> <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
