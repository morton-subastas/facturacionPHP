<?php
 require_once ("../Modelo/modeloAgregarDatos.php");

 $folio = $_POST['folio'];

 $respuesta = ModeloAddDatos::mdl_deleteConceptos($folio);
        
 var_dump("Registros borrados") ;
 ?>