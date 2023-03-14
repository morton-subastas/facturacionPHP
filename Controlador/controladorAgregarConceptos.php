<?php
require_once ("../Modelo/modeloAgregarConceptos.php");


class ControladorAgregarConceptos{

    public static function setConcepto($can, $val, $con, $uni, $des, $fol, $aplica_20_porcent, $cambia, $martillo, $lote, $iva_colocar){
        /*
        $cantidad = $_POST['cantidad'];
        $valor = $_POST['valor'];
        $concepto = $_POST['concepto'];
        $unidad = $_POST['unidad'];
        $descripcion = $_POST['descripcion'];
        $folio = $_POST['folioC'];
        */
        /*
        echo "<br>Cantidad".$can;
        echo "<br>Valor".$val;
        echo "<br>Concepto".$con;
        echo "<br>Unidad".$uni;
        echo "<br>Descripcion".$des;
        echo "<br>Folio".$fol;
        //echo "<br>controlador";
        */
        $respuesta = ModeloAgregarConceptos::c_AgregarConceptos_N($des, $con, $uni, $can, $val, $fol, $aplica_20_porcent, $cambia, $martillo, $lote, $iva_colocar);

        //echo $respuesta;
		//REGRESAR RESPUESTAç
        //var_dump($cantidad);
        return $respuesta;

    }

    public static function AllConceptos($fol){
        //echo "<br>entra Controlador";
        $respuesta = ModeloAgregarConceptos::mdl_AllConceptos($fol);
        //echo "<br>regresa modelo".$respuesta;
        return $respuesta;
    }

    public static function DeleteConcepto($id){
        //echo "<br>Controlador";
        $respuesta = ModeloAddDatos::mdlDeleteConcpeto($id);

        return $respuesta;

    }
}


?>
