<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloFormaPago{

	public static function c_FormaPago(){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT * FROM `c_formapago`  where `status`='ACTIVO'";
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

	public static function c_FormaPago_activos(){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT * FROM `c_formapago`";
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

	public static function mdl_Estatus($clave, $status){
		$sql = "UPDATE `c_formapago` SET `status`='".$status."' WHERE `formapago_clave` = '".$clave."'";
		//echo "asi".$sql;
		$stmt = Conexion::conectar()->prepare($sql);
		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

		//EJECUTAMOS LA SENTENCIA
		$stmt -> execute();
		//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		//return $stmt -> fetchAll();
		//CERRAMOS LA CONEXION
		return 1;
		$stmt -> close();

		//ANULAMOS EL OBJETO
		$stmt = null;
	}
}


?>
