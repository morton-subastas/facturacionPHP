<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
require_once ("../Controlador/controladorLugarExpedicion.php");
require_once ("../Modelo/modeloLugarExpedicion.php");


$c_LugarExpedicion =  controladorLugarExpedicion::ctrlLugarExpedicion();

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
                    <li class="breadcrumb-item active" aria-current="page">Lugar Expedición (C.P.)</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogo S.A.T.</strong> - <strong>Lugar Expedición (C.P.)</strong></h1></legend>
                        <br>
                        <div class="box">
                            <div class="box-header" style="text-align:center">
                                <button type="button" class="btn btn-success btn-lg agregar" data-toggle="modal" data-target="#AgregaLugarExpedicion">Nuevo</button>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="box-body">
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac">
                            <thead>
                                <tr>
                                    <th>Actualizar</th>
                                    <th>C.P.</th>
                                    <th>Estado</th>
                                    <th>Status</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($c_LugarExpedicion as $key => $value){
                                    echo "<tr>";
                                        echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                                        echo "<td><input type=text value='".$value['lugarexpedicion_cp']."'></td>";
                                        echo "<td><input type=text value='".$value['lugarexpedicion_estado']."'></td>";
                                        echo "<td>";
                                        if ($value['status'] == "ACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='I-".$clave."' class='btn btn-success'>ON</button>";
                                          }if($value['status'] == "INACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='A-".$clave."' class='btn btn-danger'>OFF</button>";
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
<!-------------------------------------------------------------------------------------------------->
<!----------------------------AQUÌ COMIENZA EL MODAL------------------------------------------------>
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade"  id="AgregaLugarExpedicion" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
              <div class="box-body">
                <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Lugar de Expedición</strong></h3></legend>
                <form action="" method="post" class="col-lg-12">
                        <div class="form-group">
                                <label>Código Postal</label>
                                <input type="text" class="form-control" id="cp" name="cp" minlength="6" maxlength="6" required="">
                                <br>
                                <br>
                                <label>Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado"  required="" minlength="6" maxlength="50">
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none">
                      <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-success btn-lg agregar" id="btnINS" name="btnINS" value="INS">Agregar</button>
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
