<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloEmisorPago{

	public static function c_EmisorPago(){
		//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM `morton_emisores` WHERE `status` in ('ACTIVO', 'INACTIVO')";
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

	public static function m_SearchEmisor($emisor){
			try{
					$sql = "SELECT * FROM ma_empresas WHERE empid = $emisor";
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
			}catch(PDOException $e){
			}
  	}

	public static function mdl_AddEmisor($clave, $desc){
			try {
					$sql = "INSERT INTO `morton_emisores` (`emisor_clave`, `emisor_descripcion`,`emisor_rfc`, `emisor_direccion`, `emisor_contacto`,`status`)
					VALUES ('".$clave."', '".$desc."','','','', 'ACTIVO');";
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
				}catch(PDOException $e){
					return 0;
				}
	}

	public static function mdl_DeleteEmisor($clave){
			try {
				$sql = "DELETE FROM `morton_emisores` WHERE `emisor_clave` = '".$clave."'";

					//echo "asi".$sql;
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
				}catch(PDOException $e){
					return 0;
				}
	}

	public static function mdl_UpdateEmisor($clave, $desc){
				try {
						$sql = "UPDATE `morton_emisores` SET `emisor_descripcion`='".$desc."'
								WHERE `emisor_clave`='".$clave."'";

						//echo "asi".$sql;

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
					}catch(PDOException $e){
						return 0;
					}
	}

	public static function mdl_UpdateEmisorStatus($clave, $status){
				try {
						if ($status == 'I'){
							$des_status = 'INACTIVO';
						}
						if ($status == 'A'){
							$des_status = 'ACTIVO';
						}
						if ($status == 'E'){
							$des_status = 'ELIMINADO';
						}
						$sql = "UPDATE `morton_emisores` SET `status`='".$des_status."'
								WHERE `emisor_clave`='".$clave."'";

						//echo "asi".$sql;

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
					}catch(PDOException $e){
						return 0;
					}
	}
}


?>
