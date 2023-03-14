<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";

require_once ("../Controlador/controladorComisiones.php");
require_once ("../Modelo/modeloComisione.php");


//$son = ModeloReceptorPago::mdl_AllReceptores();
//echo $son;

//echo "entra";
$res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();
//echo "llega";

$boton = $_POST['btnMOD'];
//echo "insertar".$boton;
if ($boton == 'MOD'){
    //echo "vista ".$_POST['clave'];
    $respuesta = ControladorComisiones::ctrlUpdateComisiones($_POST['clave'], $_POST['descripcion'], $_POST['porcentaje']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se modifico con éxito');
        </script>
        <?php
        //echo "llega";
            //header("refresh:1; url=cat-morton_comisiones.php");
            $res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();

    }else{
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Contactar al area de SISTEMAS'
            })
    </script>
    <?php
   }
   header("refresh:1; url=cat-morton_comisiones.php");
   $res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();

}

//var_dump($icono);
$boton = $_POST['btnELI'];
//echo "insertar".$boton;
if ($boton == 'ELI'){
    ///echo "El id".$_POST['id'];
    $respuesta = ControladorComisiones::ctrlDeleteComisiones($_POST['clave']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se elimino con èxito')
        </script>
        <?php
            header("refresh:1; url=cat-morton_comisiones.php");
    }else{
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Contactar al area de SISTEMAS'
            })
    </script>
    <?php
   }
   $res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();

}

$boton = $_POST['btnINS'];
//echo "insertar".$boton;
if ($boton == 'INS'){
    if ( ($_POST['descripcion'] != '') ) {
        //echo "llega";
        //echo "ENVIAR A CONTROLADOR..";
        $respuesta = ControladorComisiones::ctrlAddComisiones( $_POST['descripcion'], $_POST['porcentaje']);
        //echo "agrega".$respuesta;

        if($respuesta == 1){
        ?>
            <script>
                Swal.fire('El registro se ingreso con éxito')
            </script>
            <?php
                //header("refresh:1; url=cat-morton_receptores.php");

                //$c_ReceptoresPago =  ControladorReceptoresPago::ctrlReceptorPago();
                $res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();

        }else{
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contactar al area de SISTEMAS'
                });
            </script>
        <?php
        }
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡La clave y/o descripción no pueden ser nulas!'
            });
        </script>
        <?php
    }

}

$b_status = $_POST['status'];
//echo "insertar".$boton;
if ($b_status <> ''){
  //echo "boton VISTA: <br>".$b_status."<br>";
  $valor = explode("-",$b_status);
  $estatus = $valor[0];
  $clave = $valor[1];

   ControladorComisiones::ctrlUpdateComisionesStatus($clave, $estatus);
   $res_Comisiones =  ControladorComisiones::ctrlSearchAllComisiones();

}

?>
<div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
              <fieldset>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../vista/cat-morton.php">Catálogos Morton</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Comisiones</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>Comisiones</strong></h1></legend>
                        <br>
                        <div class="box">
                            <div class="box-header" style="text-align:center">
                                <button type="button" class="btn btn-success btn-lg agregar" data-toggle="modal" data-target="#AgregaComisiones">Nuevo</button>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="box-body">
                        <table id="table" class="table table-bordered tabla-fac">
                            <thead>
                                <tr>
                                    <th>Actualizar</th>
                                    <th>Clave</th>
                                    <th>Descripcion</th>
                                    <th>Porcentaje</th>
                                    <th>Estatus</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($res_Comisiones as $key => $value){
                                    echo "<form action='' method='POST'>";
                                    echo "<tr>";
                                        echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                                        echo "<td><input type='text' id='clave' name='clave' value='".$value['id_comision']."' class='bloqueado inp-bloq' readonly></td>";
                                        echo "<td><input type='text' id='descripcion' name='descripcion' value='".$value['descripcion']."' size='60'></td>";
                                        echo "<td><input type='text' id='porcentaje' name='porcentaje' value='".$value['porcentaje']."' size='30'></td>";
                                        echo "<td>";
                                          if ($value['estatus'] == "ACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='I-".$value['id_comision']."' class='btn btn-success'>ON</button>";
                                          }
                                          if($value['estatus'] == "INACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='A-".$value['id_comision']."' class='btn btn-danger'>OFF</button>";
                                          }
                                        echo "</td>";
                                        echo '<td> <button type="submit" class="btn btn-danger" id="status" name="status" value="E-'.$value['id_comision'].'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                    echo "</tr>";
                                    echo "</form>";
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
<div class="modal fade"  id="AgregaComisiones" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <div class="box-body">
              <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Registro</strong></h3></legend>
                <form action="" method="post" class="col-lg-12">
                        <div class="form-group">
                            <div class="mx-auto" style="width: 200px;">.</div>
                                <label>Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"  required="" minlength="6" maxlength="30" required>
                                <label>Pocentaje</label>
                                <input type="text" class="form-control" id="porcentaje" name="porcentaje"  required="" minlength="1" maxlength="2" required>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none">
                      <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-success btn-lg agregar" id="btnINS" name="btnINS" value="INS">Agregar</button>
                      </div>
                      <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-danger btn-lg eliminar" data-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
