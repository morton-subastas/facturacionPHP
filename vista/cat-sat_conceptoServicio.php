<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";

require_once ("../Controlador/controladorConceptosServicios.php");
require_once ("../Modelo/modeloConceptosServicios.php");

$c_ConceptoServicio =  ControladorConceptosServicios::ctrlConceptosServicios();

//var_dump($icono);


?>
<div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
              <fieldset>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../vista/cat_sat.php">Catálogos S.A.T</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Conceptos y Servicios</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                      <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogo S.A.T.</strong> - <strong>Conceptos y Servicios</strong></h1></legend>
                        <br>
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($c_ConceptoServicio as $key => $value){
                                    echo "<tr>";
                                        echo "<td>".$value['clave']."</td>";
                                        echo "<td>".$value['desc_SAT']."-".$value['desc_MORTON']."</td>";
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
