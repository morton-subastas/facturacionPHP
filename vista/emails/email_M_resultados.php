
	<?php
	include '../funciones_RFC.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../Phpmailer/Exception.php';
  require '../Phpmailer/PHPMailer.php';
  require '../Phpmailer/SMTP.php';


	$fac = 'masv0104@yahoo.com.mx';
	if(($fac != '')){
    include "/head.php";
    include "/aside.php";
    $mail = new PHPMailer(true);

    try {
				$Host = "localhost";
				$User = "root";
				$Password = "h0rKm8dEwHZz";
				$DataBase = "timbrado";
				$conexion = mysqli_connect($Host,$User,$Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");

        //echo "llegaA";
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'msanchez@mortonsubastas.com';                 	    //SMTP username
        $mail->Password   = 'ManeMorton';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


				$sql_search_emails = "SELECT * FROM `c_email` WHERE `estatus`='ACTIVO'";

				$resultado_search_emails = mysqli_query($conexion, $sql_search_emails);
				while($fila_search_emails = mysqli_fetch_array($resultado_search_emails)){
					if ($fila_search_emails['rol'] == 'PRI'){
						$email_get = $fila_search_emails['email'];
						//echo "PRI!".$email_get."!<br>";
						$mail->setFrom($email_get);
		        $mail->addAddress($email_get);
					}
					if ($fila_search_emails['rol'] == 'CC'){
						$email_get = $fila_search_emails['email'];
						//echo "CC!!".$email_get."!!<br>";
						$mail->addCC($email_get);
					}
				}
				//echo "imprimir+".$mail."+";
        //Recipients
        //OK $mail->setFrom('msanchez@mortonsubastas.com', 'CORREO');
        //OK $mail->addAddress('msanchez@mortonsubastas.com', 'CORREO');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Asunto muy importante';

        //$conn = new mysqli("localhost", "root", "99HHxhdnhM6D", "timbrado");



        $fin = trim($_POST['finaliza']);
        $var = 'correo'.$fin;
        $cor = trim($_POST[$var]);
        $emp = trim($_POST['empieza']);
        $fin = trim($_POST['finaliza']);
        $sub = trim($_POST['subasta']);
		    $Ya = $_POST['Yano'];  //ON YA NO SE OFRECERA
				$fin = 0;	$var = "correo0"; $cor = 'siquebal@me.com';	$emp = 0; $fin = 0; $sub = 1066; $ya = '';

	      //echo "<b>Contraro-".$con."-Partida-".$par."-Paleta-".$pal."-Descripcion-".$des."-<br>";
	      //echo "-Reserva-".$res."-Ofrece-".$ofr."-Nombre-".$nom."-Correo-".$cor."<br>";
        //echo "Cor:".$cor."-Empieza:".$emp."-Finaliza:".$fin."-Subasta:".$sub."<br>";
        //echo "-Subasta-".$sub."-Empieza -".$emp."- y Finaliza -".$fin."-Ya:".$Ya."-</b>";

	      $variable = getEmail ($sub);
	      $cuantos  = count($variable);
        $suma = 0;
	      $contador = $suma + 1;
	      $temporal = 0;

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
        $body .= "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
        echo "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
        $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
        echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
        //$body .=  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
        //echo  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
        $body .= "<p style='line-height: 1.6; font-size: 14px'>";
        echo "<p style='line-height: 1.6; font-size: 14px'>";
			  $nombre = $variable[$emp]["firstname"]." ".$variable[$emp]["lastname"];

        echo "<font face='Times, serif', size='5'>".$nombre." <br>Presente<br><br><p style='text-align:justify'>Dándole seguimiento a su contrato, verá adjunto a ";
        echo "este correo un archivo con la información correspondiente a los resultados de venta obtenidos durante de la Subasta. ";
        echo "En el cuerpo del correo verá los pasos a seguir en caso de que sus lotes se hayan vendido y qué hacer.</p><br>";

        echo "<p style='text-align:justify'><b>LOTES NO VENDIDOS</b><br><br>";
        echo "Por favor considere lo siguiente:<br>";
				echo "<ul>";
					echo"<li><p style='text-align:justify'>El pago podrá ser programado a partir del segundo lunes posterior a la fecha en la que se llevó a cabo la subasta (siempre y cuando el comprador haya liquidado la compra).</p></li>";
					echo "<li><p style='text-align:justify'>Si solicitó comprobante de retención de impuestos (ISR), favor de ponerse en contacto con Sonia López al teléfono 55 5283 3140 ext. 3396 o vía correo electrónico a slopez@mortonsubastas.com</p></li>";
					echo "<li><p style='text-align:justify'>También puede ingresar a 'Mi Morton' en www.mimorton.com, una plataforma creada especialmente para nuestros consignantes y compradores, en la que podrá conocer el estatus e historial de sus piezas y el precio total de venta o compra.</p></li>";
					echo "<li><p style='text-align:justify'>Crear una cuenta en esta plataforma es muy fácil, sólo es necesario su nombre, correo electrónico y número de cliente (este número lo puede localizar en el archivo adjunto). Si requiere asesoría, puede comunicarse con nosotros al 55 5283 3140 y con gusto lo atenderemos.</p></li>";
				echo "</ul><br><br>";
        echo "<b>LOTES VENDIDOS</b><br><br>";
        echo "Por favor considere lo siguiente:<br>";
				echo "<ul>";
					echo "<li><p style='text-align:justify'>Algunos lotes no vendidos, podrán recontratarse para próximas subastas.</p></li>";
					echo "<li><p style='text-align:justify'>En caso de que no desee que sus lotes sean recontratados, o ya no califiquen para participar en subastas futuras, cuenta con 5 días hábiles posteriores a la subasta para recogerlos (para así no generar cargos adicionales por almacenaje). En caso de no recogerlos dentro de este plazo, Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.</p></li>";
					echo "<li><p style='text-align:justify'>Le sugerimos ponerse en contacto con Mariana Ramírez al 55 5283 3140 ext. 4110 o vía correo electrónico a (mramirez@mortonsubastas.com) para darle a conocer la ubicación exacta de sus piezas, ya que, por cuestiones internas de logística, podrían ser trasladadas a otra ubicación.</p></li><br>";
				echo "</ul><br>";
				echo "<p style='text-align:justify'>El horario de entrega de piezas es Lunes a Viernes de 9:30 a.m.-6:00 p.m.<br><br>";
        echo "Quedo a su disposición en caso de que tenga cualquier duda o comentario.<br><br>";
				echo "¡Le agradecemos su participación en nuestra subasta!</p><br>";
        $body .= "Saludos y que tenga un excelente día.<br><br>";
        echo "Saludos y que tenga un excelente día.<br><br>";

      //$body .= "<b>Morton Subastas</b>";
      //echo "<b>Morton Subastas</b>";
      $body .= "</p>";
      echo "</p>";
      $body .= "<hr style='border: 1px solid #004d43; margin: 40px auto;'>";
      echo "<hr style='border: 1px solid #004d43; margin: 40px auto; opacity: 1'>";

	    $body .= "<p style='text-align: center; font-size:14px'>";
      echo "<p style='text-align: center; font-size:14px'>";
      $body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
      echo "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
      $body .= "<b>Morton Subastas</b> <br><br>";
      echo "<b>Morton Subastas</b> <br><br>";
      $body .= "<a href='https://www.google.com.mx/maps/place/Morton+Subastas,+S.A+de+C.V./@19.4203164,-99.2108655,18z/data=!4m5!3m4!1s0x85d21ce7601f431d:0x757f8eea0d77d45f!8m2!3d19.4205626!4d-99.2110705'> Monte Athos 179, Ciudad de México </a><br><br>";
      echo "<a href='https://www.google.com.mx/maps/place/Morton+Subastas,+S.A+de+C.V./@19.4203164,-99.2108655,18z/data=!4m5!3m4!1s0x85d21ce7601f431d:0x757f8eea0d77d45f!8m2!3d19.4205626!4d-99.2110705'>Monte Athos 179, Ciudad de México </a><br><br>";
      $body .= "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/images/iconos_sociales/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      echo "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/images/iconos_sociales/facebook.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      $body .= "<a href='https://www.instagram.com/mortonsubastas/'>";
      echo "<a href='https://www.instagram.com/mortonsubastas/'>";
      $body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      echo "<img src='https://mortonsubastas.com/images/iconos_sociales/instagram.png' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      $body .= "<a href='https://twitter.com/mortonsubastas'>";
      echo "<a href='https://twitter.com/mortonsubastas'>";
      $body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      echo "<img src='https://mortonsubastas.com/images/iconos_sociales/twitter.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      $body .= "<a href='https://www.youtube.com/user/MortonSubastas'>";
      echo "<a href='https://www.youtube.com/user/MortonSubastas'>";
      $body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
      echo "<img src='https://mortonsubastas.com/images/iconos_sociales/youtube.png' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
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

      $mail->Body = "".$body."";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->CharSet = 'UTF-8';
      //$mail->send();
      echo 'Mensaje se envio correctamente';

} catch (Exception $e) {
echo "Hubo un  Error: {$mail->ErrorInfo}";
}
//</html>
}
