<?php
include "../head.php";
include "../aside.php";
?>

<div class="right_col" role="main"><!-- page content -->
<div class="">
    <div class="page-title">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
require_once ("../../Controlador/controladorMetodoPago.php");
require_once ("../../Modelo/modeloMetodoPago.php");


$c_MetodoPago =  ControladorMetodoPago::ctrlEstiloPlantilla();

//var_dump($icono);

foreach ($c_MetodoPago as $key => $value){
    echo "".$value['metodopago_descripcion']."<br>";
}
?>