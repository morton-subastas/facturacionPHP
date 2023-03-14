<?php

class ControladorAgregarDatos{
    //select * from morton_receptores - select * from cfdi_clientes


    public static function getCountCFDI(){
        $respuesta = ModeloAddDatos::mdl_countCFDI();
        
        //REGRESAR RESPUESTA
		  return $respuesta;
    }

    public static function ctr_SearchDatos($folio){
        //echo "entra controlador<br>";
        $respuesta = ModeloAddDatos::mdl_searchCFDI($folio);
        //var_dump($respuesta);
        //REGRESAR RESPUESTA

		return $respuesta;
    }

    public static function getSearchRecibo($recibo){
        $respuesta = ModeloAddDatos::mdl_searchRecibo($recibo);
        //var_dump($respuesta);
        //REGRESAR RESPUESTA

		return $respuesta;
    }

    public static function EndRegister(){
        $respuesta = ModeloAddDatos::mdl_AllCFDI();
        //REGRESAR RESPUESTA
        //echo $respuesta1;

		return $respuesta;

    }



}


?>