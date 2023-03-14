<?php
error_reporting(0);

if(!isset($_SESSION))
{
  session_start();
}


//$logueado = 1;
//echo "logueado".$logueado;
if((session_id() != '') OR (session_name() != '')){

    include "head.php";
    include "aside.php";

    require_once ("../Controlador/controladorUsuarios.php");
    require_once ("../Modelo/modeloUsuarios.php");

    $c_Usuarios =  controladorUsuarios::ctrlAllUsuarios();
    //error_reporting(0);

    if (($_POST['usuario'] != '') && ($_POST['password'] != '') && ($_POST['nombre'])) {

        $respuesta = controladorUsuarios::ctrlUsuarios($_POST['usuario'], $_POST['password'], $_POST['nombre']);
        //echo "<br>agrega".$respuesta;
        if($respuesta == 1){
            ?>
            <script>
                Swal.fire('El registro se ingreso con èxito')
            </script>
            <?php
                header("refresh:1; url=CAT-MORTON_Usuarios.php");
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
    }


    if($_POST['change'] != ''){
      if ($_POST['contrasena'] == ''){
          ?>
          <script>
          Swal.fire({
                icon: 'error',
                title: 'Debe ingresar una contraseña'
            });
          </script>
      <?php
    }else{
      $c_UpdateUser = controladorUsuarios::ctrl_UpdateUsuario($_POST['id'], $_POST['contrasena']);
      if ($c_UpdateUser == true ){
        ?>
        <script>
            Swal.fire('El registro se modifico con èxito')
        </script>
        <?php
      }
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
                    <li class="breadcrumb-item"><a href="../vista/cat-morton.php">Catálogos Morton</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Catálogo de Usuarios</li>
                  </ol>
                </nav>
              </fieldset>
                <fieldset>
                  <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos de</strong> <strong>Usuarios</strong></h1></legend>
                  <br>
                <form action="#" method="post" class="col-lg-12">
                    <div class="col-md-12">
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
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Fecha Alta</th>
                                        <th>Status</th>
                                        <th>Nombre</th>
                                        <th>Rol</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($c_Usuarios as $key => $value){
                                        echo '<form action="#" method="post" class="col-lg-12">';
                                            echo '<input type="hidden" id="id" name="id" value='.$value['usu_email'].'>';
                                            echo "<tr>";
                                                echo "<td>".$value['usu_email']."</td>";
                                                echo "<td><input type='text' id='contrasena' name='contrasena'><button type='submit' id='change' name='change' value='CHANGE' class='btn btn-secondary'>M</button></td>";
                                                echo "<td>".$value['usu_fec_alta']."</td>";
                                                //echo "<td>".$value['usu_status']."</td>";
                                                echo "<td>";
                                                if ($value['usu_status'] == "ACTIVO"){
                                                    echo " <button type='submit' id='status' name='status' value='I-".$clave."' class='btn btn-success'>ON</button>";
                                                  }if($value['status'] == "INACTIVO"){
                                                    echo " <button type='submit' id='status' name='status' value='A-".$clave."' class='btn btn-danger'>OFF</button>";
                                                  }
                                                echo "</td>";
                                                echo "<td>".$value['usu_nombre']."</td>";
                                                echo "<td>".$value['usu_rol']."</td>";
                                                echo '<td> <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                            echo "</tr>";
                                        echo '</form>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                </fieldset>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <!----------------------------AQUÌ COMIENZA EL MODAL------------------------------------------------>
    <!-------------------------------------------------------------------------------------------------->
    <div class="modal fade"  id="AgregaConceptos" >
        <div class="modal-dialog" style='z-index:11000'>
            <div class="modal-content">
                <div class="modal-body">
                  <div class="box-body">
                    <legend class="text-center header"><h3><strong style="color:#004D43 !important">Nuevo</strong> <strong>Usuario</strong></h3></legend>
                    <form action="" method="post" class="col-lg-12">
                            <div class="form-group">
                                    <label>Usuario :</label>
                                    <input type="email" class="form-control" id="usuario" name="usuario"  required="">
                                    <label>Contraseña :</label>
                                    <input type="text" class="form-control" id="password" name="password"  required="" minlength="6" maxlength="10">
                                    <label>Nombre :</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"  required="" minlength="6" maxlength="50">
                                    <br><br>
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

    <?php
    }else{
        include "header.php";
        include "error404.php";
    }
?>
