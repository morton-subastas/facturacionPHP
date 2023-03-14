
<?php
//include "head.php";

 function properText($str){
    echo $str."<br>";
    $str = mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8");
    echo "dos:".$str."<br>";
    $str = preg_replace('[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+',htmlentities('${1}'),$str);
    echo "regresa".$str."<br><br>";
    return($str);
}
/*
echo "entra a borrar";
$files = "../files";
deleteDirectory($files);
*/

function deleteDirectory($dir) {
  if(!$dh = @opendir($dir)) return;
  while (false !== ($current = readdir($dh))) {
    if($current != '.' && $current != '..') {
        //echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
        if (!@unlink($dir.'/'.$current))
            deleteDirectory($dir.'/'.$current);
    }
  }
  closedir($dh);
  echo 'Se ha borrado el directorio '.$dir.'<br/>';
  @rmdir($dir);
}

     function valida_valores($receptor, $moneda, $tipo_use, $metodo, $forma_pago, $lugar_expedicion){
          if ($receptor != ''){
             echo "<br>entra1";
             if ($moneda != ''){
                  echo "<br>entra2";
                 if ($tipo_use != ''){
                     echo "<br>entra3";
                     if ($metodo != ''){
                         echo "<br>entra4";
                         if ($forma_pago != ''){
                             echo "<br>entra5";
                             if ($lugar_expedicion != ''){
                                 echo "<br>entra6";
                                 return 1;
                             }else{
                                 ?>
                                 <script>
                                 Swal.fire({
                                     icon: 'error',
                                     title: '¡Debe Seleccionar un tipo de lugar de expedicion!'
                                 });
                                 </script>
                                 <?php
                                 echo "<br>regresa 6.1";
                                 return 2;
                             }
                         }else{
                             ?>
                             <script>
                             Swal.fire({
                                 icon: 'error',
                                 title: '¡Debe Seleccionar un tipo de forma de pago!'
                             });
                             alert ("normalita");
                             </script>
                             <?php
                             echo "<br>regresa 5.1";
                             return 2;
                         }
                     }else{
                         ?>
                         <script>
                         Swal.fire({
                             icon: 'error',
                             title: '¡Debe Seleccionar un tipo de metodo!'
                         });
                         </script>
                         <?php
                         echo "<br>regresa 4.1";
                         return 2;
                     }
                 }else{
                     ?>
                     <script>
                     Swal.fire({
                         icon: 'error',
                         title: '¡Debe Seleccionar un tipo de uso!'
                     });
                     </script>
                     <?php
                     echo "<br>regresa 3.1";
                     return 2;
                 }
              }else{
                 ?>
                 <script>
                 Swal.fire({
                     icon: 'error',
                     title: '¡Debe Seleccionar un tipo de moneda!'
                 });
                 </script>
                 <?php
                 echo "<br>regresa 2.1";
                 return 2;
             }
         }else{
             ?>
             <script>
             Swal.fire({
                 icon: 'error',
                 title: '¡Debe Seleccionar un receptor!'
             });
             </script>
             <?php
             echo "<br>regresa 1.1";
             return 2;

         }
     }


function puertos(){
/*
    $Host = "https://www.desarrollomorton.com/admin/facturacion/";

    //Volcamos el Listado de Puertos Scaneados en un tabla ...

    echo '<table style="padding:8px;">';
    echo '<tr style="background-color:gray;"><th style="font-size:14px; font-weight:bold;">Port</th> <th style="font-size:14px; font-weight:bold;">Estado</th> <th style="font-size:14px; font-weight:bold;">Mensaje</th></tr>';

    for ($i=0;$i<5000;$i++) {

        if ($port = @fsockopen ($Host, $i, $errno, $errstr, 10)) {
          $Msg = fgets($port, 1024);

          if ($Msg==""){ $Mensaje = "Puerto abierto, no emite respuesta."; }else{ $Mensaje = $Msg; }
            echo '<tr style="background-color:red; padding:8px; font-weight:bold;"><td>'.$i.'</td> <td>Abierto</td> <td>'.$Mensaje.'</td></tr>';
            fclose ();
          }else{
            echo '<tr style="background-color:green; padding:8px; font-weight:bold;"><td>'.$i.'</td> <td>Cerrado</td> <td>El puerto está cerrado.</td></tr>';

          }

        fflush();

    }

    echo '</table>';
*/
}
//echo "convierte<br>";
//echo num2letras(300.32);



  function num2letras($numero) {
    //echo "antes:".$numero.".";
    //$numero = 11213.89;
    //$numero = 11213;
    $es_flotante = strpos($numero, '.');
    //echo "flota:-".$es_flotante."-<br>";
    if($es_flotante > 1){
      $inicia = strlen($numero);
      $menos = $inicia - 2;
      $flota = substr($numero, -2, 2);

    }else{
      $flota = "00";
    }
    $numf = milmillon($numero);

    return $numf." PESOS ".$flota."/100 M.N.";

  }

  function milmillon($nummierod){
        //echo "<br>1-milmillon";
        if ($nummierod >= 1000000000 && $nummierod <2000000000){
            $num_letrammd = "MIL ".(cienmillon($nummierod%1000000000));
            echo "<br>1.1";
        }
        if ($nummierod >= 2000000000 && $nummierod <10000000000){
            $num_letrammd = unidad(Floor($nummierod/1000000000))." MIL ".(cienmillon($nummierod%1000000000));
            echo "<br>1.2";
        }
        if ($nummierod < 1000000000){
          //echo "<br>1.3";
            $num_letrammd = cienmillon($nummierod);
        }
        return $num_letrammd;
    }

    function cienmillon($numcmeros){
      //echo "<br>2-cienmillon";
        if ($numcmeros == 100000000){
            $num_letracms = "CIEN MILLONES";
            echo "<br>2.1";
        }
        if ($numcmeros >= 100000000 && $numcmeros <1000000000){
          echo "<br>2.2";
            $num_letracms = centena(Floor($numcmeros/1000000))." MILLONES ".(millon($numcmeros%1000000));

        }
        if ($numcmeros < 100000000){
          //echo "<br>2.3";
            $num_letracms = decmillon($numcmeros);

        }
        return $num_letracms;
    }

    function decmillon($numerodm){
      //echo "<br>3-decmillon".$numerodm;
        if ($numerodm == 10000000){
            $num_letradmm = "DIEZ MILLONES";
            echo "<br>3.1";
        }
        if ($numerodm > 10000000 && $numerodm <20000000){
          echo "<br>3.2";
            $num_letradmm = decena(Floor($numerodm/1000000))."MILLONES ".(cienmiles($numerodm%1000000));

        }
        if ($numerodm >= 20000000 && $numerodm <100000000){
            echo "<br>3.3";
            $num_letradmm = decena(Floor($numerodm/1000000))." MILLONES ".(millon($numerodm%1000000));

        }
        if ($numerodm < 10000000){
            //echo "<br>3.4";
            $num_letradmm = millon($numerodm);

        }
        return $num_letradmm;
    }

    function millon($nummiero){
        //echo "<br>4-millon".$nummiero;
        if ($nummiero >= 1000000 && $nummiero <2000000){
            $num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000));
            //echo "<br>4.1";
        }
        if ($nummiero >= 2000000 && $nummiero <10000000){
            //echo "<br>4.2";
            $num_letramm = unidad(Floor($nummiero/1000000))." MILLONES ".(cienmiles($nummiero%1000000));

        }
        if ($nummiero < 1000000){
            //echo "<br>4.3";
            $num_letramm = cienmiles($nummiero);

        }
        return $num_letramm;
    }

    function cienmiles($numcmero){
        //echo "<br>5-cienmiles".$numcmero;
        if ($numcmero == 100000){
            $num_letracm = "CIEN MIL";
            //echo "<br>5.1";
        }
        if ($numcmero >= 100000 && $numcmero <1000000){
            //echo "<br>5.2";
            $num_letracm = centena(Floor($numcmero/1000))." MIL ".(centena($numcmero%1000));

        }
        if ($numcmero < 100000){
            //echo "<br>5.3";
            $num_letracm = decmiles($numcmero);

        }

        return $num_letracm;
    }

    function decmiles($numdmero){
        //echo "<br>6-decimales".$numdmero;
        if ($numdmero == 10000){
            $numde = "DIEZ MIL";
            //echo "<br>6.1";
          }
        if ($numdmero > 10000 && $numdmero <20000){
            //echo "<br>6.2";
            $numde = decena(Floor($numdmero/1000))."MIL ".(centena($numdmero%1000));
        }
        if ($numdmero >= 20000 && $numdmero <100000){
            //echo "<br>6.3";
            $numde = decena(Floor($numdmero/1000))." MIL ".(miles($numdmero%1000));
        }
        if ($numdmero < 10000){
            //echo "<br>6.4";
            $numde = miles($numdmero);
        }
        return $numde;
    }

    function miles($nummero){
        //echo "<br>7-miles".$numero;
        if ($nummero >= 1000 && $nummero < 2000){
            //echo "<br>7.1";
            $numm = "MIL ".(centena($nummero%1000));
        }
        if ($nummero >= 2000 && $nummero <10000){
            //echo "<br>7.2";
            $numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000));
        }
        if ($nummero < 1000){
            //echo "<br>7.3";
            $numm = centena($nummero);
        }
        return $numm;
    }

    function centena($numc){
        //echo "<br>8-centenas".$numc;
        if ($numc >= 100)
        {
          //echo "<br>8a";
            if ($numc >= 900 && $numc <= 999)
            {
                $numce = "NOVECIENTOS ";
                if ($numc > 900){
                    $numce = $numce.(decena($numc - 900));
                }
            }
            else if ($numc >= 800 && $numc <= 899)
            {
                $numce = "OCHOCIENTOS ";
                if ($numc > 800){
                    $numce = $numce.(decena($numc - 800));
                    }
            }
            else if ($numc >= 700 && $numc <= 799)
            {
                $numce = "SETECIENTOS ";
                if ($numc > 700){
                    $numce = $numce.(decena($numc - 700));
                }
            }
            else if ($numc >= 600 && $numc <= 699)
            {
                $numce = "SEISCIENTOS ";
                if ($numc > 600){
                    $numce = $numce.(decena($numc - 600));
                    }
            }
            else if ($numc >= 500 && $numc <= 599)
            {
                $numce = "QUINIENTOS ";
                if ($numc > 500){
                    $numce = $numce.(decena($numc - 500));
                    }
            }
            else if ($numc >= 400 && $numc <= 499)
            {
                $numce = "CUATROCIENTOS ";
                if ($numc > 400){
                    $numce = $numce.(decena($numc - 400));
                    }
            }
            else if ($numc >= 300 && $numc <= 399)
            {
                $numce = "TRESCIENTOS ";
                if ($numc > 300)
                    $numce = $numce.(decena($numc - 300));
            }
            else if ($numc >= 200 && $numc <= 299)
            {
                $numce = "DOSCIENTOS ";
                if ($numc > 200)
                    $numce = $numce.(decena($numc - 200));
            }
            else if ($numc >= 100 && $numc <= 199)
            {
                if ($numc == 100)
                    $numce = "CIEN ";
                else
                    $numce = "CIENTO ".(decena($numc - 100));
            }
        }
        else{
            $numce = decena($numc);
            }
        return $numce;
}

function decena($numdero){
      //echo "<br>9)-".$numdero."-<br>";
        if ($numdero >= 90 && $numdero <= 99)
        {
            $numd = "NOVENTA ";
            if ($numdero > 90)
                $numd = $numd."Y ".(unidad($numdero - 90));
        }
        else if ($numdero >= 80 && $numdero <= 89)
        {
            $numd = "OCHENTA ";
            if ($numdero > 80)
                $numd = $numd."Y ".(unidad($numdero - 80));
        }
        else if ($numdero >= 70 && $numdero <= 79)
        {
            $numd = "SETENTA ";
            if ($numdero > 70)
                $numd = $numd."Y ".(unidad($numdero - 70));
        }
        else if ($numdero >= 60 && $numdero <= 69)
        {
            $numd = "SESENTA ";
            if ($numdero > 60)
                $numd = $numd."Y ".(unidad($numdero - 60));
        }
        else if ($numdero >= 50 && $numdero <= 59)
        {
            $numd = "CINCUENTA ";
            if ($numdero > 50)
                $numd = $numd."Y ".(unidad($numdero - 50));
        }
        else if ($numdero >= 40 && $numdero <= 49)
        {
            $numd = "CUARENTA ";
            if ($numdero > 40)
                $numd = $numd."Y ".(unidad($numdero - 40));
        }
        else if ($numdero >= 30 && $numdero <= 39)
        {
            $numd = "TREINTA ";
            if ($numdero > 30)
                $numd = $numd."Y ".(unidad($numdero - 30));
        }
        else if ($numdero >= 20 && $numdero <= 29)
        {
            if ($numdero == 20)
                $numd = "VEINTE ";
            else
                $numd = "VEINTI".(unidad($numdero - 20));
        }
        else if ($numdero >= 10 && $numdero <= 19)
        {
          //echo "llegas".$numdero;

            if ($numdero >= 10 && $numdero < 11){
              $numd = "DIEZ ";
            }
            if ($numdero >= 11 && $numdero < 12){
              $numd = "ONCE ";
            }
            if ($numdero >=12 && $numdero < 13){
              $numd = "DOCE ";
            }
            if ($numdero >=13 && $numdero < 14){
              $numd = "TRECE ";
            }
            if ($numdero >=14 && $numdero < 15){
              $numd = "CATORCE ";
            }
            if ($numdero >=15 && $numdero < 16){
              $numd = "QUINCE ";
            }
            if ($numdero >= 16 && $numdero < 17){
              $numd = "DIECISEIS ";
            }
            if ($numdero >= 17 && $numdero < 18){
              $numd = "DIECISIETE ";
            }
            if ($numdero >= 18 && $numdero < 19){
              $numd = "DIECIOCHO ";
            }
            if ($numdero >= 19 && $numdero < 20){
              $numd = "DIECINUEVE ";
            }
        }
        else{
            $numd = unidad($numdero);
            }
            //echo "<br>regresa".$numd;
    return $numd;
}

function unidad($numuero){
    //echo $numuero."<br>";
        if ($numuero >= 9 && $numuero < 10){
              $numu = "NUEVE ";
            }
        if ($numuero >= 8 && $numuero < 9){
              $numu = "OCHO ";
            }
        if ($numuero >= 7 && $numuero < 8){
              $numu = "SIETE ";
            }
        if ($numuero >= 6 && $numuero < 7){
              $numu = "SEIS ";
            }
        if ($numuero >= 5 && $numuero < 6){
              $numu = "CINCO ";
            }
        if ($numuero >= 4 && $numuero < 5){
              $numu = "CUATRO ";
            }
        if ($numuero >= 3 && $numuero < 4){
              $numu = "TRES ";
            }
        if ($numuero >= 2 && $numuero < 3){
              $numu = "DOS ";
            }
        if ($numuero >= 1 && $numuero < 2){
              $numu = "UN ";
            }

    return $numu;
}

?>
