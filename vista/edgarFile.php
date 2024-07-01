<script type="text/javascript">
  function preguntar() {

    Swal.fire({
      title: '¿Esta seguro de enviar los datos?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Enviar',
      denyButtonText: `Cancelar`,
    }).then((result) => {
      if (result.isConfirmed) {
        document.ItemNotSells.submit();
      } else if (result.isDenied) {

      }
    })

  }


  function preguntar2() {

    Swal.fire({
      title: '¿Esta seguro de enviar los datos?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Enviar',
      denyButtonText: `Cancelar`,
    }).then((result) => {
      if (result.isConfirmed) {
        document.ItemNotSells2.submit();
      } else if (result.isDenied) {

      }
    })

  }
</script>

<?php
include 'funciones_RFC.php';

session_start();
$fac = $_SESSION['email'];

$cadena = trim($_POST['pre_subasta']);
//echo "1)".$fac."-".$cadena."<br>";
list($sub, $fecha_s, $nom_subasta_es) = explode("&", $cadena);
list($ano, $mes, $dia) = explode("-", $fecha_s);

echo "<p style='position:absolute;top:20%;left:1%'>" . $fac . " <b>Subasta:" . $sub . "</b></p><br>";
$variable = getEmailCliente($sub);
//var_dump($variable);
//echo "<br>variable_".$variable;
$variable2 = getAllSubasta($sub);
$cuantos2 = count($variable2);
$cuantos  = count($variable);
//var_dump($variable2[245]);
//echo "<br>variable2".$variable2;
// echo "<br>";
//echo "3)".$cuantos."-".$cuantos2."<br>";
//echo "2".$cuantos2;

if (($fac != '')) {
  include "head.php";
  include "aside.php";
  //$mail = new PHPMailer(true);

  try {
    //echo "llega2";
    //Server settings
    /*
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'msanchez@mortonsubastas.com';                 	    //SMTP username
        $mail->Password   = 'ManeMorton';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				$mail->setFrom($fac,'CORREO');
				$mail->addBCC($fac, 'CORREO');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Devolución de Lotes';
        */
    echo "<center><H1>RESULTADOS DE SUBASTA</H1></center>";
    

    // CONTADOR PARA SACAR TODOS LOS CORREOS DE LA SUBASTA

    for ($a = 0; $a <= $cuantos; $a++) {
      if (trim($variable[$a]["email"]) != "") {
        $cuantos_correos = $cuantos_correos + 1;
      }
    }

    /****          FIN DE CONTADOR  Y CICLO      */

    for ($i = 0; $i <= $cuantos; $i++) {  /*** INICIO DEL CICLO FOR PRINCIPAL DE TODO EL PROCESO    **/
    
      
      $con1 = $variable[$i]["receipt"];
      $corr = $variable[$i]["email"];

      if (trim($corr) != '') {
        echo "<h1 style='max-width:700px;text-align:center;margin:50px auto;background:#d3d3d3'>Se enviará a <span style='font-weight:bold;color:#004d43'>" . $variable[$i]["email"] . "<br>" . $i . "</span> de " . $cuantos_correos . "<br></h1>";
      }
      // if ($i == 1 || $i == 2) {
      // AQUI ANTES DE LA TABLA

      if (trim($corr) != "" || trim($corr) != null) {   /***   IF SI EL CORREO EXISTE, IF PRINCIPAL  */
        $bandera = 1;
        $unico = 0;
        $untexto = 0;
        $estimado = 0;

        $body =  "<!DOCTYPE html>";
        echo "<!DOCTYPE html>";
        $body .= "<html>";
        echo "<html>";
        $body .= "<head>";
        echo "<head>";
        $body .= "<meta charset='UTF-8'>";
        echo "<meta charset='UTF-8'>";
        $body .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
        echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
        $body .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $body .= "<title>Gracias por su compra en Morton Subastas</title>";
        echo "<title>Gracias por su compra en Morton Subastas</title>";
        $body .= "</head>";
        echo "</head>";
        $body .= "<body style='background: #f6f8f9'>";
        echo "<body style='background: #f6f8f9'>";
        $body .= "<div style='max-width: 700px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        echo "<div style='max-width: 700px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        $body .= "<img src='https://mortonsubastas.com/new/img/logo_negro_morton.svg' style='width: 250px;margin-top:20px'>";
        echo "<img src='https://mortonsubastas.com/new/img/logo_negro_morton.svg' style='width: 250px;margin-top:20px'>";
        $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
        echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
        $body .= "<p style='line-height: 1.6; font-size: 14px'>";
        echo "<p style='line-height: 1.6; font-size: 14px'>";

        for ($j = 0; $j <= $cuantos2; $j++) {
          $corr2 = $variable2[$j]["email"];
          $con2 = $variable2[$j]["receipt"];
          if (($corr == $corr2) and ($con1 == $con2)) {
            if ($estimado == 0) {
              $nombre = "<b>" . $variable2[$j]["firstname"] . " " . $variable2[$j]["lastname"] . "</b><br>";
              $body .= "<font face='Helvetica, serif'>" . $nombre . "Estimado Consignante:<br><p style='text-align:justify'>";
              echo  "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><p style='text-align:justify'> ";
              $body .= "Con base en su contrato: <b> ".$variable2[$i]['receipt']."</b> le informo los resultados de la <b> ".$nom_subasta_es." </b>No. <b>".$sub."</b>";
              echo "Con base en su contrato: <b> ".$variable2[$i]['receipt']."</b> le informo los resultados de la <b> ".$nom_subasta_es." </b>No. <b>".$sub."</b>";
              $estimado = 1;
            }      /**  FIN DEL IF QUE IMPRIME EL PRIMER TEXTO DE CONSIGNANTE      */

            if ((trim($variable2[$j]["price"]) == 0) && ($unico == 0) && (trim($variable2[$j]["price"]) != '')) {    // ESTE IF ES DE LOS LOTES  NO VENDIDOS

              $bandera = 1;
              $unico = 1;
              echo "</table><br>";
              // ABAJO DE LA TABLA DE VENDIDOS (EN PARCIALES TANTO VENDIDOS COMO NO VENDIDOS)----------------------------------------
             
              echo "<p style='text-align:justify'><strong>LOTES NO VENDIDOS </strong></strong><br><br>";
              $leyenda_no_vendidos = "NO";
              $no_vendio_nada = 1;
              if ($solo_vendidos == "SI") {
                $solo_vendidos = "NO";
                $pagado = 0;
              } else {
                $pagado = 1;
              }
              // LOTES NO VENDIDOS (Al principio)---------------------------------------------------------------------------
              switch (trim($fac)) {
                case 'ebonilla@mortonsubastas.com':
                  if (strpos($nom_subasta_es, "Obra") > 0) {
                    // EN CASO DE QUE LA SUBASTA SEA DE OG


                  } else {
                    // echo "En caso de que usted no desee que sus lotes sean recontratados o ya no califiquen para participar en subastas futuras, le sugerimos ponerse en contacto con Fernanda Serrano  al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 6894 o vía correo electrónico a <a href='mailto:mserrano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mserrano@mortonsubastas.com</a> ";
                    // echo "o con Ana Paula López al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 </a>ext. 3384 o vía correo electrónico a <a href='mailto:aplopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>aplopez@mortonsubastas.com</a>.";
                    // echo " Para las piezas de Obra Gráfica contactar a Diana Álvarez, al 55 52 83 31 40 ext. 3145 o vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a>";
                  }
                  break;
                case 'jjuarez@mortonsubastas.com':
                  //echo "llega".$nom_subasta_es."-";
                  if (strpos($nom_subasta_es, "Antigüedades") > 0) {
                    echo "Algunos lotes podrán recontratarse para próximas subastas. Favor de esperar el correo electrónico en el cual le haremos saber.<br>";

                    //echo "En caso de que usted no desee que sus lotes sean recontratados o ya no califiquen para participar en subastas futuras, le sugerimos ponerse en contacto con Verónica Bernal al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'> 55 52 83 31 40</a> ext. 6883 o vía correo electrónico a <a href='mailto:vbernal@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>vbernal@mortonsubastas.com</a>";
                  }
                  if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
                    //echo "En caso de que usted no desee que sus lotes sean recontratados o ya no califiquen para participar en subastas futuras, le sugerimos ponerse en contacto con Alejandra Rojas al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'> 55 52 83 31 40</a> ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a>";
                  }
                  break;
                case 'cpascual@mortonsubastas.com':
                  if (strpos($nom_subasta_es, "Vinos") > 0) {
                    echo "Algunos lotes podrán recontratarse para próximas subastas. Favor de esperar el correo electrónico en el cual le haremos
                    saber.";
                  } else {
                    if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
                    } else {
                      echo "En caso de que usted no desee que sus lotes sean recontratados o ya no califiquen para participar en subastas futuras, le sugerimos ponerse en contacto con Jaciel López al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'> 55 52 83 31 40</a> ext. 5120 o vía correo electrónico a <a href='mailto:jlopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>jlopez@mortonsubastas.com</a>";
                    }
                  }
                  break;
                case 'mjimenez@mortonsubastas.com':
                  echo "En caso de que usted no desee que sus lotes sean recontratados o ya no califiquen para participar en subastas futuras, le sugerimos ponerse en contacto con Miriam Jiménez al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'> 55 52 83 31 40</a> ext. 5093 o vía correo electrónico a <a href='mailto:mjimenez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mjimenez@mortonsubastas.com</a>";
                  break;
              }
              //echo " para darle a conocer la ubicación exacta de sus piezas. Horario de atención es de lunes a viernes de 9:30 am a 6:00 pm.</p><br><br>";
            }

            if ($bandera == 1) {
              //echo "entra bandera33".$variable2[$j]["price"]."<br>";
              // LOTES VENDIDOS ------------------------------------------------------------------------------------------
              if (($untexto == 0) && (trim($variable2[$j]["price"]) > 0)) {
                echo "<br><br>
									<p style='text-align:justify'><strong>LOTES VENDIDOS</strong></strong></p><br>
									<ul>";
                $solo_vendidos = "SI";
                $leyenda_no_vendidos = "SI";
                //echo "*".$solo_vendidos."*<br>";
                $no_vendio_nada = 0;
                //echo "*_".$fac."*";
                switch ($fac) {
                  case 'ebonilla@mortonsubastas.com':
                    if (strpos($nom_subasta_es, "Arte Moderno") > 0 || strpos($nom_subasta_es, "arte moderno") > 0 || (strpos($nom_subasta_es, "Arte Mexicano") > 0)) {
                      echo "<li><p style='text-align:justify'>El pago será programado a partir del cuarto miércoles posterior a la fecha en que se realizó la subasta, por medio de transferencia bancaria (siempre y cuando el comprador haya liquidado la compra). Si tiene alguna duda por favor de comunicarse con Sonia López al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3396</a> o vía correo electrónico a <a href='mailto:slopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>slopez@mortonsubastas.com</a></p></li>";

                      echo "<li><p style='text-align:justify'>Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3395</a> o vía correo electrónico a <a href='mailto:amorales@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>amorales@mortonsubastas.com</a></p></li>";

                      echo "<li><p style='text-align:justify'>Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='mailto:facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>";



                      // echo "<li><p style='text-align:justify'>Si tiene alguna duda le sugerimos ponerse en contacto con Fernanda Serrano al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6894</a> o vía correo electrónico a <a href='mailto:mserrano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mserrano@mortonsubastas.com</a> o con Ana Paula López al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3384</a> o vía correo electrónico a <a href='mailto:aplopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>aplopez@mortonsubastas.com</a></p></li>";
                      echo "</ul><br><br>";
                    } else {
                      echo "<li><p style='text-align:justify'>El pago será programado a partir del cuarto miércoles posterior a la fecha en que se realizó la subasta, por medio de transferencia bancaria (siempre y cuando el comprador haya liquidado la compra). Si tiene alguna duda por favor de comunicarse con Sonia López al 55 52 83 31 40 ext. 3396 o vía correo electrónico a slopez@mortonsubastas.com</p></li>";
                      echo "<li><p style='text-align:justify'>Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, 55 52 83 31 40 ext. 3395 o vía correo electrónico a <a href='retencionisr@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>retencionisr@mortonsubastas.com</a></p></li>";
                      echo "<li><p style='text-align:justify'>Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>";
                      echo "<li><p style='text-align:justify'>Si tiene alguna duda le sugerimos ponerse en contacto con Diana Álvarez al 55-5283-3140 o vía correo electrónico a <a href='dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com</a></p></li>";
                      echo "</ul><br><br>";
                    }

                    break;
                  case 'jjuarez@mortonsubastas.com':
                    if (strpos($nom_subasta_es, "Antigüedades") > 0 || strpos($nom_subasta_es, "antigüedades") > 0) {
                      echo "<li><p style='text-align:justify'> El pago será programado a partir del cuarto miércoles posterior a la fecha en que se realizó la subasta, por medio de transferencia  bancaria (siempre y cuando el comprador haya liquidado la compra). Si tiene alguna duda, por favor comunicarse con Sonia López al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3396</a> o vía correo electrónico a ";
                      echo "<a href='slopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>slopez@mortonsubastas.com</a><br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3395</a> o vía correo electrónico a 	<a href='mailto:amorales@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>amorales@mortonsubastas.com</a><br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>";
                      echo "</ul><br><br>";
                    }
                    if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
                      echo "
                                <li><p style='text-align:justify'> El pago será programado a partir del cuarto miércoles  posterior a la fecha en que se realizó la subasta, por medio de transferencia  bancaria (siempre y cuando el comprador haya liquidado la compra). Si tiene alguna duda por favor de comunicarse con Sonia López al 55 52 83 31 40 ext. 3396 o vía correo electrónico a <a href='slopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>slopez@mortonsubastas.com</a> <br></p></li>

                                  <li><p style='text-align:justify'> Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3395</a> o vía correo electrónico a 	<a href='mailto:amorales@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>amorales@mortonsubastas.com</a><br></p></li>

                                  <li><p style='text-align:justify'> Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>

                                  </ul><br><br>";
                    }
                    break;
                  case 'cpascual@mortonsubastas.com':
                    if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
                      echo "<li><p style='text-align:justify'> El pago será programado a partir del cuarto miercoles posterior a la fecha en que se realizó la subasta, por medio de transferencia  bancaria (siempre y cuando el comprador haya liquidado la compra).Si tiene alguna duda por favor de comunicarse con Sonia López ";
                      echo "al 55 52 83 31 40 ext. 3396 o vía correo electrónico a <a href='slopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>slopez@mortonsubastas.com</a><br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 3395 o vía correo electrónico ";
                      echo "a <a href='retencionisr@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>retencionisr@mortonsubastas.com</a><br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>";
                      echo "</ul><br><br>";
                    } else {
                      echo "<li><p style='text-align:justify'> El pago será programado a partir del cuarto lunes posterior a la fecha en que se realizó la subasta, por medio de transferencia  bancaria (siempre y cuando el comprador haya liquidado la compra).<br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 3395 o vía correo electrónico a 	<a href='retencionisr@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>retencionisr@mortonsubastas.com</a><br></p></li>";
                      echo "<li><p style='text-align:justify'> Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>";
                      echo "</ul><br><br>";
                    }
                    break;
                  case 'mjimenez@mortonsubastas.com':
                    echo "<li><p style='text-align:justify'> El pago será programado a partir del segundo lunes posterior a la fecha en que se realizó la subasta, por medio de transferencia  bancaria (siempre y cuando el comprador haya liquidado la compra).<br></p></li>
                              <li><p style='text-align:justify'> Si solicitó comprobante de la retención de impuestos (ISR), favor de ponerse en contacto con Ana Laura Morales al teléfono, <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 3395 o vía correo electrónico a 	<a href='retencionisr@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>retencionisr@mortonsubastas.com</a><br></p></li>
										          <li><p style='text-align:justify'> Si solicitó factura, favor de ponerse en contacto vía correo electrónico a <a href='facturacion@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>facturacion@mortonsubastas.com</a></p></li>
									           </ul><br><br>";
                    break;
                }

                $untexto = 1;
              }
              $body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
              echo "<table style='margin: 5px auto; font-size: 16px;'>";
              $body .=  "<tr>";
              echo  "<tr>";
              $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Contrato</center></th>";
              echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Contrato </center></th>";
              $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
              echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
              $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Reserva </center></th>";
              echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Reserva </center></th>";
              if (trim($variable2[$j]["price"]) > 0) {
                $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Martillo </center></th>";
                echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Martillo </center></th>";
              }
              $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Imagen</center></th>";
              echo  "<th style='padding: 15px;background: #004d43; color: #fff'><center>Imagen</center></th>";
              $body .=  "</tr>";
              echo "</tr>";
              $bandera = 0;
              $imprime_una = true;
            }

            $body .=  "<tr>";
            echo "<tr>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='10%'>" . $variable2[$j]["receipt"] . "</b><br><h6>Partida:<b>" . $variable2[$j]["item"] . "</b><br>Lote: <b>" . substr($variable2[$j]["salelot"], 5, 12) . "</b></h6><br></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='10%'>" . $variable2[$j]["receipt"] . "</b><br><h6>Partida:<b>" . $variable2[$j]["item"] . "</b><br>Lote: <b>" . substr($variable2[$j]["salelot"], 5, 12) . "</b></h6><br></td>";


            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='40%'><center>" . $variable2[$j]["descript"] . "</center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='40%'>" . $variable2[$j]["descript"] . "</center></td>";


            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]["reserve"]) . " MXN</center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]["reserve"]) . " MXN</center></td>";

            if (trim($variable2[$j]["price"]) > 0) {
              $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]["price"]) . " MXN</center></td>";
              echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]["price"]) . " MXN</center></td>";
            }


            $img = $variable2[$j]["pictpath"];
            //echo "IMG*".$img."*<br>";
            $valor = "/";
            $este = "\ ";

            $este = trim($este);
            $cambio = str_replace($este, $valor, $img);
            $cambio = str_replace("p:/", "", $cambio);
            //echo "IMG2-".$cambio."<br>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
            if ($fila['lugar30'] == 'Mayka') {
              $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka</a><br><br>";
            }
            if ($fila['lugar30'] == 'Constituyentes') {
              $body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
            }
            $body .= "</td>";
            echo "</td>";
            $body .= "</tr>";
            echo "</tr>";
          } // END IF EN DADO CASO QUE LOS CORREOS Y RECIBOS COINCIDAN.
        }  // TERMINO DEL CILO FOR QUE LLENA LA TABLA¿+0


        //}
        $body .= "</table>";
        echo "</table>";
        $body .= "<br>";
        echo "<br>";

        //echo "LEJENDA_NO_VENDIDOS:".$leyenda_no_vendidos.":<br>";
        //echo "NO_VENDIDO:".$no_vendio_nada.":<br>";
        //ECHO "SOLO_VENDIDOS".$solo_vendidos.":_<br>";
        //echo "solo-".$solo_vendidos."<br>";
        //echo "No-".$no_vendio_nada."-<br>";

        if (($solo_vendidos == "SI") and (($fac == 'jjuarez@mortonsubastas.com') or ($fac == 'cpascual@mortonsubastas.com'))) {
          // ----------------------------------------------------------------------------------------------------------------------------------------------

          //echo "Si tiene alguna duda le sugerimos ponerse en contacto con Verónica Bernal al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6883 </a>o vía correo electrónico a <a href='vbernal@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>vbernal@mortonsubastas.com</a><br><br>";
          // Si es subasta de antiguedades imprime para el caso de vendidos
          if ((strpos($nom_subasta_es, "Antigüedades") > 0) || (strpos($nom_subasta_es, "antigüedades") > 0)) {
            // echo "antg";
          } else if ((strpos($nom_subasta_es, "Vinos") > 0) || (strpos($nom_subasta_es, "vinos") > 0)) {
            echo "Si tiene alguna duda le sugerimos ponerse en contacto con Jessica Cazares al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3130</a> o vía correo electrónico a <a href='mailto:jcazares@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>jcazares@mortonsubastas.com</a><br><br>";
          } else {
            echo "Si tiene alguna duda le sugerimos ponerse en contacto con Alejandra Rojas al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6895</a> o vía correo electrónico a <a href='arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@morronsubastas.com</a><br><br>";
          }
        }
        //
        if (($leyenda_no_vendidos == "NO") and ($no_vendio_nada == 1) and  (($fac == 'jjuarez@mortonsubastas.com') or ($fac == 'cpascual@mortonsubastas.com') or ($fac == 'ebonilla@mortonsubastas.com'))) {
          // 01nD
          if ($fac == 'jjuarez@mortonsubastas.com') {
            if ((strpos($nom_subasta_es, "Antigüedades") > 0) || (strpos($nom_subasta_es, "antigüedades") > 0)) {
              echo "
              <p style='text-align:justify; margin-bottom:30px'>
              NOTA IMPORTANTE:
              <br>
              <br>

                  En caso de que usted no desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Daniela Baez
                  al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 5126 o vía correo electrónico a <a href='mailto:dbaez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dbaez@mortonsubastas.com</a>, o con Sofía Hernández al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40</a> ext. 4103 o vía correo electrónico a <a href='mailto:rhernandez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>rhernandez@mortonsubastas.com</a>, Usted cuenta con 4 días hábiles
                  posteriores a la subasta para recogerlos en nuestra sucursal de Monte Athos #179, Lomas de Chapultepec, al 5to día no
                  hay entrega, los lotes serán trasladados a nuestra bodega ubicada en Av. Constituyentes #910, Lomas Altas y los podrá
                  recoger a partir del 6to día, en un horario de lunes a viernes de 9:30 am a 6:00 pm. De no recogerlos dentro de este
                  plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra
                  consideración de acuerdo al contrato de consignación que usted firmó.

              </p>
              ";
            } elseif ((strpos($nom_subasta_es, "Joyería") > 0) || (strpos($nom_subasta_es, "joyería") > 0) || (strpos($nom_subasta_es, "Relojería") > 0)) {
              echo "
            <p style='text-align:justify; margin-bottom:30px'>
            <b>NOTA IMPORTANTE:</b>
            <br>
            <br>
            </p>
            ";
              echo "<p style='text-align:justify'>
            Usted cuenta con 5 días hábiles posteriores a la subasta para recogerlos en nuestra sucursal de
            Monte Athos #179, Lomas de Chapultepec, en un horario de lunes a viernes de 9:30 am a 6:00 pm.
            De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta
            automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato
            de consignación que usted firmó.</p>";

              echo "En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Alejandra Rojas al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6895 </a>o vía correo electrónico a <a href='mailto:arojas@morronsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@morronsubastas.com</a>.</p><br>";
            } else {
              echo "<p style='text-align:justify'>
            Usted cuenta con 4 días hábiles posteriores a la subasta para recoger su(s) lote(s) en nuestra sucursal de Monte Athos #179, Lomas de Chapultepec, el 5to día no hay entrega, los lotes serán trasladados a nuestra bodega ubicada en Av. Constituyentes #910, Lomas Altas y los podrá recoger a partir del 6to día, en un horario de lunes a viernes de 9:30 am a 6:00 pm. ";
              echo "De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";
              echo "En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Verónica Bernal al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6883 </a>o ";
              echo "vía correo electrónico a <a href='vbernal@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>vbernal@mortonsubastas.com</a>.</p><br>";
            }

            $truck = 10;
          }

          // LOTES NO VENDIDOS AM (FINAL)-----------------------------------------------------
          if ($fac == 'ebonilla@mortonsubastas.com') {
            if ((strpos($nom_subasta_es, "Arte Moderno") > 0) || (strpos($nom_subasta_es, "arte moderno") > 0 || (strpos($nom_subasta_es, "Arte Mexicano") > 0))) {

              echo "
              <p><b>NOTA IMPORTANTE:</b></p>
              <br>
              <p style ='text-align:justify'>
                Usted cuenta con 4 días hábiles posteriores a la subasta para recoger su(s) lote(s) en nuestra
                sucursal de Monte Athos #179, Lomas de Chapultepec, el 5to día no hay entrega, los lotes serán
                trasladados a nuestra bodega ubicada en Av. Constituyentes #910, Lomas Altas y los podrá recoger
                a partir del 6to día, en un horario de lunes a viernes de 9:30 am a 6:00 pm. De no recogerlos dentro
                de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta
                ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.
                <br>
                En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto
                con Fernanda Serrano al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6894</a> o vía correo electrónico
                a <a href='mailto:mserrano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mserrano@mortonsubastas.com</a> o con Ana Paula López al <a href='tel:5552833140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3384 </a> o vía correo
                electrónico a <a href='mailto:aplopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>aplopez@mortonsubastas.com</a>.
                <br>
                <br>
              </p>

              ";
            } else {

              echo "<p style='text-align:justify'>Usted cuenta con 4 días hábiles posteriores a la subasta para recoger su(s) lote(s) en nuestra sucursal de Cerro de Mayka #115, Lomas de Chapultepec, el 5to día no hay entrega, los lotes serán trasladados a nuestra bodega ubicada en Av. Constituyentes #910, Lomas Altas y los podrá recoger a partir del 6to día, en un horario de lunes a viernes de 9:30 am a 6:00 pm. ";
              echo "De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";
              echo "En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Diana Álvarez al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 3145 </a>o ";
              echo "vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com</a>.</p><br>";
            }
          }
          if ($fac == 'cpascual@mortonsubastas.com') {




            if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "joyería") > 0)) {
              echo "<p style='text-align:justify'>Usted cuenta con 5 días hábiles posteriores a la subasta para recoger su(s) lote(s) en nuestra sucursal de Monte Athos #179, Lomas de Chapultepec. ";
              echo "De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";
              echo "En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Alejandra Rojas al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 6895 </a>o ";
              echo "vía correo electrónico a <a href='arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a>.</p><br>";
            } else if ((strpos($nom_subasta_es, "Vinos") > 0) || (strpos($nom_subasta_es, "vinos") > 0)) {

              echo "
              <p><b>NOTA IMPORTANTE:</b></p>
              <br>
              <p style='text-align:justify'>En caso de que usted no desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Jessica Cazarez al <a href='tel:+525552833140' style='font-weight: bold; color: #004d43; text-decoration: none'> 55 52 83 31 40</a> ext. 3130 o vía correo electrónico a <a href='mailto:jcazares@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>jcazares@mortonsubastas.com</a>
              <br>
              Usted cuenta con 5 días hábiles posteriores a la subasta para
recogerlos en nuestra sucursal de Monte Athos #179, Lomas de Chapultepec, en un horario de lunes a viernes de 9:30
am a 6:00 pm. De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en
otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.
              </p>";
            } else {
              echo "<p style='text-align:justify'>Usted cuenta con 4 días hábiles posteriores a la subasta para recoger su(s) lote(s) en nuestra sucursal de Cerro de Mayka #115, Lomas de Chapultepec, el 5to día no hay entrega, los lotes serán trasladados a nuestra bodega ubicada en Av. Constituyentes #910, Lomas Altas y los podrá recoger a partir del 6to día, en un horario de lunes a viernes de 9:30 am a 6:00 pm. ";
              echo "De no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";
              echo "En caso de que usted desee que sus lotes sean recontratados, le sugerimos ponerse en contacto con Jaciel López al <a href='tel:55 5283 3140' style='font-weight: bold; color: #004d43; text-decoration: none'>55 52 83 31 40 ext. 5120 </a>o ";
              echo "vía correo electrónico a <a href='jlopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>jlopez@mortonsubastas.com</a>.</p><br>";
            }
          }

          //echo "<ul><b>En caso de que el consignante y/o comprador envíen a un tercero a recoger sus lotes, debemos de solicitar y guardar la siguiente documentación:</b><br><br>";
          echo "<ul><b>¿NECESITA ENVIAR A UN REPRESENTANTE POR LA DEVOLUCIÓN?</b><br><br>";
          echo "Debe presentar la siguiente documentación:<br><br>";
          echo "<li>Carta poder por medio de la cual el consignante o comprador autorice a un tercero a recoger los lotes. En dicha carta se deberán identificar los lotes que estamos entregando (si desea le podemos enviar un machote de la misma).</li>";
          echo "<li>Copia de la identificación del consignante / comprador adjunta a la carta poder.</li>";
          echo "<li>Copia de la Identificación de la persona autorizada para recoger los lotes.</li>";
          echo "</ul>";
          echo "<br>";

          ///echo "<h1>P:".$pagado."</h1>";

          if ($pagado == 1) {
            echo "<ul><b>SI TIENE ALGÚN ADEUDO LAS FORMAS DE PAGO SON LAS SIGUIENTES:</b></ul>";
            echo "1) En efectivo (monto máximo $308,866.20 MN) - directamente en nuestras cajas.<br>";
            echo "2) Cheque - salvo buen cobro a nombre de Morton Subasta S.A. de C.V.<br>";
            echo "3) Paypal - Usar como referencia el correo <a href='mailto:creditoycobranza@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>creditoycobranza@mortonsubastas.com</a> para generar link de pago.<br>";
            echo "4) Tarjeta de crédito y débito - con cargo del 6.6% por uso de tarjeta, directamente en nuestras cajas.<br>";
            echo "5) Transferencia bancaria o depósito en ventanilla o practicaja:<br>";
            echo "</ul>";
            echo "<br>";
            echo   "<b>BBVA Bancomer<br>
                Morton Subastas, S.A. de C.V.</b><br>
                Cuenta 0103807037<br>
                Clabe 0121 8000 1038 0703 75<br>
                Una vez realizado el pago, favor de enviar comprobante de pago a:<br>
                <a href='mailto:creditoycobranza@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>creditoycobranza@mortonsubastas.com </a><br><br>";
          }
        }


        /* ---  ESTE ES EL FINAL, LO QUE VA AL TERMINO DEL DESGOLOSE DE LOS PRODUCTOS   */

      $body .= "<div class='row' style='margin-top:80px;'>
                  <div class='col-md-3'>
                    <a href='https://mortonsubastas.com/informacion/pago.php' TARGET='_BLANK'>
                      <img src='imagenes/pago_button.png'>
                    </a>
                  </div>
                  <div class='col-md-3'>
                    <a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
                      <img src='imagenes/fact_button.png'>
                    </a>
                  </div>
                  <div class='col-md-3'>
                    <a href='https://mortonsubastas.com/informacion/recoleccion.php' TARGET='_BLANK'>
                      <img src='imagenes/recoleccion_button.png'>
                    </a>
                  </div>
                  <div class='col-md-3'>
                    <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                      <img src='imagenes/aviso_privacidad_button.png'>
                    </a>
                  </div><br><br>";

        echo "<div class='row' style='margin-top:80px;'>
                <div class='col-md-3'>
                  <a href='https://mortonsubastas.com/informacion/pago.php' TARGET='_BLANK'>
                    <img src='imagenes/pago_button.png'>
                  </a>
                </div>
                <div class='col-md-3'>
                  <a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
                    <img src='imagenes/fact_button.png'>
                  </a>
                </div>
                <div class='col-md-3'>
                  <a href='https://mortonsubastas.com/informacion/recoleccion.php' TARGET='_BLANK'>
                    <img src='imagenes/recoleccion_button.png'>
                  </a>
                </div>
                <div class='col-md-3'>
                <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                  <img src='imagenes/aviso_privacidad_button.png'>
                </a>
                </div><br><br>";

        $body .= "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
        echo "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
        $body .= "Saludos cordiales.<br><br>";
        echo "Saludos cordiales.<br><br>";


        require_once("../Controlador/controladorUsuarios.php");
        require_once("../Modelo/modeloUsuarios.php");
        //echo "<br>VISTA: envia controlador";
        $all_AnUser = ControladorUsuarios::SearchUser($fac);
        //var_dump($all_AnUser['usu_rol']);

        echo '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
  							<tr>
    							<td width="200" align="right" valign="top">
      							<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
    							</td>
    							<td align="left" valign="top" style="padding: 0px 10px;">
      							<p>
        								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>' . $all_AnUser['usu_nombre'] . '</strong></font>
        								<br />
        								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >' . $all_AnUser['puesto100'] . '</font>
        								<br />
        								<br />
        								<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
          								<strong><font color="#384845">(55) 5283 3140 ext. ' . $all_AnUser['ext20'] . '</font></strong>
        								</font>
        								<br />
          							<font face="Helvetica, Geneva, sans-serif" color="#384845" style="font-size:12px;">
            								<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none">www.mortonsubastas.com</a>
          							</font>
      							</p>
    							</td>
  							</tr>
							</table>';
        $body .=  '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
								<tr>
									<td width="200" align="right" valign="top">
										<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
									</td>
									<td align="left" valign="top" style="padding: 0px 10px;">
										<p>
											<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>' . $all_AnUser['usu_nombre'] . '</strong></font><br />
											<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >' . $all_AnUser['puesto100'] . '        </font>
											<br />
											<br />
											<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
												<strong><font color="#384845">(55) 5283 3140 ext. ' . $all_AnUser['ext20'] . '</font></strong>
											</font>
											<br />
											<font face="Helvetica, Geneva, sans-serif" color="#384845" style="font-size:12px;">
												<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none">www.mortonsubastas.com</a>
											</font>
										</p>
									</td>
								</tr>
							</table>';

        //$body .= "<b>Morton Subastas</b>";
        //echo "<b>Morton Subastas</b>";
        $body .= "</p>";
        echo "</p>";
        $body .= "<hr style='border: 1px solid #004d43; margin: 40px auto;'>";
        echo "<hr style='border: 1px solid #004d43; margin: 40px auto; opacity: 1'>";

        $body .= "<p style='text-align: center; font-size:14px'>";
        echo "<p style='text-align: center; font-size:14px'>";
        $body .= "<img src='imagenes/ms_caballo_negro.png' alt='' style='width: 50%;'><br><br>";
        echo "<img src='imagenes/ms_caballo_negro.png' alt='' style='width: 50%;'><br><br>";
        if ($_POST['radio'] == 'Mayka') {
          $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
          echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
        }
        if ($_POST['radio'] == 'Constituyentes') {
          $body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
          echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
        }

        $body .= "<a href='https://www.facebook.com/mortonsubastas'> <img src='imagenes/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        echo "<a href='https://www.facebook.com/mortonsubastas'> <img src='imagenes/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        $body .= "<a href='https://www.instagram.com/mortonsubastas/'>";
        echo "<a href='https://www.instagram.com/mortonsubastas/'>";
        $body .= "<img src='imagenes/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        echo "<img src='imagenes/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        $body .= "<a href='https://twitter.com/mortonsubastas'>";
        echo "<a href='https://twitter.com/mortonsubastas'>";
        $body .= "<img src='imagenes/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        echo "<img src='imagenes/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        $body .= "<a href='https://www.youtube.com/user/MortonSubastas'>";
        echo "<a href='https://www.youtube.com/user/MortonSubastas'>";
        $body .= "<img src='imagenes/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        echo "<img src='imagenes/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
        $body .= "</p>";
        echo "</p>";
        $body .= "</div>";
        echo "</div>";
        $body .= "</body>";
        echo "</body>";
        $body .= "</html>";
        echo "</html>";


        //echo $body;

        // $mail->isHTML(true);

        //$mail->Body = "".$body."";
        //$mail->Body = "BODDYYYY";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //echo "antes de enviar";
        //$mail->CharSet = 'UTF-8';
        //$mail->send();                                                        //When I want to send a email
        //echo 'Mensaje se envio correctamente';

      } //  TERMINO DEL IF PRINCIPAL   // 

      // AQUI DESPUES DE LA TABLA
      // }

  
    }      /****    TERMINO DEL CICLO FOR PRINCIPAL QUE HACE TODO EL PROCESO */

    if (($fac == "cpascual@mortonsubastas.com") or ($fac == "msanchez@mortonsubastas.com") or ($fac == "jjuarez@mortonsubastas.com")) {
      echo "<br><br><br><hr>";

      echo "<form  class='col-lg-12 id='ItemNotSells2' name='ItemNotSells2' method='post' action='AuctionDoes2'>";
      echo "<center>";
      echo "<table border='1' width='70%'>IF";
      echo "<tr>";
      echo "inicio<input type='text' id='inicio' name='inicio' value='0'><br>";
      echo "fin<input type='text' id='fin' name='fin' value='" . $cuantos_correos . "'><br>";
      echo "<input type='hidden' id='subasta' name='subasta' value='" . $sub . "'>";
      echo "<input type='hidden' id='nom_subasta' name='nom_subasta' value='" . $nom_subasta_es . "'>";
      echo "<input type='hidden' id='llega_de' name='llega_de' value='prueba'>";
      echo '<button type="button" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1" onclick="preguntar2()">PRUEBA</button>';
      echo "</td>";
      echo "<tr>";
      echo "</table>";
      echo "</center>";
      echo "</form>";
    } else {
      if ($fac != 'jjuarez@mortonsubastas.com') {
        echo "<br>";
        echo "<form  class='col-lg-12 id='ItemNotSells2' name='ItemNotSells2' method='post' action='AuctionDoes2'>";
        echo "<center>";
        echo "<table border='1' width='70%'>ELSE";
        echo "<tr>";
        echo "<td><h1>DESEA ENVIAR LOS CORREOS_</h1><br><br>";
        echo "<input type='hidden' id='subasta' name='subasta' value='" . $sub . "'>";
        echo "inicio<input type='text' id='inicio' name='inicio'><br>";
        echo "fin<input type='text' id='fin' name='fin'><br>";
        echo "<input type='hidden' id='nom_subasta' name='nom_subasta' value='" . $nom_subasta_es . "'>";
        echo '<button type="button" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1" onclick="preguntar2()">Enviar</button>';
        echo "</td>";
        echo "<tr>";
        echo "</table>";
        echo "</center>";
        echo "</form>";
        echo "<br><br>";
      }
    }
  } catch (Exception $e) {
    echo "Hubo un  Error: {$mail->ErrorInfo}";
  }
  //</html>

}

?>