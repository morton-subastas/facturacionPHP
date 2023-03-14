<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloEmail {

	public static function mdl_All_Email(){

	    $sql = "SELECT * FROM `c_email`"; //where `cfdiclista`  in ('A', 'I')";
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

	public static function mdl_AddEmail($nombre, $correo, $rol){
		try{
        $sql = "SELECT * FROM `c_email` ";
        //echo "asi".$sql."<br>";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> execute();
        $son= $stmt -> fetchAll();

        $contador = count($son);

				//echo "cuenta".$contador;
        $cuenta = $contador + 1;

        $sql = "INSERT INTO `c_email`(`id_email`, `Nombre`, `estatus`, `rol`, `email`)
        VALUES (".$cuenta.",'".$Nombre."','ACTIVO','$rol','".$correo."');";

        //echo "<br>".$sql;
        $stmt = Conexion::conectar()->prepare($sql);
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

        //EJECUTAMOS LA SENTENCIA
		    $stmt -> execute();
        //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll


		    return true;
        //CERRAMOS LA CONEXION
		    $stmt -> close();
        //ANULAMOS EL OBJETO
        $stmt = null;
      }catch(PDOException $e){
      }
  }

  public static function mdl_UpdateEmail($clave, $nombre, $email){
        $sql = "UPDATE `c_email` SET `Nombre`='".$nombre."', `email`='".$email."'  WHERE `id_email`=".$clave."";
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

  public static function mdl_DeleteReceptorPago($clave){
    $sql = "UPDATE `cfdi_clientes` SET `cfdiclista` = 'I' WHERE `cfdiclirfc`='$clave' ";
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

  public static function mdl_SearchReceptorPago($receptor){
		  try{
        $sql = "SELECT * FROM cfdi_clientes WHERE cfdicliid=$receptor";
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
        return false;
      }
  }

  public static function mdl_AllReceptores(){
      echo "entra Modelo<br>";
      $sql = "SELECT * FROM `cfdi_clientes` ";
      //echo "asi".$sql."<br>";
      $stmt = Conexion::conectar()->prepare($sql);
      $stmt -> execute();
      $son= $stmt -> fetchAll();

      $contador = count($son);
      echo "<b>contador".$contador;
      return $contador;
  }

	public static function mdl_UpdateEmailStatus($clave, $status){
				try {
						//echo "<br>ENTRA MODELO".$clave."-".$status;
						if ($status == 'I'){
							$des_status = 'INACTIVO';
						}
						if ($status == 'A'){
							$des_status = 'ACTIVO';
						}
						if ($status == 'B'){
							$des_status = 'BAJA';
						}
						$sql = "UPDATE `c_email` SET `estatus`='".$des_status."'
								WHERE `id_email`=".$clave."";

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
