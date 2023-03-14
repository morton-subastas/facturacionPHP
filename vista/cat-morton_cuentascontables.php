
<?php
//FALTA MOD, ADD, DEL
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";

require_once ("../Controlador/controladorCuentaContable.php");
require_once ("../Modelo/modeloCuentaContable.php");

//$son = ModeloReceptorPago::mdl_AllReceptores();
//echo $son;

//echo "entra";
$c_CuentaContable =  ControladorCuentaContable::ctrlAll_CC();
//echo "llega";

$boton = $_POST['btnMOD'];
//echo "insertar".$boton;
if ($boton == 'MOD'){
    //echo "vista ".$_POST['clave'];
    $respuesta = ControladorCuentaContable::ctrlUpdateReceptorPago($_POST['clave'], $_POST['descripcion'], $_POST['email'], $_POST['direccion']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se modifico con éxito')
        </script>
        <?php
            header("refresh:1; url=cat-morton_receptores.php");
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
   $c_ReceptoresPago =  ControladorCuentaContable::ctrlReceptorPago();

}

//var_dump($icono);
$boton = $_POST['btnELI'];
//echo "insertar".$boton;
if ($boton == 'ELI'){
    ///echo "El id".$_POST['id'];
    $respuesta = ControladorCuentaContable::ctrlDeleteReceptorPago($_POST['clave']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se elimino con éxito')
        </script>
        <?php
            header("refresh:1; url=cat-morton_receptores.php");
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
   $c_ReceptoresPago =  ControladorCuentaContable::ctrlReceptorPago();

}

$boton = $_POST['btnINS'];
//echo "insertar".$boton;
if ($boton == 'INS'){
    if (($_POST['clave'] != '') && ($_POST['descripcion'] != '') ) {
        //echo "llega";
        //echo "ENVIAR A CONTROLADOR..";
        $respuesta = ControladorCuentaContable::ctrladdReceptorPago($_POST['clave'], $_POST['descripcion'], $_POST['direccion']);
        //echo "agrega".$respuesta;

        if($respuesta == 1){
        ?>
            <script>
                Swal.fire('El registro se ingreso con éxito')
            </script>
            <?php
                //header("refresh:1; url=cat-morton_receptores.php");

                $c_ReceptoresPago =  ControladorCuentaContable::ctrlReceptorPago();

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

   ControladorCuentaContable::ctrlUpdateComisionesStatus($clave, $estatus);
   $c_ReceptoresPago =  ControladorCuentaContable::ctrlReceptorPago();


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
                    <li class="breadcrumb-item active" aria-current="page">Cuenta Contables</li>
                  </ol>
                </nav>
              </fieldset>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>Cuentas Contables</strong></h1></legend>
                        <br>
                        <div class="box">
                            <div class="box-header" style="text-align:center">
                                <button type="button" class="btn btn-success btn-lg agregar" data-toggle="modal" data-target="#AgregaReceptores">Nuevo</button>
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
                                    <th>Llega</th>
                                    <th>Agrupa</th>
                                    <th>Status</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($c_CuentaContable as $key => $value){
                                    echo "<form action='' method='POST'>";
                                    echo "<tr>";
                                        echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                                        echo "<input type='hidden' id='clave' name='clave' value='".$value['cuenta_clabe']."' >";
                                        echo "<td><input type='text' id='cuenta_clabe' name='clave' value='".$value['cuenta_clabe']."'></td>";
                                        echo "<td><input type='text' id='descripcion' name='descripcion' value='".$value['descripcion']."' size='40'></td>";
                                        echo "<td><input type='text' id='llega' name='llega' value='".$value['llega']."' size='15'></td>";
                                        echo "<td><input type='text' name='direccion' id='direccion' value='".$value['agrupa']."' size='15'> </td>";
                                        echo "<td>";
                                          if ($value['sta'] == "ACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='I-".$value['cfdicliid']."' class='btn btn-success'>ON</button>";
                                          }
                                          if($value['sta'] == "INACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='A-".$value['cfdicliid']."' class='btn btn-danger'>OFF</button>";
                                          }
                                        echo "</td>";
                                        echo '<td> <button type="submit" class="btn btn-danger" id="status" name="status" value="E-'.$value['cfdicliid'].'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
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
<div class="modal fade"  id="AgregaReceptores" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <div class="box-body">
              <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Registro</strong></h3></legend>
                <form action="" method="post" class="col-lg-12">
                        <div class="form-group">
                            <div class="mx-auto" style="width: 200px;">.</div>
                                <label>Clave:</label>
                                <input type="text" class="form-control" id="clave" name="clave"  required="">
                                <label>Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"  required="" minlength="6" maxlength="30">

                                <label>Lllega:</label><br>
                                <select name="llega" id="llega">
                                    <option value="Adminsitracion">Administracion</option>
                                    <option value="Ventas">Ventas</option>
                                </select>
                                <br><label>-Agrupa:</label><br>
                                <select name="agrupa" id="agrupa">
                                    <option value="Departamento">Departamento</option>
                                    <option value="Empleado">Empleado</option>
                                    <option value="Global">Glogal</option>
                                </select>
                                <!--

                                <label>Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto"   minlength="6" maxlength="10">
                                <label>Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefno"   minlength="6" maxlength="10">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email"   minlength="6" maxlength="20" size='20'>
                                  <br><br>
                                -->
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
