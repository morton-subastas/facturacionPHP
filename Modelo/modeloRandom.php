<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloRandom {

	public static function mdl_searchCDDI($aa, $bb, $cc){
		//$usuario = pepe" . " OR = 1 ;
      //echo "<br>modelo";
			$sql = "SELECT * FROM `cfdi` where `empid`=$aa and `cfdiserid`=$bb and `cfdiid`=$cc";
      //echo "<br>asi".$sql;
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

	public static function mdl_searchConceptos($aa, $bb, $cc){
			$sql = "SELECT * FROM `cfdi_detalle` d,`cfdi_productos` p where p.cfdiproid=d.cfdiproid and d.`empid`=$aa and d.`cfdiserid`=$bb and d.`cfdiid`=$cc";
			//echo "<br>asi".$sql;
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
