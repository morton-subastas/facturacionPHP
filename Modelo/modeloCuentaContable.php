<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloReceptorPago {

	public static function mdl_All_CC(){

	    $sql = "SELECT * FROM `cuentaclabe`"; //where `cfdiclista`  in ('A', 'I')";
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

	public static function mdl_AddReceptorPago($clave, $descripcion, $direccion){
		try{
        $sql = "SELECT * FROM `cfdi_clientes` ";
        //echo "asi".$sql."<br>";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> execute();
        $son= $stmt -> fetchAll();

        $contador = count($son);

				//echo "cuenta".$contador;
        $cuenta = $contador + 1;

        $sql = "INSERT INTO `cfdi_clientes`(`empid`, `cfdicliid`, `cfdiclista`, `cfdiclinom`, `cfdiclirfc`, `cfdiclidir`, `cfdiclitel`, `cfdiclicor`, `cfdiclicontacto`)
        VALUES ('1','".$cuenta."','A','".$descripcion."','".$clave."','$direccion','','','');";

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

  public static function mdl_UpdateReceptorPago($clave, $descripcion, $email, $direccion){
        $sql = "UPDATE `cfdi_clientes` SET `cfdiclinom`='".$descripcion."', `cfdiclicor`='".$email."',`cfdiclidir`='".$direccion."'  WHERE `cfdiclirfc`='".$clave."'";
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

	public static function mdl_UpdateComisionesStatus($clave, $status){
				try {
						//echo "<br>ENTRA MODELO".$clave."-".$status;
						if ($status == 'I'){
							$des_status = 'I';
						}
						if ($status == 'A'){
							$des_status = 'A';
						}
						if ($status == 'E'){
							$des_status = 'E';
						}
						$sql = "UPDATE `cfdi_clientes` SET `cfdiclista`='".$des_status."'
								WHERE `cfdicliid`=".$clave."";

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
