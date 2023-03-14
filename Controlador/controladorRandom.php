<?php
class controladorRandom{

  public static function ctrl_CFDI($aa, $bb, $cc){
      //echo "<br>controlador";
      $respuesta = ModeloRandom::mdl_searchCDDI($aa, $bb, $cc);
      //REGRESAR RESPUESTA
      //echo "<br>regresa de controlador".$respuesta;
      return $respuesta;
  }

  public static function ctrl_Cptos($aa, $bb, $cc){
    //echo "<br>controlador";
    $respuesta = ModeloRandom::mdl_searchConceptos($aa, $bb, $cc);
    //REGRESAR RESPUESTA
    //echo "<br>regresa de controlador".$respuesta;
    return $respuesta;
  }
}
 ?>
