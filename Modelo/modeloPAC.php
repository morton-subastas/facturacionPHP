<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloPAC {

	public static function mdl_searchAllPAC(){
		//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM cfdi_pac";
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

  public static function mdl_updatePAC($nombre, $descripcion, $url, $usu){
    $pdo = Conexion::conectar();
    //echo "pdo".$pdo."<br>";
    $pdo->beginTransaction();
    try {

      $sql2_insdetalle = "UPDATE `cfdi_pac` SET `pacnomcor`='".$nombre."',`pacnom`='".$descripcion."',`pacurl`='".$url."',`pacusu`='".$usu."' WHERE `empid`=1";
      //echo "dos<br><br>".$sql2_insdetalle;

      $stmt_insdetalle =  Conexion::conectar()->prepare($sql2_insdetalle);

      //EJECUTAMOS LA SENTENCIA
      $stmt_insdetalle -> execute();

      return true;
      $pdo->commit();
      $stmt -> close();
      //ANULAMOS EL OBJETO
      $stmt = null;

    }catch(PDOException $e){
      return false;
      $pdo->rollBack();
    }
  }
}
?>
