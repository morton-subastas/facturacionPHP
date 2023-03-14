<html>
  <head>
    <script src="js/script_bajado.js"></script>
    <script type= text/javascript>
      function generatePDF(){
        const element = document.getElementById("principal");

        //alert (element);

        html2pdf()
          .from(element)
          .save();

      }
    </script>
    </head>
    <body>
      <?php
      $aa = $_GET["a"]; $bb = $_GET["b"]; $cc=$_GET["c"];
      //echo "llega".$as;

      require_once ("../Controlador/controladorRandom.php");
      require_once ("../Modelo/modeloRandom.php");


      $_AllCFDI =  controladorRandom::ctrl_CFDI($aa, $bb, $cc);
      //var_dump($_AllCFDI);
      $_AllConceptos = controladorRandom::ctrl_Cptos($aa, $bb, $cc);
      //var_dump($_AllConceptos);
      ?>
      <div id="principal">
          <center>
          <table border='0' width='80%'>
            <tr>
              <td>
                <table border=0>
                  <tr><td colspan=4><b><h1><center>Facturacion Electronica</center></h1></b></td></tr>
                </table>
                  <hr style='max-width: 1000px; border: 1px solid #C1D82F; margin: 40px auto;'>
                <table border=0>
                  <tr><td rowspan=4><img src='imagenes/logotipo.png' width='30%' height="30%"></td><td>Factura:</td></tr>
                  <tr><td>Serie:</td></tr>
                  <tr><td>Fecha:<?php echo $_AllCFDI[0]['cfdifec']; ?></td></tr>
                  <tr><td>Hora:<?php echo $_AllCFDI[0]['cfdihor']; ?></td></tr>
                </table>
                <br>
                <table border=1>
                  <?php
                  if ($_AllCFDI[0]['cfditpocom'] == "I"){
                    $ingreso = "Ingreso";
                  }

                  switch ($_AllCFDI[0]['cfdiuso']){
                      case  "G01":
                        $uso = "Adquisicion de mercancias";
                      break;
                      case "G03":
                        $uso = "Gastos en general";
                      break;
                  }
                  ?>
                  <tr><td colspan="2"><b>MORTON SUBASTAS SA DE CV</b></td></tr>
                  <tr><td><b>Regimen Fiscal</b></td><td>RFC: GLC870731Y5</td></tr>
                  <tr><td><b>Tipo de Combrobante</b></td><td><?php echo $ingreso; ?></td></tr>
                  <tr><td><b>Uso</b></td><td><?php echo $uso; ?></td></tr>
                  <tr><td><b>Cliente:</b></td><td></td></tr>
                  <tr><td><b>R.F.C.:</b></td><td></td></tr>
                  <tr><td><b>Domicilio:</b></td><td></td></tr>
                  <tr><td><b>Telefono o Lugar de Expedicion</b></td><td></td></tr>
                </table>
                <br>
                <center>
                <table border=1>
                  <tr><td>Cantidad</td><td>Descripcion</td><td>Unidad</td><td>Importe</td></tr>
                  <!-- CONCEPTOS-->
                  <?php
                  foreach ($_AllConceptos as $key => $value){
                    echo "<tr>";
                      echo "<td>".$value['cfdidetcan']."</td>";
                      echo "<td>".$value['cfdipronom']."</td>";
                      echo "<td>".$value['cfdiprouni']."</td>";
                      echo "<td>".$value['cfdidetval']."</td>";
                    echo "</tr>";
                  }
                  ?>
                </table>
                </center>
                <br>
                <!-- FIN CONCEPTOS-->
                <table border=0>
                  <tr>
                    <td>
                      <table border=1>
                        <tr><td>Importe con letra:</td><td></td></tr>
                        <tr><td><b>Moneda:</b></td><td>MXN-Peso mexicano</td></tr>
                        <tr><td><b>Metodo de pago:</b></td><td>Pago en una sola exhibicion</td></tr>
                        <tr><td><b>Forma de Pago:</b></td></tr>
                      </table>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                    <td>
                      <table border=1>
                        <tr><td><b>Subtotal:</b></td><td><?php echo number_format($_AllCFDI[0]['cfdisub'],2); ?></td></tr>
                        <tr><td><b>I.V.A.</b></td><td>$<?php echo number_format($_AllCFDI[0]['cfdiiva'],2); ?></td></tr>
                        <tr><td><b>Total</b></td><td>$<?php echo number_format($_AllCFDI[0]['cfditot'],2); ?></td></tr>
                      </table>
                    </td>
                  </tr>
              </table>
              <br>
              <hr style='max-width: 1000px; border: 1px solid #C1D82F; margin: 40px auto;'>

              <table border=0 width='100%'>
                <tr>
                  <td>
                    <table border=0 width='30%'>
                      <tr><td><img src="imagenes/QR.png" width="200%" height="200%"></td></tr>
                    </table>
                  </td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  <td>
                    <table border=1 width='70%'>
                      <tr><td><b>Serie de Certificado emisor:</b></td><td><?php echo "0000101014134411313414"; ?></td></tr>
                      <tr><td><b>Folio fiscal:</b></td><td>$<?php echo "D0ADAD1041ADASFVKSSASAA12414"; ?></td></tr>
                      <tr><td><b>No de Serie de Certificado del SAT</b></td><td>$<?php echo "0000013141121431984132"; ?></td></tr>
                      <tr><td><b>Fecha y hora de certificacion:</b></td><td>$<?php echo $today; ?></td></tr>

                    </table>
                  </td>
                </tr>
            </table>
              </td>
            </tr>
          </table>
          </center>
      </div>
      <button onclick="generatePDF();">DESCARGAR</button>
    </body>
</html>
