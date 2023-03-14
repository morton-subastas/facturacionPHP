<?php
session_start();
$fac = $_SESSION['email'];

include "head.php";
include "aside.php";

require_once ("../Controlador/controladorPAC.php");
require_once ("../Modelo/modeloPAC.php");

//echo "entra";
$c_ReceptoresPago =  ControladorPAC::ctrl_AllPAC();
//echo "llega";

$boton = $_POST['btnMOD'];
//echo "insertar".$boton;
if ($boton == 'MOD'){
    //echo "nombre ".$_POST['nombre'];
      $nombre = $_POST['nombre'];
    //echo "<br>descripcion ".$_POST['descripcion'];
      $descripcion = $_POST['descripcion'];
    //echo "<br>url ".$_POST['url'];
      $url = $_POST['url'];
    //echo "<br>usu ".$_POST['usu'];
      $usu = $_POST['usu'];
    $respuesta = ControladorPAC::ctrlUpdatePAC($nombre, $descripcion, $url, $usu);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se modifico con éxito')
        </script>
        <?php
            header("refresh:1; url=cat-morton_pac.php");
            $c_ReceptoresPago =  ControladorPAC::ctrl_AllPAC();

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

//var_dump($icono);
$boton = $_POST['btnELI'];
//echo "insertar".$boton;
if ($boton == 'ELI'){
    ///echo "El id".$_POST['id'];
    //$respuesta = ControladorReceptoresPago::ctrlDeleteReceptorPago($_POST['clave']);
    //echo "agrega".$respuesta;

    if($respuesta == 1){
        ?>
        <script>
            Swal.fire('El registro se ingreso con èxito')
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
}

$boton = $_POST['btnINS'];
//echo "insertar".$boton;

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
                <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>PAC</strong></h1></legend>
                <br>
                <form class="form-horizontal" method="post">
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered tabla-fac">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($c_ReceptoresPago as $key => $value){
                                    echo "<form action='cat-morton_receptores.php' method='POST'>";
                                    echo "<tr>";
                                        echo '<td> <button type="submit" class="btn btn-warning" id="btnMOD" name="btnMOD" value="MOD"> <span class="	glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>';
                                        echo "<td><input type='text' id='nombre' name='nombre' value='".$value['pacnomcor']."' ></td>";
                                        echo "<td><input type='text' id='descripcion' name='descripcion' value='".$value['pacnom']."' size='60'></td>";
                                        echo "<td><input type='text' id='url' name='url' value='".$value['pacurl']."' size='30'></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <thead>
                              <th></th>
                              <th>Usuario</th>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($c_ReceptoresPago as $key => $value){
                                    echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td><input type='text' id='usu' name='usu' value='".$value['pacusu']."' size='30'></td>";
                                        echo '<td> <button type="submit" class="btn btn-danger" id="btnELI" name="btnELI" value="ELI"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                        echo "<td></td>";
                                        echo "<td></td>";
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
