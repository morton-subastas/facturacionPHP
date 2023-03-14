<?php
class ControladorPAC{

  public static function ctrl_AllPAC(){
      $respuesta = ModeloPAC::mdl_searchAllPAC();
      //REGRESAR RESPUESTA
      return $respuesta;
  }

  public static function ctrlUpdatePAC($nombre, $descripcion, $url, $usu){
      $respuesta = ModeloPAC::mdl_updatePAC($nombre, $descripcion, $url, $usu);
      return $respuesta;
  }
}
 ?>
