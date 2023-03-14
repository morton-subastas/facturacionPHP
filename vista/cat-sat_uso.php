<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
require_once ("../Controlador/controladorUso.php");
require_once ("../Modelo/modeloUso.php");


$c_Uso =  controladorUso::ctrlUso();

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
                    <li class="breadcrumb-item active" aria-current="page">Uso</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                      <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogo S.A.T.</strong> - <strong>Uso</strong></h1></legend>
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
                                foreach ($c_Uso as $key => $value){
                                    echo "<tr>";
                                        echo "<td>".$value['uso_clave']."</td>";
                                        echo "<td>".$value['uso_descripcion']."</td>";
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
