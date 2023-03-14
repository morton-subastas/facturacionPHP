<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";
require_once ("../Controlador/controladorRutaTimbres.php");
require_once ("../Modelo/modeloRutaTimbres.php");

//echo "entra";
$c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();
//echo "llega<br>";
//var_dump($c_RutaTimbres);

$statute  = $_POST['status'];
if($statute != ''){
  $valor = explode("-",$statute);
  $estatus = $valor[0];
  $clave = $valor[1];
  //echo "clave".$clave."-<br>status".$estatus;
  $respuesta_status = controladorRutaTimbres::ctrl_UpdateStatus($clave, $estatus);
  //echo "valor".$respuesta_status;

  $c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();

}
//var_dump($icono);
$boton = $_POST['btnELI'];
//echo "insertar".$boton;
if ($boton == 'ELI'){
    //echo "El id".$_POST['clave_ruta'];
    $respuesta = controladorRutaTimbres::ctrlDeleteRuta($_POST['clave_ruta']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se elimino con èxito')
        </script>
        <?php
        $c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();

    }else{
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Contactar al area de Desarrollo'
            })
    </script>
    <?php
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
                    <li class="breadcrumb-item active" aria-current="page">PAC</li>
                  </ol>
                </nav>
              </fieldset>
              <fieldset>
                <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>RUTA DE ARCHIVOS TIMBRADOS</strong></h1></legend>
                <br>
                <form class="form-horizontal" method="post">
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered tabla-fac">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($c_RutaTimbres as $key => $value){
                                    echo "<form action='cat-morton_receptores.php' method='POST'>";
                                    echo "<tr>";
                                        echo "<td><input type='text' id='clave_ruta' name='clave_ruta' value='".$value['rutatimbre_clave']."' readonly class='bloqueado inp-bloq'></td>";
                                        echo "<td><input type='text' id='descripcion' name='descripcion' value='".$value['rutatimbre_desc']."' size='60'></td>";
                                        echo "<td>";
                                        $clave = $value['rutatimbre_clave'];
                                        if ($value['status'] == "A"){
                                            echo " <button type='submit' id='status' name='status' value='I-".$clave."' class='btn btn-success'>ON</button>";
                                          }if($value['status'] == "I"){
                                            echo " <button type='submit' id='status' name='status' value='A-".$clave."' class='btn btn-danger'>OFF</button>";
                                          }
                                        echo "</td>";
                                        echo '<td> <button type="submit" class="btn btn-danger" id="btnELI" name="btnELI" value="ELI"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
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
