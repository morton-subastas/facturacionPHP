<?php
//error_reporting(1);
session_start();
$fac = $_SESSION['email'];

//echo "fac_:".$fac."<br>";
if ($fac == 'jcarmona@mortonsubastas.com'){
  header('Location: reporte_finanzasAPI');
}

if($fac == 'mjimenez@mortonsubastas.com'){
  header('Location: ItemsMissing');
}

if ($fac == 'iespinosa@mortonsubastas.com'){
    header('Location: reporte_MultiPagos');
}

if($fac == 'zrocha@mortonsubastas.com'){
  header('Location: prueba');
}
if(($fac != '')){
    //echo "entra-";
    include "head.php";
    include "aside.php";
    include "funciones.php";
    //echo "-Ccatalogos-";
    /**--------------------------------------------------
    *          CATALOS SAT
    ---------------------------------------------------*/

    /**********************CATALOGO METODO-PAGO********************/
    require_once ("../Controlador/controladorMetodoPago.php");
    require_once ("../Modelo/modeloMetodoPago.php");
    $c_MetodoPago =  ControladorMetodoPago::ctrlEstiloPlantilla();
    //echo "1<br>";
    /*********************CATALOGO FORMA-PAGO***********************/
    require_once ("../Controlador/controladorFormaPago.php");
    require_once ("../Modelo/modeloFormaPago.php");
    $c_FormaPago =  ControladorFormaPago::ctrlFormaPago();
    //echo "2<br>";
    /********************CATALOGO DE SERVICIOS***********************/
    require_once ("../Controlador/controladorConceptosServicios.php");
    require_once ("../Modelo/modeloConceptosServicios.php");
    $c_ConceptoServicio =  ControladorConceptosServicios::ctrlConceptosServicios();
    //echo "3<br>";
    /********************CATALOGO LUGAR EXPEDICION**********************/
    require_once ("../Controlador/controladorLugarExpedicion.php");
    require_once ("../Modelo/modeloLugarExpedicion.php");
    $c_LugarExpedicion =  controladorLugarExpedicion::ctrlLugarExpedicion();
    //echo "4<br>";
    /********************CATALOGO MONEDAS****************************/
    require_once ("../Controlador/controladorMonedas.php");
    require_once ("../Modelo/modeloMonedas.php");
    $c_Monedas =  controladorMonedas::ctrlMonedasActivas();
    //echo "5<br>";
    /********************CATALOGO TIPO COMPROBANTES****************/
    require_once ("../Controlador/controladorTipoComprobante.php");
    require_once ("../Modelo/modeloComprobante.php");
    $c_TipoComprobante =  controladorTipoComprobante::ctrlTipoComprobante();
    //echo "6<br>";
    /********************CATALOGO UNIDADES**************************/
    require_once ("../Controlador/controladorUnidades.php");
    require_once ("../Modelo/modeloUnidades.php");
    $c_Unidades =  controladorUnidades::ctrlUnidades();
    //echo "7<br>";
    /********************CATALOGO UNIDADES**************************/
    require_once ("../Controlador/controladorUso.php");
    require_once ("../Modelo/modeloUso.php");
    $c_Uso =  controladorUso::ctrlUso();

    /**--------------------------------------------------
    *          FIN CATALOS SAT
    ---------------------------------------------------*/
    //echo "<br>controlador";
    require_once ("../Controlador/controladorEmisoresPago.php");
    require_once ("../Modelo/modeloEmisorPago.php");

    $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();

    /************************************************************/
    require_once ("../Controlador/controladorReceptoresPago.php");
    require_once ("../Modelo/modeloReceptorPago.php");
    $c_ReceptoresPago =  ControladorReceptoresPago::ctrlReceptorPago();

    /************************************************************/
    require_once ("../Modelo/modeloAgregarConceptos.php");

    /***********************************************************
    * PRODUCTOS-ENVIA
    ************************************************************/
    require_once ("../Controlador/controladorAgregarDatos.php");
    require_once ("../Modelo/modeloAgregarDatos.php");

    /*
    if (($_POST['receptor'] != '') ) {
      $CtrlAgregarDatos = new ControladorAgregarDatos();
      $asd = $CtrlAgregarDatos->setAddDatos($_POST['receptor'], $_POST['folio']);
    }
    */

    /***********************************************************
    * PRODUCTOS-INGRESADOS
    ************************************************************/
    require_once ("../Controlador/controladorProductosIngresados.php");
    require_once ("../Modelo/modeloProductosIngresados.php");

    $c_CFDI =  ControladorAgregarDatos::getCountCFDI();

    $c_productosIngresados =  controladorProductosIngresados::ctrlProductosIngresados($c_CFDI);
    date_default_timezone_set("America/Mexico_City");

    //echo "primero".$c_CFDI;
    //BORRAR LOS REGISTROS PREVIOS
    //controladorProductosIngresados::ctrlProductosEliminados($c_CFDI);

    $hoy = date("d/m/Y");
    $hora = date("H:i:s");
    //echo "F".$hoy."-H".$hora;

    $dtz = new DateTimeZone("America/Mexico_City");
    $dt = new DateTime("now", $dtz);
    $hora = $dt->format("h:i:s");

    $botonCPTO = $_POST['btnConcepto'];
    //echo "cpto_antes:".$botonCPTO;
    if (($_POST['cantidad'] != '') && ($botonCPTO == "2")) {//fin linea 182  (FOR ADD CONCEPT)
      //echo "Agrega conceptos";
      //echo "Paleta:".$_POST['paleta2']."<br>";
      if ($_POST['paleta2'] != ""){
        session_start();
        $_SESSION["paleta2"] = $_POST["paleta2"];
      }else{
        //echo "no entro Paleta";
      }
      //echo "Subasta".$_POST['subasta2']."<br>";
      if ($_POST['subasta2'] != ""){
        session_start();
        $_SESSION["subasta2"] = $_POST["subasta2"];
        //echo "Subasta".$_SESSION["subasta2"]."<br>";
      }else{
        //echo "no entro Subasta";
      }
      if ($_POST['fecha_participa2'] != ""){
        session_start();
        $_SESSION["fecha_participa2"] = $_POST["fecha_participa2"];
      }else{
        //echo "no entro Fecha";
      }
      if ($_POST['correo_e2'] != ""){
        session_start();
        $_SESSION["correo_e2"] = $_POST["correo_e2"];
      }else{
        //echo "no entro Fecha";
      }
      //echo "Subasta+".$_POST['subasta2']."+<br>";
      //echo "Fecha+".$_POST['fecha_participa2']."+<br>";
      //$_SESSION['paleta'] = $_POST['paleta'];
      //echo "<br>facturacion:";
      require_once ("../Controlador/controladorAgregarConceptos.php");
      $can = $_POST['cantidad'];      $val = $_POST['valor'];
      $con = $_POST['concepto'];      $uni = $_POST['unidad'];
      $des1 = $_POST['descripcion'];  $fol = $_POST['folioC'];
      $com = $_POST['comision'];      $mar = $_POST['martillo'];
      $lot = $_POST['lote'];
      if ($com <> ""){
        switch($com){
            case 'CO': $des = "<center><b>Comisión </b></center><br> ".$des1; break;
            case 'IN': $des = "<center><b>Interes </b></center><br> ".$des1; break;
            case 'FT': $des = "<center><b>Fotografia </b></center><br> ".$des1; break;
            case 'PT': $des = "<center><b>Pago con tarjeta </b></center><br> ".$des1; break;
            case 'SE': $des = "<center><b>Seguro </b></center><br> ".$des1; break;
            case 'UU': $des = "<center><b>Unidad Usada </b></center><br> ".$des1; break;
        }
      }else{
        $des = $des1;
      }

      $val = str_replace ( "$", '', $val);    $val = str_replace ( ",", '', $val);
      $numero_concepto = strpos($con, '-');
      $num_total = strlen($con);
      $cambia1 = substr($con, 0, $numero_concepto);
      $sumando_ando = $numero_concepto + 1;
      $cambia2 = substr($con, $sumando_ando, 8);

      //echo "0)".$cambia1."-".$cambia2;
      $con = $cambia2;
      if($con <> ""){
          //echo "entra concepto-".$con."-<br>";
          switch($con){
            case '55101503':  $iva_colocar = "NO_PONER_IVA"; break;
            case '84121500':  $iva_colocar = "COMISION_6-6"; break;
          }

      }
      //echo "Concepto-".$con."-iva-colocar:".$iva_colocar."<br>";
      //echo "<br>1)".$can."<br>2)".$val."<br>3)".$con."<br>4)".$uni."<br>5)".$des."<br>6)".$fol."<br>7)SI, 8)".$cambia1."9)".$mar."10)".$lot."<br>".$respuestaConcepto=1;
      $respuestaConcepto = ControladorAgregarConceptos::setConcepto($can, $val, $con, $uni, $des, $fol, "SI", $cambia1, $mar, $lot, $iva_colocar);
      //echo "<br>regresa controlador".$respuestaConcepto;
      //echo "cpto".$respuestaConcepto;
      if ($respuestaConcepto == 1){
        //echo "<br>entra";
        ?>
        <script>

          Swal.success({
            icon: 'Ok',
            title: '¡El conecpto se agrego con éxito!'
          });

        </script>
        <?php
        //echo "<br>0";
        $c_productosIngresados =  controladorProductosIngresados::ctrlProductosIngresados($c_CFDI);

        header("location:facturacion.php");
        //echo "<br>1";
        //echo "<br>2";
      }

      $_POST["cantidad"] = '';  $_POST['valor'] = ''; $_POST['concepto'] = '';
      $_POST['unidad'] = '';   $_POST['descripcion'] = '';  $_POST['folioC'] = ''; $botonCPTO = '';
      unset($_POST["cantidad"]);
      unset($_POST["btnConcepto"]);
      ?>
      <script>
        document.getElementById("cantidad").value = '';

      </script>
      <?php
      //echo "<br>cpto enviado".$botonCPTO;
  }

  $botonELIMINAR = $_POST['btnElimina'];
  if ($botonELIMINAR != ''){  //fin 217 (FOR DELETE ALL WAS CAPTURE)
    require_once ("../Controlador/controladorAgregarConceptos.php");

    //echo "eliminarConceptos-";
    $es_det = $_POST['det'];
    //echo "mandar".$es_det."<br>";
    $respuestaConcepto = ControladorAgregarConceptos::DeleteConcepto($es_det);
    //echo "respuesta..".$respuestaConcepto."<br>";

    if ($respuestaConcepto == 1){
      //echo "entra";
      ?>
      <script>
        Swal.success({
          icon: 'ok',
          title: '¡El concepto se elimino con éxito!'
        });
      </script>
      <?php
      $c_productosIngresados =  controladorProductosIngresados::ctrlProductosIngresados($c_CFDI);

    }else{
      //echo "entra";
      ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: '¡El concepto tiene un error!'
        });
      </script>
      <?php
    }
  }


  $botonGENERARFACTURA = $_POST['btnPromt'];
  if($botonGENERARFACTURA != ''){


  if (($_POST['receptor'] != '') && ($botonELIMINAR == "")) {
    $boton = $_POST['btnPromt'];
    //echo "llega receptor";
    $folio = $c_CFDI;
    require_once ("../Controlador/controladorAgregarConceptos.php");
    $respuestaConcepto = ControladorAgregarConceptos::AllConceptos($folio);
    //echo "<br>tiene".$respuestaConcepto;
    if ($respuestaConcepto == 1){
        //echo "<br>entra";
        require_once ("../Controlador/controladorGenerarFactura.php");
        //echo "genearar Factura";
        $receptor = $_POST['receptor'];
        $fechas = $hoy;
        $hora = $hora;
        $moneda = $_POST['moneda'];
        $tipo_use = $_POST['tipo_uso'];
        $tipo_comp = $_POST['tipo_comprobante'];
        $metodo = $_POST['metodo'];
        $forma_pago = $_POST['formapago'];
        $lugar_expedicion = $_POST['lugar_expedicion'];
        $subtotal = $_POST['subtotal'];
        $iva = $_POST['iva'];
        $iva_2 = str_replace(",", "", $iva);
        $sub_2 = str_replace( ",", "", $subtotal);
        //echo "i:".$iva_2."<br>";
        //echo "s:".$sub_2."<br>";
        $total_2 = $sub_2 + $iva_2;
        //echo "t:".$total_2;

        $paleta = $_POST['paleta'];
        $subasta = $_POST['subasta'];
        $correo_gu = $_POST['correo_e'];
        //echo "antes__________";
        if ($receptor != ''){
           //echo "<br>entra1";
           if ($moneda != ''){
                //echo "<br>entra2";
               if ($tipo_use != ''){
                  // echo "<br>entra3";
                   if ($metodo != ''){
                       //echo "<br>entra4";
                       if ($forma_pago != ''){
                           //echo "<br>entra5";
                           if ($lugar_expedicion != ''){
                             if ($paleta != ''){
                               if ($subasta != ''){
                                       //inicio
                                       /*
                                       echo "<br>folio:".$folio."<br>receptor:".$receptor."<br>fecha.".$fechas;
                                       echo "<br>hora:".$hora."<br>moneda:".$moneda."<br>tipo uso;".$tipo_use;
                                       echo "<br>tipo comprobante:".$tipo_comp."<br>metodo:".$metodo;
                                       echo "<br>forma pago:".$forma_pago."<br>lugar expedicion:".$lugar_expedicion;
                                       echo "<br>subtotal:".$subtotal."<br>iva:".$iva."<br>total:".$total;
                                       echo "<br>paleta:".$paleta."<br>subasta:".$subasta."<br>";
                                       echo "<br>correo:".$correo_gu."<br>";
                                       */
                                       //echo "usuario:".$fac;
                                       $resultado_genera =ControladorGenerarFactua::addFactura($folio, $receptor, $fechas, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total_2, $fac, $paleta, $subasta, $correo_gu);
                                       echo "<br>El resultado es:".$resultado_genera;
                                       //$resultado_genera = 2;
                                       if (trim($resultado_genera) == 1){
                                           //echo "llega";
                                           if(!isset($_SESSION))
                                               {
                                               session_start();
                                               }
                                               $_SESSION['folio'] = $folio;
                                           ?>
                                           <script>
                                               window.location.href= "archivos.php";
                                           </script>
                                           <?php
                                           //header("location:../x.php");
                                           //echo '<meta http-equiv=refresh content=0; URL=../x.php>';
                                           //echo "redirecciona";
                                       }
                                       else{
                                         ?>
                                         <script>
                                           Swal.fire({
                                             icon: 'error',
                                             title: '¡Contactar al area Desarrollo!'
                                           });
                                             </script>

                                         <?php
                                       }
                                       //fin

                              }else{
                                ?>
                                <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡Debe agregar una paleta!'
                                });
                                </script>
                                <?php
                                //echo "<br>regresa 6.1";
                              }
                            }else{
                               ?>
                               <script>
                               Swal.fire({
                                   icon: 'error',
                                   title: '¡Debe agregar una paleta!'
                               });
                               </script>
                               <?php
                               //echo "<br>regresa 6.1";
                             }
                           }else{
                               ?>
                               <script>
                               Swal.fire({
                                   icon: 'error',
                                   title: '¡Debe Seleccionar un tipo de lugar de expedicion!'
                               });
                               </script>
                               <?php
                               //echo "<br>regresa 6.1";
                           }
                       }else{
                           ?>
                           <script>
                           Swal.fire({
                               icon: 'error',
                               title: '¡Debe Seleccionar un tipo de forma de pago!'
                           });
                           </script>
                           <?php
                           //echo "<br>regresa 5.1";
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
                       //echo "<br>regresa 4.1";
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
                   //echo "<br>regresa 3.1";
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
               //echo "<br>regresa 2.1";
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
           //echo "<br>regresa 1.1";
      }

    }else{
      ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: '¡Debe agregar conceptos!'
        });
          </script>

      <?php
    }
  }else{
      //echo "aaaaaaaa".$boton;
      if ($boton == 1){
      ?>
      <script>
        Swal.fire({
            icon: 'error',
            title: '¡Debe agregar un Receptor!'
          });
      </script>
      <?php
      }
  }
}

?>

<div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
                    <fieldset>
                    <?php
                    $respuestas =$_COOKIE['w1'];
                    //echo "aparece".$respuestas."<br>";
 if(isset($_COOKIE['w1'])) {
    $respuesta =$_COOKIE['w1'];
    //echo "res".$respuesta;

    switch ($respuesta) {
      case 0:
        ?>
        <!-- <div class="alert inicio">
          <strong>¡Error!</strong>
        </div> -->
      <?php
        break;
      case 1:
        ?>
        <div class="success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>¡Ingresado!</strong> El concepto se ingreso con éxito.
        </div>
      <?php
          break;
      case 2:
        ?>
          <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>¡Error!</strong> El combo  <strong>receptor </strong>no puede ser nulo
          </div>
        <?php
          break;
        case 3:
            ?>
          <div class="success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>¡Error!</strong> El combo  <strong>receptor </strong>no puede ser nulo
          </div>
        <?php
            break;
  }

}

?>
                        <legend class="text-center header">
                          <img src="imagenes/imagotipo.jpeg" width='15%' height="15%" align="right">
                          <h1>
                            <strong style="color:#004D43 !important">Generar</strong> <strong>Factura</strong>
                          </h1>

                        <br><br></legend>


                    <form  class="col-lg-12" id="FormFactura" name="FormFactura" action="facturacion.php" method="post" >
                        <div class="form-group">
                          <div class="row datos">
                            <div class="col-md-4 prim-form">
                              <p>Folio factura :</p>
                                <input style="text-align: center" id="folio" name="folio" type="text" placeholder="First Name" class="bloqueado" value="<?php echo $c_CFDI; ?>" disabled>
                            </div>
                            <div class="col-md-4  prim-form">
                              <p>Fecha :</p>
                                <input style="text-align: center"  id="fecha" name="fecha" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $hoy; ?>" disabled>
                            </div>
                            <div class="col-md-4 prim-form">
                              <p>Hora :</p>
                                <input style="text-align: center"  id="hora" name="hora" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $hora; ?>" disabled>
                            </div>
                          </div>
                          <br>
                          <div class="row datos">
                            <div class="col-md-4 prim-form">
                              <p>Subasta :</p>
                                <input style="text-align: center" id="subasta" name="subasta" type="text" placeholder="Subasta" class="bloqueado" value="<?php session_start(); echo $_SESSION['subasta2']; ?>">
                            </div>
                            <div class="col-md-4  prim-form">
                              <p>Paleta-Contrato :</p>
                                <input style="text-align: center"  id="paleta" name="paleta" type="text" placeholder="Paleta" class="bloqueado" value="<?php session_start(); echo $_SESSION['paleta2']; ?>" >
                            </div>
                            <div class="col-md-4 prim-form">
                              <p>Fecha Participa :</p>
                                <input style="text-align: center"  id="fecha_participa" name="fecha_participa" type="text" placeholder="Fecha contrato" class="bloqueado" value="<?php session_start(); echo $_SESSION['fecha_participa2']; ?>">
                            </div>
                          </div>
                          <br>
                          <div class="row datos">
                            <div class="col-md-6 prim-form"></div>
                            <div class="col-md-6 prim-form">
                              <p>Correo enviar:</p>
                                <input style="text-align: center" id="correo_e" name="correo_e" type="text" placeholder="Correo enviar" class="bloqueado"  value="<?php session_start(); echo $_SESSION['correo_e2']; ?>">
                            </div>

                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                        <div class="row datos">
                          <div class="col-md-6" style="padding: 0 60px">
                            <p><i class="fas fa-user-edit icon-style"></i></p>
                              <label>Emisor :</label>
                                  <select class="form-control select2" onchange="valor(this)"  id="emisor" name="emisor">
                                      <?php
                                          foreach ($c_EmisorPago as $key => $value){
                                              echo "<option value=".$value['emisor_clave']." selected>".$value['emisor_descripcion']."</option>";
                                          }
                                      ?>
                                  </select>
                          </div>

                          <div class="col-md-6" style="padding: 0 60px">
                            <p><i class="fas fa-user-check icon-style"></i></p>
                                  <label>Receptor :</label>
                                  <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="receptor" name="receptor">
                                      <option value="">Selecciona un receptor</option>
                                      <?php
                                      //echo "<br>receptor".$_POST["receptor"];
                                      //echo "<br>clave".$value["receptor_clave"];
                                      foreach ($c_ReceptoresPago as $key => $value){
                                          if($_POST["receptor"] == $value['cfdicliid']){
                                            //echo "--con--";
                                            echo "<option value=".$value['cfdicliid']." selected>".$value['cfdiclinom']."</option>";
                                          }else{
                                            //echo "--sin--";
                                            echo "<option value=".$value['cfdicliid'].">".$value['cfdiclinom']."</option>";
                                          }
                                      }
                                      ?>
                                  </select>
                              </div>
                          </div>
                  </div>

                  <br>
                  <br>

                  <div class="form-group">
                  <div class="row datos">

                    <div class="col-md-4">
                      <p><i class="fas fa-money-check-alt icon-style"></i></p>
                        <label>Método :</label>
                        <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="metodo" name="metodo">
                            <?php
                            foreach ($c_MetodoPago as $key => $value){
                                if($_POST["metodo"] == $value['metodopago_clave']){
                                  //echo "--con--";
                                  echo "<option value=".$value['metodopago_clave']." selected>".$value['metodopago_descripcion']."</option>";
                                }else{
                                  //echo "--sin--";
                                  echo "<option value=".$value['metodopago_clave'].">".$value['metodopago_descripcion']."</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                      <p><i class="fas fa-money-bill-alt icon-style"></i></p>
                        <label>Forma de Pago :</label>
                        <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="formapago" name="formapago">

                            <option selected="true" disabled="disabled"><strong>Seleccionar</strong></option>
                            <?php
                            foreach ($c_FormaPago as $key => $value){
                                if($_POST["formapago"] == $value['formapago_clave']){
                                  //echo "--con--";
                                  echo "<option value=".$value['formapago_clave']." selected>".$value['formapago_clave']."-".$value['formapago_descripcion']."</option>";
                                }else{
                                  //echo "--sin--";
                                  echo "<option value=".$value['formapago_clave'].">".$value['formapago_clave']."-".$value['formapago_descripcion']."</option>";
                                }
                              }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                      <p><i class="fas fa-donate icon-style"></i></p>
                        <label>Moneda de Pago:</label>
                        <select class="form-control select2 js-example-basic-single" onchange="valor(this)"  id="moneda" name="moneda">

                            <option selected="true" disabled="disabled"><strong>Seleccionar</strong></option>
                            <?php
                            foreach ($c_Monedas as $key => $value){
                                if($_POST["moneda"] == $value['moneda_clave']){
                                  //echo "--con--";
                                  echo "<option value=".$value['moneda_clave']." selected>".$value['moneda_nombre']."</option>";

                                }else{
                                  //echo "--sin--";
                                  echo "<option value=".$value['moneda_clave'].">".$value['moneda_nombre']."</option>";
                                }
                              }
                            ?>
                        </select>
                    </div>
                  </div>
                  <br>
                  <br>
                    <div class="row datos">
                      <div class="col-md-4">
                        <p><i class="far fa-file-alt icon-style"></i></p>
                          <label>Tipo Comprobante :</label>
                          <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="tipo_comprobante" name="tipo_comprobante">
                              <?php
                              foreach ($c_TipoComprobante as $key => $value){
                                  if($_POST["tipo_comprobante"] == $value['tcomprobante_clave']){
                                    //echo "--con--";
                                    echo "<option value=".$value['tcomprobante_clave']." selected>".$value['tcomprobante_concepto']."</option>";
                                  }else{
                                    //echo "--sin--";
                                    echo "<option value=".$value['tcomprobante_clave'].">".$value['tcomprobante_concepto']."</option>";
                                  }
                              }
                              ?>
                          </select>
                      </div>

                      <div class="col-md-4">
                        <p><i class="fas fa-chair icon-style"></i></p>
                          <label>Tipo Uso :</label>
                          <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="tipo_uso" name="tipo_uso">

                              <?php
                              foreach ($c_Uso as $key => $value){
                                if($_POST["tipo_uso"] == $value['uso_clave']){
                                  //echo "--con--";
                                  echo "<option value=".$value['uso_clave']." selected>".$value['tcomprobante_concepto']."</option>";
                                }else{
                                  //echo "--sin--";
                                  echo "<option value=".$value['uso_clave'].">".$value['uso_clave']."-".$value['uso_descripcion']."</option>";

                                }
                                }
                              ?>
                          </select>
                      </div>

                      <div class="col-md-4">
                        <p><i class="fas fa-map-marker-alt icon-style"></i></p>
                          <label>Lugar Expedición :</label>
                          <select class="form-control select2 js-example-basic-single" onchange="valor(this)" id="lugar_expedicion" name="lugar_expedicion">
                              echo "<option value="11000">11000 DIF</option>";
                              <?php
                              foreach ($c_LugarExpedicion as $key => $value){
                                  if($_POST["lugar_expedicion"] == $value['lugarexpedicion_cp']){
                                    //echo "--con--";
                                    echo "<option value=".$value['lugarexpedicion_cp']." selected>".$value['lugarexpedicion_cp']."-".$value['lugarexpedicion_estado']."</option>";

                                  }else{
                                    //echo "--sin--";
                                    echo "<option value=".$value['lugarexpedicion_cp']." selected>".$value['lugarexpedicion_cp']."-".$value['lugarexpedicion_estado']."</option>";
                                  }
                                }
                              ?>
                          </select>
                      </div>

                    </div>
                    <br>
                    <br>
                    <br>
                  </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header" style="text-align:center">
                                    <button type="button" class="btn-lg btn-2" data-toggle="modal" data-target="#AgregaConceptos" onClick="dioClick()">Conceptos</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>

                        <div class="box-body">
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac">
                            <thead>
                                <tr>
                                  <th width='5%'>Cantidad</th>
                                  <th width='55%'>Descripción</th>
                                  <th width='10%'>Clave S.A.T.</th>
                                  <th width='8%'>Unidad</th>
                                  <th width='8%'>Martillo</th>
                                  <th width='8%'>Valor Unitario</th>
                                  <th width='8%'>IVA</th>
                                  <th width='5%'></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $sub = 0; $iva =0; $tot=0;
                                    $bandera_sin_iva =0;
                                    foreach ($c_productosIngresados as $key => $value1){
                                        //$sub = $sub + $value1['cfdidetsub'];
                                        //$iva = $iva + $value1['cfdidetiva'];
                                        //$tot = $tot + $value1['cfdidettot'];
                                        //echo "DETALLE...........".$value1['cfdidetcon']."......";
                                        $can = $value1['cfdidetval'];
                                        //echo "sub".$sub."-iva".$iva."-tot".$tot."<br>";
                                        //echo "<option value=".$value['receptor_clave'].">".$value['receptor_descripcion']."</option>";
                                        //echo '<form id="formulario2" method="post" class="col-lg-12">';
                                            echo '<input type="hidden" id="empresa" name="empresa" value='.$value1['empid'].'>';
                                            echo '<input type="hidden" id="id" name="id" value='.$value1['cfdiproid'].'>';

                                            echo "<tr>";
                                                echo "<td width='8%'>".intval($value1['cfdidetcan'])."</td>";   //CANTIDAD

                                                /*
                                                $busca_des = strpos($value1['cfdipronom'], 'Catalogo'); $busca_des = strpos($value1['cfdipronom'], 'Catalogos');
                                                $busca_des = strpos($value1['cfdipronom'], 'Catálogos');
                                                $busca_des = strpos($value1['cfdipronom'], 'CATALOGO'); $busca_des = strpos($value1['cfdipronom'], 'CATALOGOS');
                                                $busca_des = strpos($value1['cfdipronom'], 'Suscripcion');
                                                $busca_des = strpos($value1['cfdipronom'], 'SUSCRIPCION');
                                                $busca_des = strpos($value1['cfdipronom'], 'Libros');   $busca_des = strpos($value1['cfdipronom'], 'Libro');
                                                $busca_des = strpos($value1['cfdipronom'], 'LIBROS');   $busca_des = strpos($value1['cfdipronom'], 'LIBRO');
                                                */

                                                //echo "value".$value1["cfdiprosat"]."<br>";
                                                $c_desSATConceptoServicio =  ControladorConceptosServicios::ctrl_SerchServicio($value1["cfdiprosat"]);

                                                foreach ($c_desSATConceptoServicio as $key => $value){
                                                    //echo "".$value['desc_SAT']."<br>";
                                                    $busca_desque = $value['desc_SAT'];

                                                    //echo "DESQUE:".$busca_desque."<br>";
                                                    if (($busca_desque == "Catálogos") OR ($busca_desque == "Catálogo")   OR ($busca_desque == "Suscripción") OR ($busca_desque == "Libros ")){
                                                        $bandera_sin_iva = 1;
                                                    }
                                                    //echo "Bandera sin iva {".$bandera_sin_iva."}<br>";
                                                }

                                                echo "<td>".$value1['cfdipronom']."<br><b><center>".$busca_des."<br></center></b></td>";                      //DESCRIPCION
                                                    $r_servicio =  ControladorConceptosServicios::ctrl_SerchServicio($value1['cfdiprosat']);
                                                    $placeholder1 = $r_servicio[0]['desc_SAT'];
                                                echo "<td width='9%'><input type=text value='".$value1['cfdiprosat']."' title='".$placeholder1."' size=8></td>";      //CLASE SAT
                                                //echo "-".$value1['cfdiprosatuni']."-";
                                                    $c_UniqueUnidad = controladorUnidades::ctrl_SearchUnique_Unidad($value1['cfdiprosatuni']);
                                                    $placeholder_unidad = $c_UniqueUnidad[0]['unidad_nombre'];
                                                echo "<td width='5%'><input type=text value='".$value1['cfdiprosatuni']."' title='".$placeholder_unidad."' size=3></td>";   //UNIDAD

                                                if($value1['martillo'] > 0 ){ //TRAE UN VALOR EL MARTILLO
                                                  $martillo = $value1['cfdidetval'] * 5;
                                                }else{
                                                  $martillo = $value1['martillo'];
                                                }
                                                $es = $martillo * intval($value1['cfdidetcan']);
                                                $acumula_martillo = $acumula_martillo + $es;
                                                //echo "es:".$es."<br>";
                                                echo "<td width='12%'>$".number_format($martillo,2)."</td>";  //MARTILLO
                                                $martillo = "";
                                                echo "<td>$".number_format($value1['cfdidetval'],2)."</td>";            //VALOR UNITARIO
                                                echo "<td>$".number_format($value1['cfdidetiva'],2)."</td>";            //VALOR UNITARIO
                                                  //echo $bandera_sin_iva.")--".$busca_des."--<br>";
                                                    if ($bandera_sin_iva == 0 ){
                                                        //echo "ENTRA A IVA<BR>";
                                                        $iva_tabla = $value1['cfdidetval'] * 0.16;
                                                        $iva2 = $iva2 + $iva_tabla;
                                                        $bandera_sin_iva = 0;
                                                    }
                                                echo '<input type="hidden" id="det" name="det" value="'.$value1['cfdidetid'].'">';

                                                //echo '<td width="5%"> <button id="btn1" value='.$value1['cfdidetid'].' onClick="manda(this.form);" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';

                                                //echo '<td width="5%"> <button id="btnElimina" name="btnElimina" value='.$value1['cfdidetid'].' onClick="manda('.$value1['cfdidetid'].');" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                                echo '<td width="5%"> <button id="btnElimina" name="btnElimina" value='.$value1['cfdidetid'].' class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';

                                                echo "</tr>";
                                        $sub_real = $value1['cfdidetcan'] * $value1['cfdidetval'];
                                        //echo "<br>cantidad".$sub_real;
                                        $sub_acumulado = $sub_acumulado + $sub_real;
                                        //echo "<br>subtotal".$sub_acumulado;
                                    }
                                    //echo "<br>3-";
                                    $sub = number_format($sub_acumulado,2);
                                    //$iva2 = $sub_acumulado * 0.16;
                                    //echo "<br>4--".$iva2."--";
                                    $iva = number_format($iva2,2);
                                    $tot1 = $sub_acumulado + $iva2 + $acumula_martillo;
                                    //echo "<br>5-".$tot1;

                                    $tot = number_format($tot1,2);
                                ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-md-5" style="float:right; padding-right:0">
                              <table class="table table-bordered tabla-fac2">
                                <tbody>
                                  <tr>
                                    <th>Martillo:</th>
                                    <td><input type="text"  class="bloqueado inp-bloq" id="martillo" name="martillo" readonly value="<?php echo number_format($acumula_martillo,2); ?>"></td>
                                  </tr>
                                  <tr>
                                    <th>Subtotal:</th>
                                    <td><input type="text"  class="bloqueado inp-bloq" id="subtotal" name="subtotal" placeholder="" required=""  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" readonly value="<?php echo $sub; ?>"></td>
                                  </tr>
                                  <tr>
                                    <th>IVA</th>
                                    <td><input type="text" class="bloqueado inp-bloq" id="iva" name="iva" placeholder="" required="" readonly value="<?php echo $iva; ?>"></td>
                                  </tr>
                                  <tr>
                                    <th>Total Factura</th><td><?php if ($tot >0){ echo num2letras(number_format($iva,2,'.','')); } ?></td>

                                  </tr>
                                  <!-- <tr>
                                    <th>Descuento</th>
                                    <td><input type="text" class="bloqueado inp-bloq" id="descuento" name="descuento" placeholder="" required="" readonly></td>
                                  </tr> -->
                                  <tr>
                                    <th>Total</th>
                                    <td><input type="text" class="bloqueado inp-bloq" id="total" name="total" placeholder="" required="" readonly value="<?php echo $tot; ?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Total Compra</th>
                                    <td><?php if ($tot >0){ echo num2letras(number_format($tot1,2,'.','')); } ?></td>
                                  </tr>
                                </tbody>

                              </table>
                          </div>

                      </div>
                    <br>
                    <br>
                    <br>
                </div>

                        <div class="form-group">
                        <div class="col-md-6 text-center">
                                <button onclick="limpiar();"  class="btn btn-danger btn-lg eliminar">Limpiar</button>
                            </div>
                            <div class="col-md-6  text-center">
                                <!--<button onclick="dos();" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg">Generar</button>-->
                                <button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Generar</button>
                                <br>
                                <br>
                                <br>
                            </div>

                        </div>
                        <br>
                        <br>
                        <br>
                    </form>
                    </fieldset>
            </div>
        </div>
        <script>
        function dioClick(){
          var formulario = document.forms['FormFactura'];
          var subasta1 = formulario['subasta'].value;
          var fecha_participa1 = formulario['fecha_participa'].value;
          var paleta1 = formulario['paleta'].value;
          var correo_e1 = formulario['correo_e'].value;
          //alert("dio click:" + paleta1);

          var formulario2 = document.forms['FormaModal'];
          formulario2['paleta2'].value = paleta1;
          formulario2['subasta2'].value = subasta1;
          formulario2['fecha_participa2'].value = fecha_participa1;
          formulario2['correo_e2'].value = correo_e1;
          //var paleta1 = $(this).FormFactura('paleta');
          }
        </script>
    <!-------------------------------------------------------------------------------------------------->
    <!----------------------------AQUÌ COMIENZA EL MODAL------------------------------------------------>
    <!-------------------------------------------------------------------------------------------------->
    <div class="modal fade"  id="AgregaConceptos">
        <div class="modal-dialog" style="z-index: 10000;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box-body">
                    <legend class="text-center header"><h3><strong style="color:#004D43 !important">Agregar</strong> <strong>Conceptos</strong></h3></legend>
                    <form action="" id="FormaModal" name="FormaModal" method="post" class="col-lg-12">
                        <input id="folioC" name="folioC" type="hidden" placeholder="First Name" class="bloqueado" value="<?php echo $c_CFDI; ?>">
                        <input type="hidden" name="paleta2" id="paleta2">
                        <input type="hidden" name="subasta2" id="subasta2">
                        <input type="hidden" name="fecha_participa2" id="fecha_participa2">
                        <input type="hidden" name="correo_e2" id="correo_e2">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Lote:</label> <br>
                                <input type="text" class="form-control" id="lote" name="lote"  required="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Ejem: 10" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <b><font color="red">* </font></b><label>Cantidad :</label> <br>
                                <input type="text" class="form-control" id="cantidad" name="cantidad"  required="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Ejemplo: 100" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <b><font color="red">* </font></b><label>Valor Unitario :</label>
                                <input type="text" class="form-control" id="valor" name="valor" required="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ejemplo: 3000" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Martillo :</label>
                                <input type="text" class="form-control" id="martillo" name="martillo"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ejemplo: 1000">
                            </div>
                        </div>
                        <div class="form-group">
                            <b><font color="red">*</font></b><label>Concepto SAT-Morton :</label>
                            <select class="form-control select2" name="concepto" id="concepto" style="width: 100%;" required=""  >
                                <option></option>
                                <?php
                                            foreach ($c_ConceptoServicio as $key => $value){
                                                echo "<option value=".$value['id_servicio']."-".$value['clave'].">".$value['clave_MORTON']."-".$value['desc_MORTON']."</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <b><font color="red">*</font></b><label>Unidad :</label>
                              <select class="form-control select2" style="width: 100%;" name="unidad" id="unidad" required="">
                                  <option></option>
                                  <?php
                                  foreach ($c_Unidades as $key => $value){
                                      echo "<option value=".$value['unidad_clave'].">".$value['unidad_clave']."-".$value['unidad_nombre']."</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comision :</label>
                                <select class="form-control select2" style="width: 100%;" name="comision" id="comision">
                                    <option></option>
                                    <option value='CO'>Comisión</option>
                                    <option value='IN'>Interes</option>
                                    <option value='FT'>Fotografia</option>
                                    <option value='PT'>Pago con tarjeta</option>
                                    <option value='SE'>Seguro</option>
                                    <option value='UU'>Unidad Usada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <b><font color="red">*</font></b><label>Descripción :</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border-top: none">
                    <!--<button type="submit" class="btn btn-success">Agregar</button>-->
                    <!--<button onclick="addConcepto();" class="btn btn-success btn-lg">Agregar</button>-->
                    <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-success btn-lg agregar" id="btnConcepto" name="btnConcepto" value="2">Agregar</button>
                  </div>
                    <!--<input type="button" class="btn btn-primary" data-toggle="modal" value="Crear"  />-->
                    <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-danger btn-lg eliminar" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

<!-- Busador SELECT -->
<script type="text/javascript">
$(document).ready(function() {
	$('.js-example-basic-single').select2();
});
</script>


<script type="text/javascript">
  function MASK(form, n, mask, format) {
    if (format == "undefined") format = false;
    if (format || NUM(n)) {
      dec = 0, point = 0;
      x = mask.indexOf(".")+1;
      if (x) { dec = mask.length - x; }

      if (dec) {
        n = NUM(n, dec)+"";
        x = n.indexOf(".")+1;
        if (x) { point = n.length - x; } else { n += "."; }
      } else {
        n = NUM(n, 0)+"";
      }
      for (var x = point; x < dec ; x++) {
        n += "0";
      }
      x = n.length, y = mask.length, XMASK = "";
      while ( x || y ) {
        if ( x ) {
          while ( y && "#0.".indexOf(mask.charAt(y-1)) == -1 ) {
            if ( n.charAt(x-1) != "-")
              XMASK = mask.charAt(y-1) + XMASK;
            y--;
          }
          XMASK = n.charAt(x-1) + XMASK, x--;
        } else if ( y && "$0".indexOf(mask.charAt(y-1))+1 ) {
          XMASK = mask.charAt(y-1) + XMASK;
        }
        if ( y ) { y-- }
      }
    } else {
       XMASK="";
    }
    if (form) {
      form.value = XMASK;
      if (NUM(n)<0) {
        form.style.color="#FF0000";
      } else {
        form.style.color="#000000";
      }
    }
    return XMASK;
  }

  function NUM(s, dec) {
  for (var s = s+"", num = "", x = 0 ; x < s.length ; x++) {
    c = s.charAt(x);
    if (".-+/*".indexOf(c)+1 || c != " " && !isNaN(c)) { num+=c; }
  }
  if (isNaN(num)) { num = eval(num); }
  if (num == "")  { num=0; } else { num = parseFloat(num); }
  if (dec != undefined) {
    r=.5; if (num<0) r=-r;
    e=Math.pow(10, (dec>0) ? dec : 0 );
    return parseInt(num*e+r) / e;
  } else {
    return num;
  }
}
</script>
<?php
}else{
    include "header.php";
    include "error404.php";
    ?>
    <script>
    setTimeout(function () {
    window.location.href = 'https://www.desarrollomorton.com/admin/facturacion';
},2000); // 5 seconds
    </script>
<?php
}




?>
