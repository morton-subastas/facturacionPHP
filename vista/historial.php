<?php
error_reporting(0);

session_start();
$logueado = $_SESSION['loggedin'];

if($logueado != ''){
    include "head.php";
    include "aside.php";



/***********************************************************
 * PRODUCTOS-INGRESADOS
************************************************************/
//echo "antes de controladores y modelos";
require_once ("../Controlador/controladorHistorial.php");
require_once ("../Modelo/modeloHistorial.php");
require_once ("../Controlador/controladorRutaTimbres.php");
require_once ("../Modelo/modeloRutaTimbres.php");
//echo "despues de controladores y modelos";

$search_AllCFDI =  controladorHistorial::ctrlHistorial();
//var_dump($search_AllCFDI);
//echo "llega..<br>";
$c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();
//var_dump($c_RutaTimbres);
$ruta_servidor = $c_RutaTimbres[0]["rutatimbre_desc"];
?>

<div class="container">
  <div class="col-md-12">
    <div class="well well-sm">
      <fieldset>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../facturacion/vista/facturacion">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Historial de Facturas</li>
          </ol>
        </nav>
      </fieldset>
      <form  class="form-horizontal"  action="" method="post" >
      <fieldset>
        <legend class="text-center header"><h1><strong style="color:#004D43 !important">Historial de</strong> <strong>Facturas</strong></h1></legend>
            <div class="form-group">
              <div class="col-md-12">
                <div class="box-body">
                  <table id="table" class="table table-bordered table-hover table-striped dt-responsive tabla-fac">
                  <a href="download_excel.php" class="btn-small blue z-depth-2">
                    <img src="../assets/img/Excel_download.png" alt='' width='6%' height="4%">
                  </a>
                  <!-- <table bgcolor="##D5F5E3" border='1' width='100%'  bordercolordark='#999933' bordercolorlight='#CCCC66' cellpadding='1' cellspacing='1'>-->
                    <!--class="table table-hover"-->
                    <thead>
                      <tr style="background-color: rgb(0, 77, 67);" font color = "#FDFEFE">
                        <th></th>
                        <th><font color="white">Fecha</font></th>
                        <th><font color="white">Folio</font></th>
                        <th><font color="white">Correo</font></th>
                        <!--<th><font color="white">Forma Pago</font></th>
                        <th><font color="white">Método Pago</font></th>-->
                        <th><font color="white">Receptor</font></th>
                        <th><font color="white">Total</font></th>
                        <!--<th><font color="white">Subasta</font></th>
                        <th><font color="white">Fecha Subasta</font></th>
                        <th><font color="white">Paleta o Contrato</font></th>
                        <th><font color="white">Llega</font></th>-->
                        <th>ARCHIVOS-</th>

                      </tr>
                    </thead>
                    <?php
                    $par=1;
                    //echo "cuantos".count($search_AllCFDI);
                    foreach ($search_AllCFDI as $key => $value){
                        $arc = $value["empid"];
                        if ($value["cfdiobs"] != ""){
                            echo "<tbody class='buscar'>";
                            if($par == 1){
                              echo "<tr style='background-color: rgb(253, 254, 254);'>";
                              $par - 1;
                            }else{
                              echo "<tr style='background-color: rgb(213, 219, 219);'>";

                            }
                            $par= $par + 1;
                            echo "<td width='5%'><center>";                                       //+31=98
                              echo "<a href='email_factura.php?folio=".$value["cfdiid"]."' class='btn-small blue z-depth-2'>
                                <img src='../assets/img/EMAIL.jpg' alt='CANCELAR FACTURA' class='imgRedonda' width='50%' height='50%'>
                              </a></center>";
                            echo "</td>";
                              echo "<td width='10%'>".$value["cfdifec"]."</td>";
                              echo "<td width='4%'>".$value["cfdiid"]."</td>";
                              echo "<td width='25%'>".$value["correo_e30"]."</td>";        //37
                              //echo "<td width='5%'>".$value["cfdiforpag"]."</td>";
                              //echo "<td width='5%'>".$value["cfdimetpag"]."</td>";
                              echo "<td width='20%'>".$value["cfdiclinom"]."</td>";                   //+30=67
                              echo "<td width='10%'>$".number_format($value["cfditot"],2)."</td>";
                              //echo "<td width='6%'>".$value["subasta"]."</td>";
                              //echo "<td width='7%'>2021-10-07</td>";
                              //echo "<td width='5%'>".$value["paleta"]."</td>";
                              //echo "<td width='4%'>".$value["cfdiobs"]."</td>";
                              if (strpos($value["cfdiobs"], '-SEND') !== false){
                                echo "<td>ENVIAR</td>";
                              }else{
                                //require_once ("../Controlador/controladorAgregarDatos.php");
                                //require_once ("../Modelo/modeloAgregarDatos.php");

                                //echo "envia".$folio."<br>";
                                //$c_datos =  ControladorAgregarDatos::ctr_SearchDatos($folio);

                                echo "<td>A";
                                $a = 1;
                                $b = 1;
                                $liga = "../curso_cfdi/php/cfdi_pdf.php?modo=1&empid=$a&cfdiserid=$b&cfdiid=".$value["cfdiid"]."";
                                  //$liga = '';
                                    echo "<a href='".$liga."'  target='_blank'><img src='../assets/img/PDF.PNG' alt='logo' class='loader-logo' width='20%'  height='20%'></a>";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    $valor_xml = $value["cfdiid"].".xml";
                                    $xml_carpeta = "../files/$a/cfdi/".$valor_xml."";
                                    echo "<a href='".$xml_carpeta."'  target='_blank'><img src='../assets/img/XML_before.PNG' alt='logo' class='loader-logo' width='20%'  height='20%'></a>";
                                echo "</td>";
                              }
                              /*
                              echo "<td width='5%'><center>";                                       //+31=98
                                echo "<a href='' class='btn-small blue z-depth-2'>
                                  <img src='../assets/img/Cancelar.jpg' alt='CANCELAR FACTURA' class='imgRedonda' width='90%' height='90%'>
                                </a></center>";
                              echo "</td>";
                              */
                            echo "</tr>";
                            echo "</tdbody>";
                        }
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script>
$(document).ready(function(){
    //INICIALIZAMOS LA TABLA
    var table = $('#example').DataTable({orderCellsTop: true,fixedheader: true});

    //CLONAMOS LA TABLA
    $('#example thead tr').clone(true).appendTo('#example thead');
    //BUSCAMOS EL DATO EN LA TABLA
    $('#example thead tr:eq(1) th').each(function (i){
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="" />');
      $('input', this).on('keyup change', function(){
      if (table.column(i).search() != this.value){
        table
        .column(i)
        .search(this.value)
        .draw();
      }
      });
    });
});

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
