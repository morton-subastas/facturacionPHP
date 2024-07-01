<?php
//require_once("conexion.php");


class Password {
    const SALT = 'EstoEsUnSalt';
    public static function hash($password) {
        return hash('sha512', self::SALT . $password);
    }
    public static function verify($password, $hash) {
        return ($hash == self::hash($password));
    }
 }

require_once ("conexion.php");

class ModeloUsers{

  public static function mdl_SearchUser($usu, $pas){
      try{
          //echo "<br>MODELO: llega modelos";
          $pass_hash = Password::hash($pas);

          //echo "uno".$pass_hash."<br>";
          $pasr_vista = Password::verify($pas, $pass_hash);
          //echo "dos".$pasr_vista."<br>";

          $sql = "SELECT * FROM `morton_usuario` WHERE `usu_email` = '$usu' AND `usu_pass` = '$pass_hash' ";
          //echo "<br>asi".$sql."<br>";

          $stmt = Conexion::conectar()->prepare($sql);
          //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

          //EJECUTAMOS LA SENTENCIA
          $stmt -> execute();
          //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
          $valor = $stmt -> fetchAll();
          $id = count($valor);
          //var_dump($valor);
          $max = $valor[0]['usu_status'];
          $rol = $valor[0]['usu_rol'];
          //echo "<br>valor-".$max."-<br>";

          //CERRAMOS LA CONEXION
          return array($id, $max, $rol);
      }catch(PDOException $e){
          return 0;
      }
  }

/*
	public static function mdl_SearchUser($usu, $pas){
        echo "antes try".$usu."-".$pas;
        try{
            echo "<br>MODELO: llega modelos";

            //$usuario = pepe" . " OR = 1 ;

            $pass_hash = Password::hash($pas);

            //echo "uno".$pass_hash."<br>";
            $pasr_vista = Password::verify($pas, $pass_hash);
            //echo "dos".$pasr_vista."<br>";

		          $sql = "SELECT * FROM `morton_usuario` WHERE `usu_email` = '$usu' AND `usu_pass` = '$pass_hash' ";
              ///echo "<br>asi".$sql;


              $stmt = Conexion::conectar()->prepare($sql);
              //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");


              //EJECUTAMOS LA SENTENCIA
		          $stmt -> execute();
              //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		          $valor = $stmt -> fetchAll();
              $id = count($valor);

              echo "valor".$id;

              //CERRAMOS LA CONEXION
              return 1;
		          //$stmt -> close();

              //ANULAMOS EL OBJETO
              //$stmt = null;

       }catch(PDOException $e){
            return false;
        }
	}
*/
}


?>
