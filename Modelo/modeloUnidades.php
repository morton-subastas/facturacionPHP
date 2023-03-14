<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloUnidades{

	public static function c_Unidades(){
			//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM `c_unidad`";
            //echo "asi".$sql;
      $stmt = Conexion::conectar()->prepare($sql);
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

			$stmt -> execute();
            //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		  return $stmt -> fetchAll();
            //CERRAMOS LA CONEXION
		  $stmt -> close();

      //ANULAMOS EL OBJETO
      $stmt = null;

	}

  public static function mdl_AddUnidades($cla, $des){

            $tc =1; //TIPO DE CAMBIO

            $sql_insert = "INSERT INTO `c_unidad`(`unidad_clave`, `unidad_nombre`, `unidad_descripcion`, `unidad_nota`, `unidad_fechainiciovigencia`, `unidad_fechafinvigencia`, `unidad_simbolo`)
            VALUES ('$cla','$des','','','','','')";

                //echo "asi<br>".$sql_insert."<br><br>";

                $stmt = Conexion::conectar()->prepare($sql_insert);

                //EJECUTAMOS LA SENTENCIA
                $valor = $stmt -> execute();

                return $valor;
                  //var_dump($valor);
                  //echo "echo".$valor;


                //CERRAMOS LA CONEXION
                $stmt -> close();

                //ANULAMOS EL OBJETO
                $stmt = null;

	}

  public static function mdl_DeleteUnidades($cla){

            $sql_delete = "DELETE FROM `c_unidad` WHERE `unidad_clave` = '$cla' ";

                //echo "asi<br>".$sql_delete."<br><br>";

                $stmt = Conexion::conectar()->prepare($sql_delete);

                //EJECUTAMOS LA SENTENCIA
                $valor = $stmt -> execute();

                return $valor;
                  //var_dump($valor);
                  //echo "echo".$valor;


                //CERRAMOS LA CONEXION
                $stmt -> close();

                //ANULAMOS EL OBJETO
                $stmt = null;

	}

	public static function mdl_SearchUnique_Unidad($clave){
			//$usuario = pepe" . " OR = 1 ;

			$sql = "SELECT * FROM `c_unidad` WHERE `unidad_clave`='".$clave."'";
            //echo "<br>asi".$sql;
      $stmt = Conexion::conectar()->prepare($sql);
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

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
