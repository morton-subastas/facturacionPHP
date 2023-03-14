<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloComisiones{

	public static function mdl_AddComisiones( $descripcion, $porcentaje){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
		try {
			//ECHO "<BR>LLEGA MODELO";
			$sql = "INSERT INTO `morton_comisiones`(`id_comision`, `descripcion`, `porcentaje`,  `estatus`)
				VALUES (0,'".$descripcion."','".$porcentaje."','ACTIVO'); ";
				//echo "<BR>".$sql;
				$stmt = $pdo->prepare($sql);

				//EJECUTAMOS LA SENTENCIA
				$stmt -> execute();
				$pdo->commit();
				//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
				//CERRAMOS LA CONEXION
				//$stmt -> close();
				//ANULAMOS EL OBJETO
				$stmt = null;
				//echo "<BR>REGRESA RESPUESTA DE MODELO";
				return 1;

			}catch(PDOException $e){
				$pdo->rollBack();

				return 0;
			}
	}

	public static function mdl_DeleteComisiones($clave){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
		try {
			$sql = "DELETE FROM  `morton_comisiones`  WHERE `id_comision` = ".$clave."";
				//echo "asi".$sql;
				$stmt = $pdo->prepare($sql);

				//EJECUTAMOS LA SENTENCIA
				$stmt -> execute();
				$pdo->commit();

				//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
				//CERRAMOS LA CONEXION
				$stmt -> close();

				//ANULAMOS EL OBJETO
				$stmt = null;
				return 1;

			}catch(PDOException $e){
				$pdo->rollBack();

				return 0;
			}
	}

	public static function mdl_UpdateComisiones($clave, $descripcion, $porcentaje){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
		try {
			$sql = "UPDATE `morton_comisiones` SET `descripcion`='$descripcion', `porcentaje`='$porcentaje' WHERE `id_comision`= ".$clave."";
				//echo "<br>".$sql;
				//$stmt = Conexion::conectar()->prepare($sql);
				$stmt = $pdo->prepare($sql);
				//$stmt = $pdo->prepare($sql);
				//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

				//EJECUTAMOS LA SENTENCIA
				$stmt -> execute();
				$pdo ->commit();

				//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
				//CERRAMOS LA CONEXION
				//$stmt -> close();

				//ANULAMOS EL OBJETO
				$stmt = null;
				return 1;

			}catch(PDOException $e){
				$pdo->rollBack();
				return 0;
			}
	}

	public static function mdl_SearchAllComisiones(){
			$pdo = Conexion::conectar();
			//echo "pdo".$pdo."<br>";
			$pdo->beginTransaction();
				try {
						//echo "<br><br>entra modelo";
						//echo "<br>------------modelo--------------<br>";
						$sql = "SELECT * FROM `morton_comisiones` WHERE `estatus` IN ('ACTIVO', 'INACTIVO')";
						//echo "<br>asi".$sql;
						$stmt = $pdo->prepare($sql);
						$stmt -> execute();
						$son= $stmt -> fetchAll();

						return $son;
						$pdo->commit();
						$stmt -> close();
						//ANULAMOS EL OBJETO
						$stmt = null;

				}catch(PDOException $e){

						return 0;
						$pdo->rollBack();
				}
	}

	public static function mdl_SearchPorcent($desc){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							//echo "<br><br>entra modelo";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM `morton_comisiones` WHERE `descripcion`='".$desc."'";
							//echo "<br>asi".$sql;
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							$porcentaje_comision = $son[0]['porcentaje'];

							//echo "<br>son".$receptor_desc;
							if ($porcentaje_comision != ''){
								return $porcentaje_comision;
							}else{
								return 0;
							}
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}
	}

	public static function mdl_SearchPorcentWhere($bidder){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							//echo "<br><br>entra modelo";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM `morton_paleta` WHERE `clave`='".$bidder."' AND `estatus` = 'ACT'";
							//echo "<br>asi".$sql;
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							$porcentaje_comision = $son[0]['porcentaje'];

							//echo "<br>son".$receptor_desc;
							if ($porcentaje_comision != ''){
								return $porcentaje_comision;
							}else{
								return 0;
							}
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}

	public static function mdl_SearchDepartamento($departamento){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							//echo "<br><br>entra modelo";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM `morton_departamentos` `m`, `morton_correspondencia_departamentos` `c`
										WHERE `correspondencia` = `clave`
										AND `id_departamento`='".$departamento."' ";
							//echo $sql."<br>";
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							//echo "-".$son;
							$desc = $son[0]['descripcion'];
							//echo "<br>son".$receptor_desc;
							if ($desc != ''){
								return $desc;
							}else{
								return 0;
							}
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}

	public static function mdl_UpdateComisionesStatus($clave, $status){
				try {
						//echo "<br>ENTRA MODELO".$clave."-".$status;
						if ($status == 'I'){
							$des_status = 'INACTIVO';
						}
						if ($status == 'A'){
							$des_status = 'ACTIVO';
						}
						if ($status == 'E'){
							$des_status = 'ELIMINADO';
						}
						$sql = "UPDATE `morton_comisiones` SET `estatus`='".$des_status."'
								WHERE `id_comision`=".$clave."";

						//echo "<br>".$sql;

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
