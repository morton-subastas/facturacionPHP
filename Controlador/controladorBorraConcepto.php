<?php
 require_once ("../Modelo/modeloAgregarDatos.php");

$id=$_POST['di'];

$respuesta = ModeloAddDatos::mdlDeleteConcpeto($id);


//var_dump($respuesta);
return $respuesta;

 ?>
