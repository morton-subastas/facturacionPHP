<?php

//require_once("conexion.php");
require_once "conexion.php";

Class modeloRutaTimbres{

	public static function mdl_AllRutas(){
			//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM `morton_rutatimbrado` where `status` in  ('A', 'I')";
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

	public static function mdl_UpdateStatus($clave, $status_new){
        $sql = "UPDATE `morton_rutatimbrado` SET `status`='".$status_new."' WHERE `rutatimbre_clave`=".$clave."";
        //echo "<br>".$sql."<br>";
        $stmt = Conexion::conectar()->prepare($sql);
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

        //EJECUTAMOS LA SENTENCIA
		    $stmt -> execute();
        //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		    return 1;
        //CERRAMOS LA CONEXION
		    $stmt -> close();

        //ANULAMOS EL OBJETO
        $stmt = null;
  }

	public static function mdl_DeleteRow($clave){
				$sql = "UPDATE `morton_rutatimbrado` SET `status`='NO' WHERE `rutatimbre_clave`=".$clave."";
				//echo "<br>".$sql."<br>";
				$stmt = Conexion::conectar()->prepare($sql);
				//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

				//EJECUTAMOS LA SENTENCIA
				$stmt -> execute();
				//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
				return 1;
				//CERRAMOS LA CONEXION
				$stmt -> close();

				//ANULAMOS EL OBJETO
				$stmt = null;
	}
}


?>
