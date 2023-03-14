<script type="text/javascript">


function preguntar(){

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


function preguntar2(){

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
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'Phpmailer/Exception.php';
  require 'Phpmailer/PHPMailer.php';
  require 'Phpmailer/SMTP.php';
  $mail = new PHPMailer(true);

	session_start();
	$fac = $_SESSION['email'];


	if(($fac != '')){




    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'msanchez@mortonsubastas.com';
    $mail->Password = 'ManeMorton';
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom($fac,'Morton Subastas');
    $mail->addBCC($fac, 'Morton Subastas');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'RESULTADO DE SUBASTA ';

    include "head.php";
    include "aside.php";
    //$mail = new PHPMailer(true);

    try {
      require_once ("../Controlador/controladorHistorial.php");
      require_once ("../Modelo/modeloHistorial.php");

      $folio_r = $_GET['folio'];
      $search_AllCFDI =  controladorHistorial::ctrlSpecificHistorial($folio_r);
      //var_dump($search_AllCFDI);

      //$correo_envia = "manalesanvar@mortonsubastas.com";
      //echo "*".$correo_envia."*<br>";
      //$mail->addAddress($correo_envia, 'FACTURA XML Y PDF');

        $body =  "<!DOCTYPE html>";
        //echo "<!DOCTYPE html>";
        $body .= "<html>";
        //echo "<html>";
        $body .= "<head>";
        //echo "<head>";
        $body .= "<meta charset='UTF-8'>";
        //echo "<meta charset='UTF-8'>";
				$body .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
				//echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
				$body .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
 				//echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $body .= "<title>Gracias por su compra en Morton Subastas</title>";
        //echo "<title>Gracias por su compra en Morton Subastas</title>";
        $body .= "</head>";
        //echo "</head>";
        $body .= "<body style='background: #f6f8f9'>";
        //echo "<body style='background: #f6f8f9'>";
        $body .= "<div style='max-width: 700px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        //echo "<div style='max-width: 700px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        $body .= "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
        //echo "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
        $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
        //echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
        //$body .=  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
        //echo  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
        $body .= "<p style='line-height: 1.6; font-size: 14px'>";
        //echo "<p style='line-height: 1.6; font-size: 14px'>";
				//var_dump($variable2);
        foreach ($search_AllCFDI as $key => $value){
        //$body .= "-".$value["correo_e30"]."-<br>";
        $mail->addAddress($value["correo_e30"], 'FACTURA XML Y PDF');
        $body .= "<font face='Helvetica, serif'><b>".$value["cfdiclinom"]."</b>";
        $body .= "<br>";
        $body .= "Presente:";
        $body .= "<br><br>";
        $body .= "<p style='text-align:justify'>Dando seguimiento a su solicitud, me permito enviarle su factura generada por la comisión de su participación en nuestra subasta <b>".$value["subasta"]."</b> con el número de paleta <b>".$value["paleta"]."</b>.";
        $body .= "<br><br>";
        $body .= "Así mismo le recordamos que en todas las subastas que participe, en caso de requerir comprobante fiscal, deberá notificarnos con tiempo al siguiente correo electrónico facturacion@mortonsubastascom, o de lo contrario Morton Subastas, S.A. de C.V., elaborará una factura a Público en General.";
        $body .= "<br><br>";
        $body .= "Si tiene alguna duda, favor de ponerse en contacto con Anahí Moran al 55 52 83 31 40 ext. 3410 o vía correo electrónico a facturacion@mortonsubastascom.";
      }

				$body .= "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
				//echo "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
				$body .= "Saludos cordiales.<br><br>";
        $body .= "</p></font>";
				//echo "Saludos cordiales.<br><br>";

				require_once ("../Controlador/controladorUsuarios.php");
				require_once ("../Modelo/modeloUsuarios.php");
				//echo "<br>VISTA: envia controlador";
				$all_AnUser = ControladorUsuarios::SearchUser($fac);
				//var_dump($all_AnUser['usu_rol']);

        /*
				echo '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
  							<tr>
    							<td width="200" align="right" valign="top">
      							<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
    							</td>
    							<td align="left" valign="top" style="padding: 0px 10px;">
      							<p>
        								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>'.$all_AnUser['usu_nombre'].'</strong></font>
        								<br />
        								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >'.$all_AnUser['puesto100'].'</font>
        								<br />
        								<br />
        								<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
          								<strong><font color="#384845">(55) 5283 3140 ext. '.$all_AnUser['ext20'].'</font></strong>
        								</font>
        								<br />
          							<font face="Helvetica, Geneva, sans-serif" color="#384845" style="font-size:12px;">
            								<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none">www.mortonsubastas.com</a>
          							</font>
      							</p>
    							</td>
  							</tr>
							</table>';
              */
				$body .=  '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
								<tr>
									<td width="200" align="right" valign="top">
										<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
									</td>
									<td align="left" valign="top" style="padding: 0px 10px;">
										<p>
											<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>'.$all_AnUser['usu_nombre'].'</strong></font><br />
											<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >'.$all_AnUser['puesto100'].'        </font>
											<br />
											<br />
											<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
												<strong><font color="#384845">(55) 5283 3140 ext. '.$all_AnUser['ext20'].'</font></strong>
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
      	//echo "</p>";
      	$body .= "<hr style='border: 1px solid #004d43; margin: 40px auto;'>";
      	//echo "<hr style='border: 1px solid #004d43; margin: 40px auto; opacity: 1'>";

	    	$body .= "<p style='text-align: center; font-size:14px'>";
      	//echo "<p style='text-align: center; font-size:14px'>";
      	$body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
      	//echo "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
      	$body .= "<b>Morton Subastas</b> <br><br>";
      	//echo "<b>Morton Subastas</b> <br><br>";
				if ($_POST['radio'] == 'Mayka'){
						$body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
						//echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
				}
				if ($_POST['radio'] == 'Constituyentes'){
						$body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
						//echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
				}

      	$body .= "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/images/iconos_sociales/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	//echo "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/images/iconos_sociales/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	$body .= "<a href='https://www.instagram.com/mortonsubastas/'>";
      	//echo "<a href='https://www.instagram.com/mortonsubastas/'>";
      	$body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	//echo "<img src='https://mortonsubastas.com/images/iconos_sociales/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	$body .= "<a href='https://twitter.com/mortonsubastas'>";
      	//echo "<a href='https://twitter.com/mortonsubastas'>";
      	$body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	//echo "<img src='https://mortonsubastas.com/images/iconos_sociales/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	$body .= "<a href='https://www.youtube.com/user/MortonSubastas'>";
      	//echo "<a href='https://www.youtube.com/user/MortonSubastas'>";
      	$body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	//echo "<img src='https://mortonsubastas.com/images/iconos_sociales/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      	$body .= "</p>";
      	//echo "</p>";
      	$body .= "</div>";
      	//echo "</div>";
      	$body .= "</body>";
      	//echo "</body>";
				$body .= "</html>";
      	//echo "</html>";

        echo $body;


        $mail->Body = "".$body."";
        $path = '../files/1/cfdi/'.$folio_r.".xml";
        $mail->AddAttachment($path); //Adds an attachment from a path on the filesystem
        $path2 = '../files/1/pdf/'.$folio_r."T.pdf";
        $mail->AddAttachment($path2); //Adds an attachment from a path on the filesystem

        //$mail->Body = "BODDYYYY";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //echo "antes de enviar";
        $mail->CharSet = 'UTF-8';
        $mail->send();
        //echo 'Correo electrónico se envio correctamente_sin send('.$cuantos.')';
        echo 'Correo electrónico se envio correctamente con adjunto XML y PDF';
        //unset($mail);
        $mail->ClearAddresses();
        /**/

			} catch (Exception $e) {
				echo "Hubo un  Error: {$mail->ErrorInfo}";
			}
			//</html>

}

?>
