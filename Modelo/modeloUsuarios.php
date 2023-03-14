<?php
require_once "conexion.php";

class ModeloConceptoServicio{

    public static function mdl_AddUser($rec_ctrlUser, $rec_ctrlPas, $nombre){
        $hoy = date("Y-m-d");

        try {
          $sql = "INSERT INTO `morton_usuario` (`usu_email`, `usu_pass`,  `usu_status`, `usu_rol`, `usu_nombre`, `usu_fec_alta`, `usu_fec_mod`,`puesto100`, `ext20`,`gmail20`)
          VALUES ('".$rec_ctrlUser."', '".$rec_ctrlPas."', 'ACTIVO', 'USUARIO', '".$nombre."','".$hoy."', '0000-00-00','','','');";

            //echo "<br>asi".$sql;

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
          return false;
        }
    }

    public static function mdl_ChangePass($email, $new_pass){
        $hoy = date("Y-m-d");

        try {
          $sql = "UPDATE `morton_usuario` SET `usu_pass` = '".$new_pass."',  `usu_fec_mod`='".$hoy."' WHERE `usu_email` = '".$email."'";
          //echo "<br>".$sql."<br>";
          //$sql = "SELECT * FROM  `morton_usuario`";
          //echo "<br>asi".$sql;

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
          return false;
        }
    }

    public static function mdl_StatusChangeUser($email){
        $hoy = date("Y-m-d");

        try {
          $sql = "UPDATE `morton_usuario` SET `usu_status` = 'INACTIVO',  `usu_fec_mod`='".$hoy."' WHERE `usu_email` = '".$email."'";
          //echo "<br>".$sql."<br>";
          //$sql = "SELECT * FROM  `morton_usuario`";
          //echo "<br>asi".$sql;

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
          return false;
        }
    }

    public static function mdlAllUser(){

        try {
            $sql = "SELECT * FROM `morton_usuario` ";

            //echo "asi".$sql;

            $stmt = Conexion::conectar()->prepare($sql);

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

    public static function mdl_SpecificUser($user){

        try {
            $sql = "SELECT * FROM `morton_usuario` WHERE `usu_email`='".$user."'";

            //echo "asi".$sql;

            $stmt = Conexion::conectar()->prepare($sql);

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

    public static function SearchUser($user){

        try {
            $sql = "SELECT * FROM `morton_usuario` WHERE `usu_email` = '$user' ";

            //echo "asi".$sql;

            $stmt = Conexion::conectar()->prepare($sql);

            //EJECUTAMOS LA SENTENCIA
		        $stmt -> execute();

            //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		        return $stmt -> fetch();

            //CERRAMOS LA CONEXION
		        $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;
      }catch(PDOException $e){
		  }
    }
}
?>
