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
                    <form  class="col-lg-12">
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
                                    $a = $c_datos[0]["empid"];
                                    $b = $c_datos[0]["cfdiserid"];
                                    $c = $c_datos[0]["cfdiid"];
                                    //$valor_xml = $a."_".$b."_".$c.".xml";
                                    //$valor_xmlt = $a."_".$b."_".$c.".xml";
                                    $valor_xml = $c.".xml";
                                    $valor_xmlt = $c.".xml";
                                    $valor_pdf = $a."_".$b."_".$c.".pdf";
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
	                                      $xml_carpeta_cfdi = "../$ruta_servidor/$arc/cfdi/".$valor_xmlt."";

                                        $xml_carpeta_d = "../$ruta_servidor/$arc/xml/";
                                        $xml_carpeta_cfdi_d = "../$ruta_servidor/$arc/cfdi/";
                                        $xml_carpeta_pdf_d = "../$ruta_servidor/$arc/pdf/";

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
                                <br>
                                <br>
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
                          <br>
                          <br>
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>XML-antes</th>
                                    <th>XML-timbrado</th>
                                    <th>PDF-timbrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php

                                    //http://localhost/timbrado/files/1/xml/1_1_2.xml
                                    //http://localhost/timbrado/files/1/cfdi/1_1_2.xml
                                    echo "<tr>";
                                        echo "<td width='9%'><a href='".$xml_carpeta."'  target='_blank'><img src='../assets/img/XML_before.PNG' alt='logo' class='loader-logo'></a><br><br><br>";
                                        echo "<a href='download_xmltimbrado.php?carpeta=".$xml_carpeta_d."&file=".$valor_xml."'><img src='../assets/img/descarga.jpg' alt='logo' class='loader-logo' width='50%' height='50%'></a>";
                                        echo"</td>";

                                        echo "<td width='9%'><a href='".$xml_carpeta_cfdi."'  target='_blank'><img src='../assets/img/XML.PNG' alt='logo' class='loader-logo'></a><br><br><br>";

                                        //header("Content-disposition: attachment; filename=".$xml_carpeta_cfdi."");
                                        //header("Content-type: MIME");
                                        //readfile("".$xml_carpeta_cfdi."");

                                        //echo "<a href='download_xmltimbrado.php?name=".$xml_carpeta_cfdi."'>*-".$xml_carpeta_cfdi."-</a>";
                                        echo "<a href='download_xmltimbrado.php?carpeta=".$xml_carpeta_cfdi_d."&file=".$valor_xmlt."'><img src='../assets/img/descarga.jpg' alt='logo' class='loader-logo' width='50%' height='50%'></a>";
                                        //echo "<br>".$xml_carpeta_d."<br>";
                                        //echo "<br>".$xml_carpeta_cfdi_d."<br>";

                                        echo "</td>";
                                        //echo "<td width='9%'><img src='../assets/img/PDF.PNG' alt='logo' class='loader-logo'></td>";
                                        $liga = "../curso_cfdi/php/cfdi_pdf.php?modo=1&empid=$a&cfdiserid=$b&cfdiid=$c";
                                        echo "<td width='9%'><a href='".$liga."'  target='_blank'><img src='../assets/img/PDF.PNG' alt='logo' class='loader-logo'></a><br>";
                                        echo "<br><br></td>";
                                    echo "</tr>";
                                    echo "<tr>";

                                        echo "<td>Archivo Enviado</td>";
                                        echo "<td>Archivo Timbrado</td>";
                                        echo "<td>PDF Generado-</td>";
                                    echo "</tr>";
                                ?>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            include "../curso_cfdi/php/controlador_xml.php";
                                                        include "../curso_cfdi/php/controlador_xml.php";
                        ?>
                        </div>
                    </form>
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
