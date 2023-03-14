<?php


 require_once ("../Modelo/modeloAgregarDatos.php");

 class ControladorGenerarFactua{

     public static function addFactura($folio, $receptor, $fechas, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total, $fac, $paleta, $subasta, $correo_gF){
       //echo "<br><br>Controlador Agregar Factura";

        //$rptor=$_POST['receptor'];
        //var_dump($rptor);
        //$reptor = ModeloAddDatos::mdl_SearchReceptor($rptor);
        //echo "receptor".$reptor."<br>";
        //var_dump($reptor);
        //return $reptor;

        $fecha1 = substr($fechas, 0, 2);
        $fecha2 = substr($fechas, 3, 2);
        $fecha3 = substr($fechas, -4, 4);
        $fecha = $fecha3."-".$fecha2."-".$fecha1;

        $respuesta_ins = ModeloAddDatos::mdl_addCFDI($folio, $receptor, $fecha, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total, $fac, $paleta, $subasta, $correo_gF);
        //echo "<br>respuesta insersion-".$respuesta_ins."-";
        return $respuesta_ins;
        /*
        if ($respuesta_ins == 1){
            //echo "llega a modificar";
            $respuesta_mod = ModeloAddDatos::mdl_UpdateCFDI($folio);
            //echo "<br>respuesta modificacion".$respuestas;
            if ($respuesta_mod == 1){
                return  1;
            }else{

              if(!isset($_SESSION))
                  {
                  session_start();
                  }
                  $_SESSION['folio'] = '';
              return -2;
            }
        }else{
          if(!isset($_SESSION))
              {
              session_start();
              }
              $_SESSION['folio'] = '';
          return -1;
        }
        */
        //var_dump("Registro Insertado") ;
        //var_dump($respuesta);
        //return $respuesta;
      }


    public static function addFacturaRFC($folio, $receptor, $fechas, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total, $paleta, $recibo, $usu, $subasta, $correo_gF){
      //echo "<br><br>Controlador Agregar Factura";
      //echo "subtotal".$subtotal."<br>iva".$iva."<br>total".$total."<br>";
       //$rptor=$_POST['receptor'];
       //var_dump($rptor);

       //$reptor = ModeloAddDatos::mdl_SearchReceptor($rptor);

       //echo "receptor".$reptor."<br>";
       //var_dump($reptor);
       //return $reptor;


       $fecha1 = substr($fechas, 0, 2);
       $fecha2 = substr($fechas, 3, 2);
       $fecha3 = substr($fechas, -4, 4);
       $fecha = $fecha3."-".$fecha2."-".$fecha1;

       //echo "CONTROLADOR....paleta".$paleta."--subasta:".$subasta."<br>";
       $respuesta_ins = ModeloAddDatos::mdl_addCFDIRFC($folio, $receptor, $fecha, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total, $paleta, $recibo, $usu, $subasta, $correo_gF);
       //echo "<br>respuesta insersion".$respuesta_ins;


       if ($respuesta_ins == 1){
           //echo "llega a modificar";
           $respuesta_mod = ModeloAddDatos::mdl_UpdateCFDI($folio);
           //echo "<br>respuesta modificacion".$respuestas;
           if ($respuesta_mod == 1){
               return  1;
           }else{

             if(!isset($_SESSION))
                 {
                 session_start();
                 }
                 $_SESSION['folio'] = '';
             return -2;
           }
       }else{
         if(!isset($_SESSION))
             {
             session_start();
             }
             $_SESSION['folio'] = '';
         return -1;
       }

       /**/
       //var_dump("Registro Insertado") ;
       //var_dump($respuesta);
       return $respuesta;

     }
   }
?>
