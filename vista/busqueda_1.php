<?php
require_once ("../Controlador/controladorAgregarDatos.php");
require_once ("../Modelo/modeloAgregarDatos.php");
require_once ("../Controlador/controladorProductosIngresados.php");
require_once ("../Modelo/modeloProductosIngresados.php");

$c_CFDI =  ControladorAgregarDatos::getCountCFDI();

//BORRAR LOS REGISTROS PREVIOS
controladorProductosIngresados::ctrlProductosEliminados($c_CFDI);

echo "llegasSTE";
header('Location: busqueda');

?>
