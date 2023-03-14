
	<?php
	include '../funciones_RFC.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../Phpmailer/Exception.php';
  require '../Phpmailer/PHPMailer.php';
  require '../Phpmailer/SMTP.php';

	session_start();
	$fac = $_SESSION['email'];
	//echo "<b>USU:*".$fac."*</b>";
	if(($fac != '')){
    include "/head.php";
    include "/aside.php";
    $mail = new PHPMailer(true);

    try {
				//echo "entra";
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
				//echo $sql_search_emails;
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
				//echo "---";
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

				$fin = 0;	$var = "correo0"; $cor = 'siquebal@me.com';
				$emp = 0; $fin = 0; $sub = 1066; $ya = '';

				//echo "linea-98:".$sub."-";
	      //echo "<b>Contraro-".$con."-Partida-".$par."-Paleta-".$pal."-Descripcion-".$des."-<br>";
	      //echo "-Reserva-".$res."-Ofrece-".$ofr."-Nombre-".$nom."-Correo-".$cor."<br>";
        //echo "Cor:".$cor."-Empieza:".$emp."-Finaliza:".$fin."-Subasta:".$sub."<br>";
        //echo "-Subasta-".$sub."-Empieza -".$emp."- y Finaliza -".$fin."-Ya:".$Ya."-</b>";

	      $variable = getEmail ($sub);
	      $cuantos  = count($variable);
				//echo "linea 105-".$cuantos."-";
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

				$body .= "<font face='Helvetica', size='5'>".$nombre."<br>Presente<br><br><p style='text-align:justify'>Dando seguimiento a los lotes no vendidos de su contrato número ".$sub." le informamos ";
        echo "<font face='Helvetica', size='5'> ".$nombre."<br>Presente<br><br><p style='text-align:justify'>Dando seguimiento a los lotes no vendidos de su contrato número ".$sub." le informamos ";
				$body .= "que es necesario pase a recogerlo(s) a más tardar el día ______________ de 2022. En caso de no tener respuesta dentro del tiempo señalado, de acuerdo al contrato de prestación ";
        echo "que es necesario pase a recogerlo(s) a más tardar el día ______________ de 2022. En caso de no tener respuesta dentro del tiempo señalado, de acuerdo al contrato de prestación ";
        $body .= "de servicios que firmó con nosotros, se generarán gastos de almacenamiento y Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando ";
        echo "de servicios que firmó con nosotros, se generarán gastos de almacenamiento y Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando ";
        $body .= "el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";
        echo "el precio a nuestra consideración de acuerdo al contrato de consignación que usted firmó.<br><br>";

        $body .= "Le sugerimos ponerse en contacto con Srta. Mariana Ruíz al 55 5283 3140 ext. 4110 o vía correo electrónico (mramirez@mortonsubastas.com) para darle a conocer ";
        echo "Le sugerimos ponerse en contacto con Srta. Marian Ruíz al 55 5283 3140 ext. 4110 o vía correo electrónico (mramirez@mortonsubastas.com) para darle a conocer ";
        $body .= "la ubicación exacta de sus piezas, ya que, por cuestiones internas de logística, podrían ser ubicadas en Av. Constituyentes # 910 Col. Lomas Altas o ";
        echo "la ubicación exacta de sus piezas, ya que, por cuestiones internas de logística, podrían ser ubicadas en Av. Constituyentes # 910 Col. Lomas Altas o ";
        $body .= "en Cerro de Mayka 115. El horario de recolección es el siguiente: lunes a viernes de 9:30 am a 6:00pm.</p><br><br>";
        echo "en Cerro de Mayka 115. El horario de recolección es el siguiente: lunes a viernes de 9:30 am a 6:00pm.</p><br><br>";
				/**/
        $body .=	"<table style='margin: 5px auto; font-size: 16px;'>";
        echo "<table style='margin: 5px auto; font-size: 16px;'>";
			  $body .=	"<tr>";
        echo	"<tr>";
				$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
        echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
				$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Contrato</center></th>";
        echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Contrato</center></th>";
				$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Partida</center></th>";
        echo	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Partida</center></th>";
				$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Subasta</center></th>";
        echo	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Subasta</center></th>";
        $body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Fecha</center></th>";
        echo	"<th style='padding: 15px;background: #004d43; color: #fff'><center>Fecha</center></th>";
        $body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Ubicacion</center></th>";
        echo	"<th style='padding: 15px;background: #004d43; color: #fff'><center>Ubicacion</center></th>";
				$body .=	"</tr>";
        echo "</tr>";
        while ($emp <= $fin) {
          //echo "<b>".$emp.")entro:-".$ofr."-</b><br>";

          $CON_R = trim($variable[$emp]["receipt"]);
          $PAR_R = trim($variable[$emp]["item"]);
          $lot_RFC = substr($variable[$emp]["salelot"],5,12);
          $PAL_R = trim($lot_RFC);

          $EMA_R = trim($variable[$emp]["email"]);
            /*if ($conn->connect_error) {
              die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
              $resultado = "ERROR";
            }
            else{*/
              $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='".$CON_R."' and `partida`='".$PAR_R."' and `paleta`='".$PAL_R."' and `correo`='".$cor."'";
              //echo "SQL<br>".$sql."<br>";

	            $resultado=mysqli_query($conexion, $sql);
              $numero_filas = mysqli_num_rows($resultado);
              //echo "numero".$numero_filas;
	            //while($lista=mysqli_fetch_array($resultado)){
						    //    ECHO "<option value='".$lista['genero']."'>".$lista['genero']."</option>";
					    //}

              //$result = $conn->query($sql);
              //echo "RES".$result."<br>";              //var_dump($result);
              //$cuenta = $result->num_rows; //echo "cuenta".$result->num_rows."<br>";

              //while ($fila = $result->fetch_assoc()){
              while($fila=mysqli_fetch_array($resultado)){
                //echo "fila:".var_dump($fila)."<br><br>";  //echo $fila["ofrece"]."<br>";
                $query = "UPDATE `emailenviados` SET `status` = 'ENVIADO' WHERE `contrato` = '".$CON_R."' AND `partida` = '".$PAR_R."' AND `paleta` ='".$PAL_R."' AND `correo` = '".$cor."'";
                //echo "update:".$query."<br>";
                //$result = $conn->query($query);
                $result=mysqli_query($conexion, $query);

                $body .=  "<tr>";
                echo "<tr>";
                $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>".substr($variable[$emp]["salelot"],5,12)."</center></td>";
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>".substr($variable[$emp]['salelot'],5,12)."</center></td>";
                $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>".$variable[$emp]["descript"]."</center></td>";
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>".$variable[$emp]['descript']."</center></td>";
                $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$".$variable[$emp]["reserve"]." MXN</center></td>";
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$".$variable[$emp]['reserve']." MXN</center></td>";
                $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$".$fila["ofrece"]." MXN</center></td>";
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$".$fila['ofrece']." MXN</center></td>";
                $img = $variable[$emp]["pictpath"];
                //echo "IMG*".$img."*<br>";
                $valor = "/";
                $este = "\ ";

                $este = trim($este);
                $cambio = str_replace($este,$valor,$img);
                $cambio = str_replace("p:/","",$cambio);
                //echo "IMG2-".$cambio."<br>";
                $body .= "<td style='padding: 15px; border-top: 2px solid #004D43;'><img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'></td>";
                echo "<td style='padding: 15px; border-top: 2px solid #004D43;'><img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'></td>";

                $body .= "</tr>";
                echo "</tr>";
                //break;
              }
              $cuenta = $cuenta - 1;
              //echo "C:".$cuenta;
              //echo "sale";
              //$conn->close();
            //}

					$emp = $emp + 1;
          //echo "llega aqui";
				}


			$body .= "</table>";
      echo "</table>";
			$body .= "<br>";
      echo "<br>";

			$body .= "<p style='text-align:justify'>Por favor no deje de revisar nuestros Términos y Condiciones, quedamos atentos en caso de que tenga cualquier duda o comentario.</p><br> ";
      echo "<p style='text-align:justify'>Por favor no deje de revisar nuestros Términos y Condiciones, quedamos atentos en caso de que tenga cualquier duda o comentario.</p><br> ";
			$body .= "Saludos y que tenga un excelente día.<br><br>";
      echo "Saludos y que tenga un excelente día.<br><br>";


      $body .= "Administrativo de contratos<br>";
      echo "Administrativo de contratos<br>";
      $body .= "(firma institucional)<br><br>";
      echo "(firma institucional)<br><br>";

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
?>
