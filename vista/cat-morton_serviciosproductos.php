<?php
//error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){

include "head.php";
include "aside.php";

require_once ("../Controlador/controladorServProdMORTON.php");
require_once ("../Modelo/modeloServProdMORTON.php");


$c_ServProdMORTON =  ControladorServProMORTON::ctrlServProdMORTON();

//var_dump($icono);


?>
<div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
              <fieldset>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../vista/cat-morton.php">Catálogos Morton</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Servicios y Productos</li>
                  </ol>
                </nav>
              </fieldset>
                <legend class="text-center header"><h1><strong style="color:#004D43 !important">Catálogos Morton</strong> - <strong>Servicios y Productos</strong></h1></legend>
                <br>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered tabla-fac">
                            <thead>
                                <tr>
                                    <th>Clave S.A.T.</th>
                                    <th>Descripción</th>
                                    <th>Clave Morton</th>
                                    <th>Descripción Morton</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($c_ServProdMORTON as $key => $value){
                                    echo "<tr>";
                                        echo "<td>".$value['clave']."</td>";
                                        echo "<td>".$value['desc_SAT']."</td>";
                                        echo "<td>".$value['clave_MORTON']."</td>";
                                        echo "<td>".$value['desc_MORTON']."</td>";
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

    <?php
    }else{
        include "header.php";
        include "error404.php";
    }
?>
