<?php
//error_reporting(0);

if(!isset($_SESSION))
{
  session_start();
}


//$logueado = 1;
//echo "logueado".$logueado;
if((session_id() != '') OR (session_name() != '')){
    include "head.php";
    include "aside.php";

?>
    <div class="container">
        <div class="col-md-12">
            <div class="well well-sm">
                <fieldset>
                    <legend class="text-center header"><h1><strong style="color:#004D43 !important">Resultado de</strong> <strong>Timbrado</strong></h1></legend>
                        <div class="form-group">
                            <div class="col-md-4 prim-form">
                                <?php
                                     if(!isset($_SESSION))
                                     {
                                     session_start();
                                     }
                                     $folio = $_SESSION['folio'];

                                    require_once ("../Controlador/controladorAgregarDatos.php");
                                    require_once ("../Modelo/modeloAgregarDatos.php");

                                    //echo "envia".$folio."<br>";
                                    $c_datos =  ControladorAgregarDatos::ctr_SearchDatos($folio);


                                    require_once ("../Controlador/controladorRutaTimbres.php");
                                    require_once ("../Modelo/modeloRutaTimbres.php");

                                    $c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();
                                    //var_dump($c_RutaTimbres);
                                    $ruta_servidor = $c_RutaTimbres[0]["rutatimbre_desc"];
                                    //var_dump($c_datos);
                                    //echo "<br>...";
                                    $recibo = $c_datos[0]["cfdiobs"];
                                    $a = $c_datos[0]["empid"];
                                    $b = $c_datos[0]["cfdiserid"];
                                    $c = $c_datos[0]["cfdiid"];
                                    //$valor_xml = $a."_".$b."_".$c.".xml";
                                    //echo "res".$a."-".$b."-".$c."<br>";

                                    $fecha_c = $c_datos[0]["cfdifec"];
                                    $hora_c = $c_datos[0]["cfdihor"];
                                    $arc = $c_datos[0]["empid"];
                                    //$valor_xml = $c_datos[0]["cfdixml"];
                                    //echo "valor:".$valor."<br>";
                                    $emisor = $c_datos[0]["empid"];

                                    
                                    if ($valor_xml != ""){
                                        //$separa = explode( '/',$valor_xml);
                                        //$valor_o= $separa[4];
                                        //echo "<br> es:<br>".$valor_o;
                                        $xml_carpeta = "../$ruta_servidor/$arc/xml/".$valor_xml."";
                                        //echo $xml_carpeta."<br>";
	                                      $xml_carpeta_cfdi = "../$ruta_servidor/$arc/cfdi/".$valor_xml."";
                                        //echo $xml_carpeta_cfdi;
                                    }

                                    require_once ("../Controlador/controladorEmisoresPago.php");
                                    require_once ("../Modelo/modeloEmisorPago.php");

                                    $c_Emisor =  ControladorEmisoresPago::ctrlSearchEmisor($emisor);
                                    $emisor_f = $c_Emisor[0]["empnom"];


                                    require_once ("../Controlador/controladorReceptoresPago.php");
                                    require_once ("../Modelo/modeloReceptorPago.php");
                                    $receptor = $c_datos[0]["cfdicliid"];

                                    $c_receptor =  ControladorReceptoresPago::ctrlSearchReceptor($receptor);
                                    //$emisor_f = $c_receptor[0]["empnom"];
                                    //echo $valor;
                                    $receptor_f = $c_receptor[0]["cfdiclinom"];
                                ?>
                                <strong>Folio</strong><input id="folio" name="folio" type="text"  class="bloqueado" value="<?php echo $folio;?>">
                            </div>
                            <div class="col-md-4 prim-form">
                                <strong>Fecha</strong> <input  id="fecha" name="fecha" type="text" class="bloqueado" value="<?php echo $fecha_c; ?>">
                            </div>
                            <div class="col-md-4 prim-form">
                                <strong>Hora</strong> <input  id="hora" name="hora" type="text"  class="bloqueado" value="<?php echo $hora_c; ?>">
                                <br>
                            </div>
                        </div>
                          <br>
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac" style="text-align:center">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>PDF-PREVIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    echo "<tr>";
                                        $liga = "../curso_cfdi/php/cfdi_pdf.php?modo=1&empid=$a&cfdiserid=$b&cfdiid=$c";
                                        //echo "LIGA:".$liga;
                                        echo "<td width='9%'>";
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Recibo:</label><h1><?php echo $recibo;?></h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Emisor:</label><?php echo $emisor_f;?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Receptor:</label><?php echo $receptor_f; ?>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="box-body">

                                        <?php
                                        echo "</td>";
                                        echo "<td width='9%'><a href='".$liga."'  target='_blank'><img src='../assets/img/PDF.PNG' alt='logo' class='loader-logo'></a><br><br><br>";
                                          echo '<form action="archivos_pdf.php" method="POST">
                                          <button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="2">Timbrar</button></form>';
                                        echo "</td>";
                                    echo "</tr>";
                                ?>
                                </tr>
                                <tr>
                                  <td>

                                  </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            //include "../curso_cfdi/php/cfdi_pdf.php";
                        ?>

                        </div>
                </fieldset>
            </div>
        </div>
    </div>
<?php
}else{
    include "header.php";
    include "error404.php";
}
?>
