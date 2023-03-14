
<?php
//FALTA MOD, ADD, DEL
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";

//require_once ("../Controlador/controladorCuentaContable.php");
//require_once ("../Modelo/modeloCuentaContable.php");

require_once ("../Controlador/controladorEmail.php");
require_once ("../Modelo/modeloEmail.php");


//$son = ModeloReceptorPago::mdl_AllReceptores();
//echo $son;

//echo "entra";
$c_CuentaContable =  ControladorEmail::ctrlAll_Email();
//echo "llega";

$boton = $_POST['btnMOD'];
//echo "insertar".$boton;
if ($boton == 'MOD'){
    //echo "vista ".$_POST['clave'];
    $respuesta = ControladorEmail::ctrlUpdate_Email($_POST['clave'], $_POST['nombre'], $_POST['correo']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se modifico con éxito')
        </script>
        <?php
            header("refresh:1; url=AdminEmails.php");
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
   $c_CuentaContable =  ControladorEmail::ctrlAll_Email();
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
    if (($_POST['nombre'] != '') && ($_POST['correo'] != '') ) {
        //echo "llega";
        //echo "ENVIAR A CONTROLADOR..";
        $respuesta = ControladorEmail::ctrlAdd_Email($_POST['nombre'], $_POST['correo'], $_POST['rol']);
        //echo "agrega".$respuesta;

        if($respuesta == 1){
        ?>
            <script>
                Swal.fire('El registro se ingreso con éxito')
            </script>
            <?php
                //header("refresh:1; url=cat-morton_receptores.php");

                $c_CuentaContable =  ControladorEmail::ctrlAll_Email();

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

   ControladorEmail::ctrlUpdateEmailStatus($clave, $estatus);
   $c_CuentaContable =  ControladorEmail::ctrlAll_Email();
}
?>
<div class="container">
  <div class="col-md-12">
    <div class="well well-sm">
      <!--<form class="form-horizontal" method="post">-->
        <fieldset>
          <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Administrador</strong> - <strong>Envio Email</strong></h1></legend>
          <br>
          <div class="box">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Correos</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Usuarios</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">HOME
                <div class="box-body">
                  <table id="table" class="table table-bordered tabla-fac">
                    <thead>
                      <tr>
                        <th>Actualizar</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Status</th>
                        <th>Rol</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($c_CuentaContable as $key => $value){
                        echo "<form action='' method='POST'>";
                          echo "<tr>";
                            echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                            echo "<input type='hidden' id='clave' name='clave' value='".$value['id_email']."' >";
                            echo "<td><input type='text' id='nombre' name='nombre' value='".$value['Nombre']."' size='40'></td>";
                            echo "<td><input type='text' id='correo' name='correo' value='".$value['email']."' size='40'></td>";
                            echo "<td>";
                              if ($value['estatus'] == "ACTIVO"){
                                echo " <button type='submit' id='status' name='status' value='I-".$value['id_email']."' class='btn btn-success'>ON</button>";
                              }
                              if($value['estatus'] == "INACTIVO"){
                                echo " <button type='submit' id='status' name='status' value='A-".$value['id_email']."' class='btn btn-danger'>OFF</button>";
                              }
                            echo "</td>";
                            echo "<td>";
                              if ($value['rol'] == "PRI"){
                                echo " <button type='submit' id='rol' name='rol' value='I-".$value['id_email']."' class='btn btn-success'>Con Copia</button>";
                              }
                              if($value['rol'] == "CC"){
                                echo " <button type='submit' id='rol' name='rol' value='A-".$value['id_email']."' class='btn btn-danger'>Principal</button>";
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
                <BR><BR>
                <div class="box-header" style="text-align:center">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AgregaReceptores">Nuevo</button>
                </div>
                <br>
                <br>

              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">PROFILE*</div>
            </div>
          </div>

        </fieldset>
                <!--</form>-->
    </div>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------->
<!----------------------------AQUÌ COMIENZA EL MODAL------------------------------------------------>
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade"  id="AgregaReceptores" >

  <div class="modal-dialog" style="z-index: 10000;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="box-body">
          <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Registro</strong></h3></legend>

          <form action="" method="post" class="col-lg-12">
            <div class="form-group">
              <div class="mx-auto" style="width: 200px;">.</div>
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre"  required="">
              <label>Correo:</label>
              <input type="text" class="form-control" id="correo" name="correo"  required="" minlength="6" maxlength="30"><br>
              <label>Rol:</label><br>
              <select name="rol" id="rol">
                <option value="PRI">Principal</option>
                <option value="CC">Con Copia</option>
              </select>
            </div>
            <br><br>
<!--            <div class="modal-footer" style="border-top: none">   -->
                <div class="col-md-6 text-center">
                  <button type="submit" class="btn btn-success btn-lg agregar" id="btnINS" name="btnINS" value="INS">Agregar</button>
                </div>
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-danger btn-lg eliminar" data-dismiss="modal">Cancelar</button>
                </div>
<!--            </div>  -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
