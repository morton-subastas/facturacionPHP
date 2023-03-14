<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
?>
<?php
require_once ("../Controlador/controladorEmisoresPago.php");
require_once ("../Modelo/modeloEmisorPago.php");


$c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

//var_dump($icono);
$boton = $_POST['btnINS'];
//echo "insertar".$boton;
if ($boton == 'INS'){
    if (($_POST['clave'] != '') && ($_POST['descripcion'] != '') ) {
        $respuesta = ControladorEmisoresPago::ctrlAddEmisor($_POST['clave'], $_POST['descripcion']);
        //echo "agrega".$respuesta;
        if($respuesta == 1){
            ?>
            <script>
                Swal.fire('El registro se ingreso con èxito')
            </script>
            <?php
            header("refresh:1; url=cat-morton_emisores.php");
            $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

        }else{
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contactar al area de DESARROLLO'
                })
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
            })
        </script>
        <?php
    }
}

//var_dump($icono);
/*
$boton = $_POST['btnELI'];

if ($boton == 'ELI'){
    if (($_POST['clave'] != '') && ($_POST['descripcion'] != '') ) {
        //header( "refresh:1; url=CAT-SAT_Unidades.php" );
        //echo "usu".$_POST['usuario'];
        //echo "recibe";
        //controladorUsuarios::ctrlUsuarios($_POST['usuario'], $_POST['password']);
        $respuesta = ControladorEmisoresPago::ctrlDeleteEmisor($_POST['clave']);
        //echo "agrega".$respuesta;

        if($respuesta == 1){
            ?>
            <script>
                Swal.fire('El registro se elimino con èxito')
            </script>
            <?php
            header("refresh:1; url=cat-morton_emisores.php");
            $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

        }else{
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contactar al area de DESARROLLO'
                })
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
            })
        </script>
        <?php
        }


}
*/
$boton = $_POST['btnMOD'];

if ($boton == 'MOD'){

   if (($_POST['clave'] != '') && ($_POST['descripcion'] != '') ) {
        $respuesta = ControladorEmisoresPago::ctrlUpdateEmisor($_POST['clave'], $_POST['descripcion']);
        if($respuesta == 1){
            ?>
            <script>
                Swal.fire('El registro se modifico con éxito')
            </script>
            <?php
            header("refresh:1; url=cat-morton_emisores.php");
            $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

        }else{
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contactar al area de DESARROLLO'
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
        })
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

   ControladorEmisoresPago::ctrlUpdateEmisorStatus($clave, $estatus);
   $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

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
                        <li class="breadcrumb-item active" aria-current="page">Emisores</li>
                      </ol>
                    </nav>
                  </fieldset>
                    <fieldset>
                        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>Emisores</strong></h1></legend>
                        <br>
                        <div class="box">
                            <div class="box-header" style="text-align:center">
                                <button type="button" class="btn btn-success btn-lg agregar" data-toggle="modal" data-target="#AgregaConceptos">Nuevo</button>
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
                                    <th>Razón Social</th>
                                    <th>Status</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form  class="col-lg-12"  action="" method="post" >
                                <?php

                                foreach ($c_EmisorPago as $key => $value){
                                    echo "<form class='form-horizontal' method='POST'>";
                                    echo "<tr>";
                                        echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                                        echo "<td><input type='text' id='clave' name='clave' value='".$value['emisor_clave']."' readonly class='bloqueado inp-bloq'></td>";
                                        echo "<td><input type='text' id='descripcion' name='descripcion' value='".$value['emisor_descripcion']."' size=90></td>";
                                        echo "<td>";
                                          if ($value['status'] == "ACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='I-".$value['emisor_clave']."' class='btn btn-success'>ON</button>";
                                          }
                                          if($value['status'] == "INACTIVO"){
                                            echo " <button type='submit' id='status' name='status' value='A-".$value['emisor_clave']."' class='btn btn-danger'>OFF</button>";
                                          }
                                        echo "</td>";
                                        echo '<td> <button type="submit" class="btn btn-danger" id="status" name="status" value="E-'.$value['emisor_clave'].'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                    echo "</tr>";
                                    echo "</form>";
                                }
                                ?>
                                </form>
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
<div class="modal fade"  id="AgregaConceptos" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
              <div class="box-body">
                <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Registro</strong></h3></legend>
                <form action="" method="post" class="col-lg-12">
                        <div class="form-group">
                                <label>Clave</label>
                                <input type="text" class="form-control" id="clave" name="clave"  required="">
                                <br>
                                <br>
                                <label>Razón Social</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"  required="" minlength="6" maxlength="50">
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
