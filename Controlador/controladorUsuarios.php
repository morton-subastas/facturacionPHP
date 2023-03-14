<?php
//https://diego.com.es/encriptacion-y-contrasenas-en-php
//https://sweetalert2.github.io/#examples
class Password {
    const SALT = 'EstoEsUnSalt';
    public static function hash($password) {
        return hash('sha512', self::SALT . $password);
    }
    public static function verify($password, $hash) {
        return ($hash == self::hash($password));
    }
}

class controladorUsuarios{

    public static function ctrl_DeleteUsuario($user){
      //echo "controlaodor";
      $respuesta = ModeloConceptoServicio::mdl_StatusChangeUser($user);
      //echo "password".$pass_hash;
      return $respuesta;
  }

    public static function ctrl_SpecificUser($user){
      //echo "controlaodor";
      $respuesta = ModeloConceptoServicio::mdl_SpecificUser($user);
      //echo "password".$pass_hash;
      return $respuesta;
  }

    public static function ctrlUsuarios($user, $contra, $nombre_u){
        //echo "controlaodor";
        $pass_hash = controladorUsuarios::ctrlSearchPass($contra);
        $respuesta = ModeloConceptoServicio::mdl_AddUser($user, $pass_hash, $nombre_u);
        //echo "password".$pass_hash;
        //ModeloConceptoServicio::mdl_AddUser($user, $pass_hash);
        //echo "<br>nuevo".$respuesta;
        return $respuesta;
    }

    public static function ctrl_UpdateUsuario($id, $new_contra){
      //echo "Controlador_Usuario:ctrl_UpdateUsuario:".$new_contra."<br>";
      $pass_hashe = controladorUsuarios::ctrlSearchPass($new_contra);
      $respuesta = ModeloConceptoServicio::mdl_ChangePass($id, $pass_hashe);
      //$respuesta = true;
      //echo "<br>*".$respuesta."*";
      return $respuesta;
    }

    public static function ctrlSearchPass($contra){
        //echo "entra";
        $hash = Password::hash($contra);
        return $hash;
        //echo "regresa<br>".$hash;
    }

    public static function ctrlAllUsuarios(){
        //REGRESAR RESPUESTA
        echo "llega controladorUsuarios function ctrlAllUsuarios<br>";
        $respuesta = ModeloConceptoServicio::mdlAllUser();

        //echo "es".$respuesta;
        return $respuesta;
    }

    public static function ctrlSearchUsu($email){

        //echo "controlador<br>";
        $respuesta = ModeloConceptoServicio::SearchUser($email);

        //var_dump($respuesta);
        //echo "es"; var_dump($respuesta[0]["usu_nombre"]);
        //$res = $respuesta[0]["usu_nombre"];
        //echo "echo".$respuesta["usu_nombre"]."<br>";
        //var_dump($respuesta["usu_nombre"]);
        $respuesta = $respuesta["usu_nombre"];
        return $respuesta;

    }

    public static function SearchUser($user){
      $respuesta = ModeloConceptoServicio::SearchUser($user);
      return $respuesta;
    }
}
?>
