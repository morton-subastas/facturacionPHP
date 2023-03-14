<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloHistorial{

	public static function mdl_AllCFDI(){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT *
                        FROM `cfdi` c, `cfdi_clientes` i WHERE c.cfdicliid = i.cfdicliid";
            //echo "asi<br>".$sql;
            $stmt = Conexion::conectar()->prepare($sql);
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");


            //EJECUTAMOS LA SENTENCIA
		    $stmt -> execute();
            //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		    return $stmt -> fetchAll();
            //CERRAMOS LA CONEXION
		    $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;

	}

	public static function mdl_SpecificCFDI($folio){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT *
                        FROM `cfdi` c, `cfdi_clientes` i WHERE c.cfdicliid = i.cfdicliid and c.cfdiid = ".$folio."";
            //echo "asi<br>".$sql;
            $stmt = Conexion::conectar()->prepare($sql);
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");


            //EJECUTAMOS LA SENTENCIA
		    $stmt -> execute();
            //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		    return $stmt -> fetchAll();
            //CERRAMOS LA CONEXION
		    $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;

	}
}


?>
