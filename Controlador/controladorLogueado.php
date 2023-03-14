<?php
//error_reporting(0);

class ControladorLogueado{
    public static function searchUser($email, $pass){

      require_once ("Modelo/modeloLogueado.php");

      //echo "<br>entra funciton controlador".$email."-".$pass;
      //echo "<br>CONTROLADOR: ".$email."-- ".$pass;
      list($respuesta, $status, $rol) = ModeloUsers::mdl_SearchUser($email, $pass);
      //echo "<br>recibe".$respuesta;


      if (($respuesta == 1) && ($status == 'ACTIVO')){
        session_start();
        $_SESSION['loggedin'] = 1;
        $_SESSION['email'] = $email;
        //echo 'session_id(): ' . session_id();
        //echo '<br>session_name(): ' . session_name();
        if (($rol == 'USUARIO') || ($rol == 'SUPERADMIN')){
          //header('Location: vista/facturacion');
          header('Location: vista/comienza');
        }
        if (($rol == 'EMAIL') || ($rol == 'DEVOLVER')){
          //header('Location: vista/ItemsMissing');
          header('Location: vista/comienza');
        }

      }

      if($status == 'ACTIVO'){
        $respuesta = 1;
      }else{
        $respuesta = 0;
      }

      //  echo "<br>regresae".$respuesta;
      return array($respuesta, $status);

    }

}
 ?>
