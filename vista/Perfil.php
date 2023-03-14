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

    $c_Usuarios =  controladorUsuarios::ctrl_SpecificUser($email = $_SESSION['email']);
    //error_reporting(0);

    if($_POST['eliminar'] != ''){
      $c_DeleteUser = controladorUsuarios::ctrl_DeleteUsuario($_POST['id']);
      ?>
      <script>
          Swal.fire('Usuario dado de baja, será redireccionado');
          setTimeout(function(){window.location='close.php';}, 1800);

      </script>
      <?php
      //include "close.php";
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
            Swal.fire('Registro modificado, ingrese nuevamente');
            setTimeout(function(){window.location='close.php';}, 1800);
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
                  <legend class="text-center header"><h1><strong style="color:#004D43 !important">Perfil</strong> <strong>Usuarios</strong></h1></legend>
                  <br>
                <form action="#" method="post" class="col-lg-12">
                    <div class="col-md-12">
                        <div class="box-body">
                            <table id="table" class="table table-bordered tabla-fac">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Fecha Alta</th>
                                        <th>Nombre</th>
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
                                                echo "<td>".$value['usu_nombre']."</td>";
                                                echo '<td> <button type="submit" id="eliminar" name="eliminar" value="1" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
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

    <?php
    }else{
        include "header.php";
        include "error404.php";
    }
?>
