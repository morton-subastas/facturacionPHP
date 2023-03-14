<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloMonedas{

	public static function c_Monedas(){
		//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM c_moneda";
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

	public static function mdl_MonedasActivas(){
		$sql = "SELECT * FROM c_moneda where status='ACTIVO'";
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
		$sql = "UPDATE `c_moneda` SET `status`='".$status."' WHERE `moneda_clave` = '".$clave."'";
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
