<?php
//error_reporting(1);

$boton = $_POST['btnPromt'];
//echo "presiona boton".$boton."<br>";
if ($boton == 2){
    require_once ("../Controlador/controladorGenerarFactura.php");
    $bandera=1;

    $recibo = $_POST['recibo'];
    $valor = 1;
    $folio = $_POST['folio'];
    $receptor = $_POST['receptor'];
    $fechas = $_POST['fecha'];
    $hora = $_POST['hora'];
    $moneda = $_POST['moneda'];
    $tipo_use = $_POST['tipo_uso'];
    $tipo_comp = $_POST['tipo_comprobante'];
    $metodo = $_POST['metodo'];
    $forma_pago = $_POST['formapago'];
    $lugar_expedicion = $_POST['lugar_expedicion'];
    $subtotal = $_POST['subtotal'];
    $iva = $_POST['iva'];
    $total = $_POST['total'];
    $paleta = $_POST['paleta_rfc'];
    $subasta = $_POST['subasta_rfc'];
    session_start();
    $fac = $_SESSION['email'];
    $correo_gu = $_POST['correo_e'];

    /*
    echo "folio:".$folio."<br>receptor:".$receptor."<br>fechas:".$fechas."<br>hora:".$hora."<br>moneda:".$moneda."<br>tipo_uso".$tipo_use."<br>";
    echo "tipo_comprobante:".$tipo_comp."<br>metodo:".$metodo."<br>forma_pago:".$forma_pago."<br>lugar_expedicion:".$lugar_expedicion."<br>";
    echo "subtotal:".$subtotal."<br>iva:".$iva."<br>total:".$total."<br><br>paleta".$paleta."<br>subasta".$subasta;
    echo "recibo:".$recibo."<br>fac:".$fac;
    */
    $resultado_genera =ControladorGenerarFactua::addFacturaRFC($folio, $receptor, $fechas, $hora, $moneda, $tipo_use, $tipo_comp, $metodo, $forma_pago, $lugar_expedicion, $subtotal, $iva, $total, $paleta, $recibo, $fac, $subasta, $correo_gu);

    //$resultado_genera = 0;
    //echo "<br>El resultado es:".$resultado_genera;
    //$resultado_genera = 1;
    if (trim($resultado_genera) == 1){
        //echo "llega";
        if(!isset($_SESSION))
            {
            session_start();
            }
            $_SESSION['folio'] = $folio;

            header('Location: archivos.php');
        ?>
        <script>
            //window.location.href= "archivos.php";
        </script>
        <?php
        //header("location:../x.php");
        //echo '<meta http-equiv=refresh content=0; URL=../x.php>';
        //echo "redirecciona";
        exit();
    }else{
      ?>
      <script>

        Swal.success({
          icon: 'Error',
          title: 'Contactar al area de Desarrollo'
        });

      </script>
      <?php

    }
    /*
    */
}
    //echo "recibo".$recibo."<br>";

if (($_POST['no_recibo'] != '') or ($recibo != '')) {
    if($valor == 1){
        $recibo = $recibo;
    }else{
        $recibo = $_POST['no_recibo'];
    }

    /**************************************************************
    *CONEXION A RFC
    ***************************************************************/
        include 'funciones_RFC.php';
        //echo "despues_funcionesRFC";
        //BUSCA_FUNCION RFC
        list($refno, $bidder, $departamento, $inventor, $sale_s, $date_s, $e_correo) = getLotsRecipt($recibo);
              //echo "refno-".$refno."-<br>";
              //echo "bidder-".$bidder."-<br>";
              //echo "departamento-".$departamento."-<br>";
              //echo "inventor-".$inventor."-<br>";
              //var_dump($inventor);
                if ($refno != ''){
                  //echo "productos RFC";
                  $respuestaConcepto = "1";
                }else{
                  ?>
                  <script>

                    Swal.success({
                      icon: 'Erro',
                      title: '¡No tiene conceptos en sistema RFC!'
                    });

                  </script>
                  <?php
                }

        //BUSCA_FUNCION RFC
        //echo "***".$recibo."<br>";
        $buyrbllg = getMane($recibo);
        //$buyrbll_res = '';
        //var_dump($buyrbllg);
        //printf $buyrbllg;
        //echo "<br>";

        //var_dump(json_decode($buyrbllg));

        //echo "<br>-<br>";
              $bandera = 0;
              $bandera_credito = 0;
              //echo "*-".count($buyrbllg)."-*";
              //echo "{{}}";
              foreach ($buyrbllg as $buyrbll_res ) {
                    //echo "cuenta-".count($buyrbll_res)."-<br>";
                    for ($i=0; $i < count($buyrbll_res); $i++){
                      //echo "actualiza";
                      if ( $buyrbll_res[$i]['shipbuyer'] > 0){  //SABER SI TRAE CREDITO EN TARJETA
                        $shi_re = $buyrbll_res[$i]['shipbuyer'];
                        //echo $i.")get_Mane: -".$shi_re."-<br>";
                      }
                        $fec_par = substr($buyrbll_res[$i]['saledate'], 0, 10);
                        //echo $i.")-fec".$fec_par."<br>";
                    //var_dump ($buyrbllg);
                        if ($bandera == 0){
                            //echo "bandera::".$bandera;
                            if (($buyrbll_res[$i]['debit'] > 0) or ($buyrbll_res[$i]['credit'] > 0)){
                                //echo "debito:".$buyrbll_res[$i]['debit']."<br>";
                                //echo "credito:".$buyrbll_res[$i]['credit']."<br>";
                                $transferencia_porcentaje = 1;
                                $bandera = 1;
                            }
                        }
                        //echo "<br>-pago:-".$buyrbll_res[$i]['paymeth']."-<br>";
                        //paymeth 1-efectivo, 2-transferencia, 3-deposito, 4-enganche 5a7-transferencia

                        if(($buyrbll_res[$i]['paymeth'] == 3) or ($buyrbll_res[$i]['paymeth'] == 4)){
                            $es = "deposito <b>3%</b>";
                            $cargo_tarjeta = $buyrbll_res[$i]['credit'];
                            /*BUSCAR PORCENTAJE TARJEA*/
                            require_once ("../Controlador/controladorComisiones.php");
                            require_once ("../Modelo/modeloComisione.php");

                            if($buyrbll_res[$i]['paymeth'] == 3){
                              $r_porcent =  ControladorComisiones::ctrlSearchPorcent("Tarjeta");
                              $pago = 3;

                            }else{
                              $r_porcent =  ControladorComisiones::ctrlSearchPorcent("Tarjeta2");
                              $pago = 1;

                            }
                            $r_porcent = $r_porcent /100;
                            //echo "ES:".$r_porcent."<br>";
                        }
                        if($buyrbll_res[$i]['paymeth'] == 4){
                            $es = "enganche";
                            //$enganche = $enganche + $buyrbll_res[$i]['credit'];
                            //echo $i.")".$enganche."<br>";
                        }
                    }
              }

              foreach ($buyrbllg as $buyrbll_res) {

                  for ($i=0; $i < count($buyrbll_res); $i++){
                    //var_dump ($buyrbllg);
                    //echo "cuenta2-".count($buyrbll_res)."-";
                      if ($buyrbll_res[$i]["hammer"] > 0){
                          $ham_re = $buyrbll_res[$i]['hammer'];
                          $deb_re = $buyrbll_res[$i]['debit'];
                          $paleta = $buyrbll_res[$i]['bidder'];
                          //$bidder = $buyrbll_res[$i]['bidder'];
                          $subasta = $buyrbll_res[$i]['saleno'];
                          //$fec_par = $buyrbll_res[$i]['lastupdate'];
                      }
                  }
              }
        //-------------------------------------------------------------------------
        //-------------------------------------------------------TERMINA
        //-------------------------------------------------------------------------

    /***********************************************************
    *FIN CONEXION
    *************************************************************/
    //echo "<br>controladores";
    require_once ("../Controlador/controladorAgregarDatos.php");
    require_once ("../Modelo/modeloAgregarDatos.php");

    $timbrado  =  ControladorAgregarDatos::getSearchRecibo($recibo);

    //echo "timbrado".$timbrado;
    //$respuestaConcepto = '';
}

session_start();
$fac = $_SESSION['email'];
//echo "fac".$fac."<br>";
if(($fac != '')){
    //echo "<br>entra";
    include "head.php";
    include "aside.php";
    include "funciones.php";

    ?>

    <div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
                <fieldset>
                    <form  class="col-lg-12"  action="" method="post" >
                      <legend class="text-center header">
                        <img src="imagenes/imagotipo.jpeg" width='15%' height="15%" align="right">
                        <h1><strong style="color:#004D43 !important">Consultar información del</strong> <strong>Sistema RFC</strong></h1></legend>


                                <br>

                                <?php
                                if (($respuestaConcepto != '')  && ($timbrado == 0))
                                {
                                    /**--------------------------------------------------
                                    *          CATALOS SAT
                                    ---------------------------------------------------*/
                                    require_once ("../Controlador/controladorUnidades.php");
                                    require_once ("../Modelo/modeloUnidades.php");
                                    $c_Unidades =  controladorUnidades::ctrlUnidades();


                                        /**********************CATALOGO METODO-PAGO********************/
                                        require_once ("../Controlador/controladorMetodoPago.php");
                                        require_once ("../Modelo/modeloMetodoPago.php");
                                        $c_MetodoPago =  ControladorMetodoPago::ctrlEstiloPlantilla();

                                        /*********************CATALOGO FORMA-PAGO***********************/
                                        require_once ("../Controlador/controladorFormaPago.php");
                                        require_once ("../Modelo/modeloFormaPago.php");
                                        $c_FormaPago =  ControladorFormaPago::ctrlFormaPago();

                                        /********************CATALOGO DE SERVICIOS***********************/
                                        require_once ("../Controlador/controladorConceptosServicios.php");
                                        require_once ("../Modelo/modeloConceptosServicios.php");
                                        $c_ConceptoServicio =  ControladorConceptosServicios::ctrlConceptosServicios();

                                        /********************CATALOGO LUGAR EXPEDICION**********************/
                                        require_once ("../Controlador/controladorLugarExpedicion.php");
                                        require_once ("../Modelo/modeloLugarExpedicion.php");
                                        $c_LugarExpedicion =  controladorLugarExpedicion::ctrlLugarExpedicion();

                                        /********************CATALOGO MONEDAS****************************/
                                        require_once ("../Controlador/controladorMonedas.php");
                                        require_once ("../Modelo/modeloMonedas.php");
                                        $c_Monedas =  controladorMonedas::ctrlMonedas();

                                        /********************CATALOGO TIPO COMPROBANTES****************/
                                        require_once ("../Controlador/controladorTipoComprobante.php");
                                        require_once ("../Modelo/modeloComprobante.php");
                                        $c_TipoComprobante =  controladorTipoComprobante::ctrlTipoComprobante();

                                        /********************CATALOGO UNIDADES**************************/
                                        require_once ("../Controlador/controladorUnidades.php");
                                        require_once ("../Modelo/modeloUnidades.php");
                                        $c_Unidades =  controladorUnidades::ctrlUnidades();

                                        /********************CATALOGO UNIDADES**************************/
                                        require_once ("../Controlador/controladorUso.php");
                                        require_once ("../Modelo/modeloUso.php");
                                        $c_Uso =  controladorUso::ctrlUso();

                                    /**--------------------------------------------------
                                    *          FIN CATALOS SAT
                                    ---------------------------------------------------*/
                                    require_once ("../Controlador/controladorEmisoresPago.php");
                                    require_once ("../Modelo/modeloEmisorPago.php");

                                    $c_EmisorPago =  ControladorEmisoresPago::ctrlEmisorPago();


                                    /************************************************************/
                                    require_once ("../Controlador/controladorReceptoresPago.php");
                                    require_once ("../Modelo/modeloReceptorPago.php");
                                    $c_ReceptoresPago =  ControladorReceptoresPago::ctrlReceptorPago();

                                    require_once ("../Controlador/controladorAgregarDatos.php");
                                    require_once ("../Modelo/modeloAgregarDatos.php");
                                    //echo "entra";
                                    //echo "-------------------------------------------";
                                    $c_CFDI =  ControladorAgregarDatos::getCountCFDI();
                                    $hoy = date("d-m-Y");
                                    $hoy = date("d-m-Y",strtotime ( '-1 day' , strtotime ( $hoy ) ) );
                                    //echo "es".$nuevaFecha;
                                    $hora = date("H:i:s");
                                    //var_dump($respuestaConcepto[0][2]);
                                    //var_dump($respuestaConcepto['invno']);
                                    echo "<br>";
                                    //$recibo = $respuestaConcepto['invno'];
                                    //echo $row['invno']."-".$row['descript']."-".$row['reserve']."<br />";

                                    ?>
                                    <div class="form-group">
                                      <div class="row datos">
                                        <div class="col-md-3 prim-form">
                                          <p>Folio factura :</p>
                                            <input id="folio" name="folio" type="text" placeholder="First Name" class="bloqueado" value="<?php echo $c_CFDI; ?>">
                                        </div>
                                        <div class="col-md-3 prim-form">
                                              <p>Fecha :</p>
                                            <input  id="fecha" name="fecha" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $hoy; ?>">
                                        </div>
                                        <div class="col-md-3 prim-form">
                                          <p>Hora :</p>
                                            <input  id="hora" name="hora" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $hora; ?>">
                                        </div>
                                        <div class="col-md-3 prim-form">
                                          <p>Recibo No. :</p>
                                            <input  id="recibo" name="recibo" type="text"  class="bloqueado" value="<?php echo $recibo; ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row datos">
                                      <div class="col-md-3 prim-form">
                                        <p>Paleta :</p>
                                          <input id="paleta_rfc" name="paleta_rfc" type="text" placeholder="First Name" class="bloqueado" value="<?php echo $bidder; ?>">
                                      </div>
                                      <div class="col-md-3 prim-form">
                                            <p>Fecha participa :</p>
                                          <input  id="fecha_participa" name="fecha_participa" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $date_s; ?>">
                                      </div>
                                      <div class="col-md-3 prim-form">
                                        <p>Subasta :</p>
                                          <input  id="subasta_rfc" name="subasta_rfc" type="text" placeholder="Last Name" class="bloqueado" value="<?php echo $sale_s;?>">
                                      </div>
                                      <div class="col-md-3 prim-form">
                                        <p>Contrato :</p>
                                          <input  id="contrato_rfc" name="contrato_rfc" type="text"  class="bloqueado" value="">
                                      </div>
                                  </div>
                                  <br><br>
                                  <div class="row datos">
                                    <div class="col-md-6 prim-form"></div>
                                    <div class="col-md-6 prim-form">
                                      <p>Correo enviar:</p>
                                        <input style="text-align: center" id="correo_e" name="correo_e" type="text" placeholder="Correo enviar" class="bloqueado"  value="<?php echo $e_correo; ?>">
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
                                    <select class="form-control select2" style="width: 70%;">
                                                    <?php
                                                    foreach ($c_EmisorPago as $key => $value){
                                                        echo "<option value=".$value['emisor_clave'].">".$value['emisor_descripcion']."</option>";
                                                    }
                                                    ?>
                                    </select>
                                    </div>

                                    <div class="col-md-6" style="padding: 0 60px">
                                      <p><i class="fas fa-user-check icon-style"></i></p>
                                            <label>Receptor :</label>
                                                <select class="form-control select2"  id="receptor" name="receptor" required>
                                                    <option value="">Selecciona un receptor</option>
                                                    <?php
                                                    foreach ($c_ReceptoresPago as $key => $value){
                                                        echo "<option value=".$value['cfdicliid'].">".$value['cfdiclinom']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>


                                    <div class="form-group">
                                    <div class="row datos">

                                      <div class="col-md-4">
                                        <p><i class="fas fa-money-check-alt icon-style"></i></p>
                                          <label>Método :</label>
                                                <select class="form-control select2" id="metodo" name="metodo">
                                                    <?php
                                                    foreach ($c_MetodoPago as $key => $value){
                                                        echo "<option value=".$value['metodopago_clave'].">".$value['metodopago_descripcion']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                              <p><i class="fas fa-money-bill-alt icon-style"></i></p>
                                                <label>Forma de Pago :</label>
                                                <select class="form-control select2 js-example-basic-single" id="formapago" name="formapago">
                                                    <option selected="true" disabled="disabled"><strong>Seleccionar</strong></option>
                                                    <?php
                                                    foreach ($c_FormaPago as $key => $value){
                                                        echo "<option value=".$value['formapago_clave'].">".$value['formapago_clave']."-".$value['formapago_descripcion']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                              <p><i class="fas fa-donate icon-style"></i></p>
                                                <label>Moneda de Pago:</label>
                                                <select class="form-control select2 js-example-basic-single" id="moneda" name="moneda">
                                                    <option value="MXN" selected>Peso Mexicano</option>
                                                    <?php
                                                    foreach ($c_Monedas as $key => $value){
                                                        echo "<option value=".$value['moneda_clave']." >".$value['moneda_nombre']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="row datos">
                                          <div class="col-md-4">
                                            <p><i class="far fa-file-alt icon-style"></i></p>
                                              <label>Tipo Comprobante :</label>
                                                <select class="form-control select2" style="width: 70%;" id="tipo_comprobante" name="tipo_comprobante">
                                                    <?php
                                                    foreach ($c_TipoComprobante as $key => $value){
                                                        echo "<option value=".$value['tcomprobante_clave']." >".$value['tcomprobante_concepto']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                              <p><i class="fas fa-chair icon-style"></i></p>
                                                <label>Tipo Uso :</label>
                                                <select class="form-control select2" id="tipo_uso" name="tipo_uso">
                                                    <option value="G03" selected>G03 Gastos en general</option>
                                                    <?php
                                                    foreach ($c_Uso as $key => $value){
                                                        echo "<option value=".$value['uso_clave']." >".$value['uso_clave']."-".$value['uso_descripcion']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                              <p><i class="fas fa-map-marker-alt icon-style"></i></p>
                                                <label>Lugar Expedición :</label>
                                                <select class="form-control select2" id="lugar_expedicion" name="lugar_expedicion">
                                                    <option value="11000">11000 DIF</option>
                                                    <?php
                                                    foreach ($c_LugarExpedicion as $key => $value){
                                                        echo "<option value=".$value['lugarexpedicion_cp'].">".$value['lugarexpedicion_cp']."-".$value['lugarexpedicion_estado']."</option>";
                                                    }
                                                    ?>
                                                </select>
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
                                                        <th>Lote</th>
                                                        <th>Cantidad</th>
                                                        <th>Descripción</th>
                                                        <th>Clave S.A.T.</th>
                                                        <th>Unidad</th>
                                                        <th>Martillo</th>
                                                        <th>Valor Unitario</th>

                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    require_once ("../Controlador/controladorComisiones.php");
                                                    require_once ("../Modelo/modeloComisione.php");
                                                    //echo "BIDDER_ANTES".$bidder;
                                                    $bidder = substr($bidder, 0, 2);  // abcd
                                                    //echo "BIDDER DESPUES".$bidder;
                                                    $porcent_bidder =  ControladorComisiones::ctrlSearchPorcentWhere($bidder);
                                                    $porcent_bidder = $porcent_bidder /100;
                                                    //echo "+++".$transferencia_porcentaje."+++*****".$porcent_bidder."*****<br>";
                                                    header("Content-Type: text/html;charset=utf-8");
                                                    //var_dump($buyrbllg);
                                                    //echo "<br>llegas:<b>{".count($inventor["data"])."}</b>";


                                                    foreach ($inventor  as $product) {
                                                        //echo '<pre>'.var_dump($product)."<br>";


                                                        for ($i=0; $i <= count($inventor["data"]); $i++){
                                                          //echo "<br>veces:-".$i."-".$product[$i]["hammer"];
                                                            //echo "<input type=hidden id='paleta' name='paleta' value='".$value[3]."'>";
                                                            //echo "martillo".$hammer."<br>";
                                                            if ($product[$i]["hammer"] > 0){
                                                                  $hammer = $product[$i]["hammer"];
                                                                  $hammer_acumulado = $hammer_acumulado + $hammer;
                                                                  /*******PARA SACAR_IVA --COMISION POR TARJETA--******************/
                                                                  echo "bidder".$bidder."porcent_bidder".$porcent_bidder;
                                                                  //if($porcent_bidder > 0){

                                                                      $premium_antes= $hammer * 0.20;
                                                                      //echo "premium".$premium;
                                                                      $premium = $premium + $premium_antes;
                                                                      $comision_tarjeta = $comision_tarjeta + $hammer * $porcent_bidder;
                                                                  //}
                                                                  /*************************/

                                                                  echo "<tr>";
                                                                    echo "<td>".$product[$i]["lot"]."</td>";
                                                                    $lote_agregar = $product[$i]["lot"];
                                                                    echo "<td>1</td>";                //CANTIDAD
                                                                    if ($departamento != ''){
                                                                        $departamento = substr($departamento, 0, 2);
                                                                        //echo "depa:-".$departamento."-<br>";
                                                                        $departamento_desc =  ControladorComisiones::ctrlSearchDepartamento($departamento);
                                                                        //echo "desc-".$departamento_desc;
                                                                    }
                                                                    echo "<td><b><center>COMISION</center></b><br>".$product[$i]["descript"]."</td>";  //DESCRIPCION
                                                                    echo "<td>";      //CLAVE-SAT
                                                                        echo "<select class='form-control select2' name='concepto' id='concepto' style='width: 100%;' required=''  >";
                                                                          echo "<option value='80141705'>80141705-Comision</option>";
                                                                          foreach ($c_ConceptoServicio as $key => $value1){
                                                                              echo "<option value=".$value1['clave'].">".$value1['clave']."-".$value1['clave_MORTON']."-".$value1['desc_MORTON']."</option>";
                                                                            }
                                                                        echo "</select>";
                                                                    echo "</td>";
                                                                    echo "<td>";      //UNIDAD
                                                                        echo "<select class='form-control select2' name='unida' id='unidad' style='width: 100%;' required=''  >";
                                                                          echo "<option value='E48'>E48-Unidad Servicio</option>";
                                                                          foreach ($c_Unidades as $key => $value){
                                                                            echo "<option value=".$value['unidad_clave'].">".$value['unidad_clave']."-".$value['unidad_nombre']."</option>";
                                                                          }
                                                                      echo "</select>";
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                        echo "$".number_format($hammer,2)."<br>";   //HAMMER
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                      //
                                                                      $valor_premium_mas_comisiones = $premium_antes + $comision_tarjeta;
                                                                      //echo "<br>premium".$premium;
                                                                      //echo "<br>comision_tarjeta".$comision_tarjeta;
                                                                      echo "$".number_format($premium_antes,2)."</td>";  //IMPORTE

                                                                    echo '<td width="5%"> <button id="btn1" value='.$value1['cfdidetid'].' onClick="manda('.$value1['cfdidetid'].');" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
                                                                  echo "</tr>";



                                                                  $can = 1;
                                                                  $premium = $premium; //$martillo;
                                                                  $con = '80141705';
                                                                  $uni = 'E48';
                                                                  $es_des = $product[$i]["descript"];
                                                                  $des = "COMISION";
                                                                  $fol = $c_CFDI;

                                                                  $premium = str_replace ( "$", '', $premium);
                                                                  $premium = str_replace ( ",", '', $premium);
                                                                  require_once ("../Controlador/controladorAgregarConceptos.php");

                                                                  //echo $hammer_acumulado."<br>";
                                                                  //echo "prem".$premium."<br>";
                                                                  //echo "antes";
                                                                  $respuestaConcepto = ControladorAgregarConceptos::setConcepto($can, $premium, $con, $uni, $des, $fol, "NO", "CO", $hammer, $lote_agregar, $iva_colocar);
                                                                  //echo "despues";
                                                                  if ($respuestaConcepto == "true"){
                                                                      $continua =2;
                                                                      $sub_facturar = $sub_facturar + $premium;
                                                                  }


                                                            }
                                                        }
                                                    }
                                                    $total = $subtotal + $iva;
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
                                                  <?php
                                                  //echo "llega -1";
                                                  //------------------------
                                                  //-----VALORES

                                                  ?>
                                                  <tr>
                                                    <th> Premium:</th>
                                                    <td><input type="text"  class="bloqueado inp-bloq" id="premium" name="premium" placeholder="" required=""   readonly value="<?php echo "$".number_format($premium,2); ?>"></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Comision Tarjeta</th>
                                                    <?php  $comision_cargo_credito = $shi_re; ?>
                                                    <td><input type="text" class="bloqueado inp-bloq" id="comi_plataforma" name="comi_plataforma" placeholder="" required="" readonly value="<?php echo "$".number_format($comision_cargo_credito,2); ?>"></td>
                                                  </tr>
                                                  <?php
                                                  //echo "si-".$shi_re."-<br>";
                                                    if ($shi_re > 0 ){
                                                      $comision_cargo_credito ='';
                                                      $antes_iva = $shi_re / 1.16;
                                                      $antes_iva = number_format($antes_iva, 2);
                                                      $comision_cargo_credito =  $antes_iva;
                                                      $comision_cargo_credito = str_replace ( "$", '', $antes_iva);
                                                      $comision_cargo_credito = str_replace ( ",", '', $antes_iva);
                                                      //echo "guardara".$val;
                                                      $respuestaConcepto = ControladorAgregarConceptos::setConcepto($can, $comision_cargo_credito, $con, $uni, "COMISION_CREDITO", $fol, 'NO', 'CO', 0.0, 0, "COMISION_6-6");
                                                      $sub_facturar = $sub_facturar + $comision_cargo_credito;
                                                    }

                                                  ?>
                                                  <tr>
                                                    <th>Comision  Plataforma</th>
                                                    <td><input type="text" class="bloqueado inp-bloq" id="comi_tarjeta" name="comi_tarjeta" placeholder="" required="" readonly value="<?php echo "$".number_format($comision_tarjeta,2); ?>"></td>
                                                    <?php
                                                    //echo "llega-<br>";
                                                    if($comision_tarjeta > 0){
                                                      //echo "llegas_despues-".$comision_tarjeta."-<br>";
                                                      $val = str_replace("$", '', $comision_tarjeta);
                                                      $val = str_replace(",", '', $comision_tarjeta);
                                                      //echo "antes comision plataforma<br>";
                                                      $respuestaConcepto = ControladorAgregarConceptos::setConcepto($can, $val, $con, $uni, "COMISION_PLATAFORMA",$fol, "SI", 'CO',0.0, 0, $iva_colocar);
                                                      //echo "despues comision plataforma<br>";

                                                      $sub_facturar = $sub_facturar + $val;
                                                      //echo "RESPUESTA".$respuestaConcepto;
                                                    }
                                                    ?>
                                                  </tr>
                                                  <tr>
                                                    <th>IVA</th>
                                                    <?php
                                                    //echo "llega";
                                                    $subtotal = $premium + $comision_tarjeta + $comision_cargo_credito;
                                                    //echo "subtotal".$subtotal;

                                                    $iva = number_format($subtotal * 0.16, 2);
                                                    //echo "<br>iva".$iva;
                                                    ?>
                                                    <td><input type="text" class="bloqueado inp-bloq" id="iva" name="iva" placeholder="" required="" readonly value="<?php echo "$".$iva; ?>"></td>
                                                  </tr>
                                                  <tr>
                                                    <!--<th>Total Factura</th>-->
                                                    <?php
                                                    //echo "llega";
                                                    $iva = str_replace ( "$", '', $iva);
                                                    $iva = str_replace ( ",", '', $iva);

                                                    //echo "premium:".$premium.", tarjeta:".$comision_tarjeta.", iva:".$iva;
                                                    $total_global = $premium + $comision_tarjeta  + $comision_cargo_credito + $iva;
                                                    ?>
                                                    <!--<td>
                                                      <input type="text" class="bloqueado inp-bloq" id="su" name="su" placeholder="" required="" readonly value="<?php //echo "$".number_format($total_global, 2); ?>">
                                                      <?php  //if($total_global >0){ echo num2letras(number_format($total_global,2,'.','')); } ?>
                                                    </td>
                                                    -->
                                                      <input type="hidden" class="bloqueado inp-bloq" id="subtotal" name="subtotal" placeholder="" required="" readonly value="<?php echo "$".number_format($sub_facturar, 2); ?>">
                                                    </tr>

                                                  <tr>
                                                    <th>Martillo</th>
                                                    <td>
                                                      <input type="text" class="bloqueado inp-bloq" id="" name="" placeholder="" required="" readonly value="<?php echo "$".number_format($hammer_acumulado, 2); ?>"></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Total a Pagar</th>
                                                    <?php
                                                    //echo "ham-".$hammer."-".$total_global."-<br>";
                                                    $total_total = $total_global + $hammer_acumulado;
                                                    ?>
                                                    <td>
                                                      <input type="text" class="bloqueado inp-bloq" id="total" name="total" placeholder="" required="" readonly value="<?php echo "$".number_format($total_total, 2); ?>">
                                                      <?php  if($total_total >0){ echo num2letras(number_format($total_total,2,'.','')); } ?>

                                                    </td>
                                                  </tr>

                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                          <div class="col-md-6 text-center">
                                            <button onclick="limpiar();"  class="btn btn-danger btn-lg eliminar">Limpiar</button>
                                          </div>
                                          <div class="col-md-6  text-center">
                                              <button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="2">Generar</button>
                                              <br>
                                              <br>
                                              <br>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="row">
                                              <div class="progress">
                                                  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 66%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="80">Paso 2 de 3</div>
                                              </div>
                                          </div>
                                        </div>

                                <?php
                                }
                                else{
                                  ?>
                                    <br>
                                    <br>
                                    <div class="box">
                                        <div class="box-header" style="text-align:center">
                                            <?php
                                                if ($timbrado == 1){
                                                    ?>
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: '¡El registro ya fue timbrado!'
                                                        });
                                                    </script>

                                                    <?php
                                                }
                                            ?>
                                                <div class="input-group" style="margin:auto">
                                                  <h4>Número Recibo:</h4>
                                                    <input type="text" id="no_recibo" name="no_recibo" class="form-control" placeholder="" aria-describedby="basic-addon1" style="border:1px solid #818181" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="box-header" style="text-align:center">
                                            <button type="submit" class="btn btn-success btn-lg agregar" data-toggle="modal" >Buscar</button>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                        <div class="row">
                                        <div class="col-md-11">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 33%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="50">Paso 1 de 3</div>
                                            </div>
                                            </div>
                                    </div>
                                <?php
                                }
                                ?>

                    </form>
                </fielset>
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

    <?php

}else{
    include "header.php";
    //echo "nada 2000";
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
