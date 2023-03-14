<?php

//require_once "../../Modelo/RFC/modeloRecibos.php";

class ControladorRFC_recibos{
    //select * from morton_receptores - select * from cfdi_clientes


    public static function ctr_SearchRecibo($folio){
        //echo "entra controlador<br>";
        echo "controlador ".$folio."<br";
        //$respuesta = ModeloRecibo::mdl_searchRecibos($folio);
        $respuesta = ModeloRecibo::nada();
        $respuesta = 8;
        echo "<br>regresa a controlador";
        //var_dump($respuesta);
        //REGRESAR RESPUESTA

		return $respuesta;
    }



}


?>
