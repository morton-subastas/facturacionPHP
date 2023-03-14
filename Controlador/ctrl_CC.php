<?php
require_once ("../Modelo/mdl_CC.php");

//echo "ctrl<br>";
class CuentaContable_Search{

    public static function AllConceptos($clave, $concepto){
        //echo "<br>entra Controlador";
        $respuesta = ModeloACuentaContable::mdl_searchCC($clave, $concepto);
        //echo "<br>regresa modelo".$respuesta;
        return $respuesta;
    }

    public static function CC_Departamento($depa, $cpto){
      $respuesta = ModeloACuentaContable::mdl_CCDepa($depa, $cpto);
      //echo "<br>regresa modelo".$respuesta;
      return $respuesta;

    }


    public static function SpecificConcepto($clave){
      //echo "entra aqui";
      $respuesta = ModeloACuentaContable::mdl_specificCC($clave);
      return $respuesta;
    }

    public static function Get36($nombre){
      $respuesta = ModeloACuentaContable::mdl_get36($nombre);
      return $respuesta;
    }

    public static function SpecificEmploy($name, $concepto){
      //echo "entra controlador-".$name."-";
      $respuesta = ModeloACuentaContable::mdl_specificEmploy($name, $concepto);
      //echo "controlador<br>".$respuesta."<br>";
      return $respuesta;
    }

}


?>
