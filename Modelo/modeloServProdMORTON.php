<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloConceptoServicios{

	public static function c_ConceptoServicio(){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT * FROM servicios_morton";
            //echo "asi".$sql;
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