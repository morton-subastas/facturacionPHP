
	<?php

	include 'funciones_RFC.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Phpmailer/Exception.php';
	require 'Phpmailer/PHPMailer.php';
	require 'Phpmailer/SMTP.php';

	//echo "funciones<br>";
	session_start();
	$fac = $_SESSION['email'];

	$sub = trim($_POST['subasta']);
	$fecha_subasta = trim($_POST['fecha']);
	$nom_subasta_es = trim($_POST['nombre_sub']);
	$nom_subasta_es = str_replace(".", "", $nom_subasta_es);
	$llega_de = trim($_POST['llega_de']);
	//echo "llega".$llega_de."<br>";
	//echo "FECHA".substr($dia,0,2)."/".$mes."/".$ano."<br>";
	//echo "SUB-".$sub."-";
	if (($fac != '')) {
		include "head.php";
		include "aside.php";
		$mail = new PHPMailer(true);

		try {
			//$correos_prueba = Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",
			//"masv0104@yahoo.com.mx","morenita.jira@gmail.com","marco01n1@gmail.com","rcerecedo@mortonsubastas.com", "rperusquia@mortonsubastas.com","avilla@mortonsubastas.com");

			//$correos_prueba = Array("msanchez@mortonsubastas.com","rcerecedo@mortonsubastas.com", "avilla@mortonsubastas.com");
			//$correos_prueba = Array("","","","","","","","","","msanchez@mortonsubastas.com","rcerecedo@mortonsubastas.com", "avilla@mortonsubastas.com");

			//Server settings
			$mail->SMTPDebug = 0;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication

			switch ($fac) {
				case 'ebonilla@mortonsubastas.com':
					$mail->Username = 'ebonilla@mortonsubastas.com';
					$mail->Password = 'ClubAmerica10';
					$envia_correo = 'Edgar Bonilla';
					break;
				case 'mjimenez@mortonsubastas.com':
					$mail->Username = 'mjimenez@mortonsubastas.com';
					$mail->Password = 'tenmisericordia';
					$envia_correo = 'Miriam Jiménez Rangel';
					break;
				case 'msanchez@mortonsubastas.com':
					$mail->Username = 'msanchez@mortonsubastas.com';
					$mail->Password = 'ManeMorton';
					break;
				case 'cpascual@mortonsubastas.com':
					$mail->Username = 'cpascual@mortonsubastas.com';
					$mail->Password = 'perales246';
					$envia_correo = 'Cristian Pascual';
					break;

				case 'jjuarez@mortonsubastas.com':
					$mail->Username = 'jjuarez@mortonsubastas.com';
					$mail->Password = 'ISHTAR15';
					$envia_correo = 'Joel Juarez';
					break;

				default:
					// code...
					break;
			}


			$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			$mail->setFrom($fac, $envia_correo);
			$mail->addBCC($fac, $envia_correo);

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Notificación previa a Subasta ' . $sub . '';

			$variable = getEmailCliente_Notificaciones($sub);
			$cuantos  = count($variable);
			//echo "cuantos:".$cuantos."-<br>";
			//var_dump($variable);
			//$cuantos = 3;
			$variable2 = getEmailCliente_NotificacionesDatos($sub);
			//$variable2 = getEmailCliente_Notificaciones($sub);
			$cuantos2 = count($variable2);
			//echo "cuantos2:".$cuantos2."-<br>";
			//var_dump($variable2);
			echo "<center><H1>NOTIFICACIONES PREVIAS A SUBASTA</H1></center>";
			for ($a = 0; $a <= $cuantos; $a++) {
				if ((trim($variable[$a]["email"]) != "")) {
					$cuantos_correos = $cuantos_correos + 1;
				}
			}
			//echo "llega".$cuantos_correos."<br>";
			//echo "sub-".$sub."-<br>";
			//$cuantos=50;
			$inicio = $_POST["inicio"];
			$cuantos = $_POST["fin"];
			for ($i = $inicio; $i <= $cuantos; $i++) {

				//if($i != 94){
				$corr = $variable[$i]["email"];
				$con1 = $variable[$i]["receipt"];
				//}
				//echo $i.")".$corr."-".$cuantos."<br>";
				if ((trim($corr) != '')) {
					//echo $i."*)".$corr."<br>";
					$encabezado = 0;
					echo "<br><h1>SE ENVIARÁ <b>-" . trim($corr) . "-</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $i . " de " . $cuantos_correos . "<br></h1><br>";
					$correo_envia = $variable[$i]['email'];
					//$correo_envia = 'masv0104@yahoo.com.mx';
					//$o = $i;
					//$correo_envia = $correos_prueba[$o];
					//echo "SIMULA CORREO ENVIO: <b>".$correo_envia."</b><br>";
					// $testMail = "mbartolo@mortonsubastas.com";
					$mail->addAddress($corr, '');
					/* LA PERSONA A LA QUE SE LE ENVIA */

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


					for ($j = 0; $j <= $cuantos2; $j++) {
						$corr2 = $variable2[$j]["email"];
						$con2 = $variable2[$j]["receipt"];
						if (($corr == $corr2) and ($con1 == $con2)) {
							if ($encabezado == 0) {
								$nombre = $variable2[$j]["firstname"] . " " . $variable2[$j]["lastname"];
								$body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Presente:<br><br><p style='text-align:justify'>";
								echo  "<font face='Helvetica, serif'>" . $nombre . "<br>Presente:<br><br><p style='text-align:justify'> ";


								if ($fac == "cpascual@mortonsubastas.com") {
									$es_ = strpos($nom_subasta_es, 'Libros');
									if ($es_ > 0) { //LIBROS
										echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el martes " . $fecha_subasta . ".<br><br>";
										$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el martes " . $fecha_subasta . ".<br><br>";
									} else { //VINOS
										//$fecha_subasta = "".substr($dia,0,2)." de ".$mes_c." de ".$ano;
										//echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato ".trim($variable2[$j]["receipt"]).", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. ".trim($sub).", la cual se llevará a cabo el miercoles ".$fecha_subasta.".<br><br>";
										//$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato ".trim($variable2[$j]["receipt"]).", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. ".trim($sub).", la cual se llevará a cabo el miercoles ".$fecha_subasta.".<br><br>";

										echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el jueves " . $fecha_subasta . ".<br><br>";
										$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el jueves " . $fecha_subasta . ".<br><br>";
									}
								} elseif ($fac == "jjuarez@mortonsubastas.com") {
									echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . $variable2[$j]["receipt"] . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima <span style='color:#004d43;font-weight:bold'>" . trim($nom_subasta_es) . "</span> No. " . trim($sub) . ", la cual se llevará a cabo el <span style='color:#004d43;font-weight:bold'>" . $fecha_subasta . "</span> <br><br>";
									$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . $variable2[$j]["receipt"] . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima <span style='color:#004d43;font-weight:bold'>" . trim($nom_subasta_es) . "</span> No. " . trim($sub) . ", la cual se llevará a cabo el <span style='color:#004d43;font-weight:bold'>" . $fecha_subasta . "</span> <br><br>";
								} else {
									if ($fac == 'ebonilla@mortonsubastas.com') {
										echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el jueves " . $fecha_subasta . ".<br><br>";
										$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . trim($variable2[$j]["receipt"]) . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. " . trim($sub) . ", la cual se llevará a cabo el jueves " . $fecha_subasta . ".<br><br>";
									} else {
										echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . $variable2[$j]["receipt"] . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. $sub, la cual se llevará a cabo el sábado " . $fecha_subasta . ".<br><br>";
										$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato " . $variable2[$j]["receipt"] . ", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. $sub, la cual se llevará a cabo el sábado " . $fecha_subasta . ".<br><br>";
									}
								}
								//		echo "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato ".$variable2[$j]["receipt"].", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. $sub, la cual se llevará a cabo el sábado ".$fecha_subasta." <br><br>";
								//		$body .= "Espero se encuentre muy bien.<br><br>Dando seguimiento a su contrato ".$variable2[$j]["receipt"].", me permito enviarle la relación de piezas que están programadas para nuestra próxima $nom_subasta_es No. $sub, la cual se llevará a cabo el sábado ".$fecha_subasta."<br><br>";

								$body .=	"<table style='margin: 5px auto; font-size: 16px;'>";
								echo "<table style='margin: 5px auto; font-size: 16px;'>";
								$body .=	"<tr>";
								echo	"<tr>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
								echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
								echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA </center></th>";
								echo	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA </center></th>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>IMAGEN</center></th>";
								echo	"<th style='padding: 15px;background: #004d43; color: #fff'><center>IMAGEN</center></th>";
								$body .=	"</tr>";
								echo "</tr>";
								$encabezado = 1;
							}
							//echo "<br>";
							$body .=  "<tr>";
							echo "<tr>";
							$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><b>" . $variable2[$j]["receipt"] . "</b><br><h6>Partida:<b>" . $variable2[$j]["item"] . "</b><br>Lote: <b>" . substr($variable2[$j]["salelot"], 5, 12) . "</b></h6><br></td>";
							echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><b>" . $variable2[$j]["receipt"] . "</b><br><h6>Partida:<b>" . $variable2[$j]["item"] . "</b><br>Lote: <b>" . substr($variable2[$j]["salelot"], 5, 12) . "</b><h6><br></td>";
							$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='25%'><center>" . $variable2[$j]["descript"] . "</center></td>";
							echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='25%'>" . $variable2[$j]['descript'] . "</center></td>";
							$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]["reserve"]) . " MXN</center></td>";
							echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable2[$j]['reserve']) . " MXN</center></td>";
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
							//echo "i-".$i."-";
							//echo "j-".$j."-";
							$body .= "</td>";
							echo "</td>";
							$body .= "</tr>";
							echo "</tr>";
						}
					}

					//}
					$body .= "</table>";
					echo "</table>";
					$body .= "<br>";
					echo "<br>";

					if ($fac == "cpascual@mortonsubastas.com") {
						$es_ = strpos($nom_subasta_es, 'Libros');
						if ($es_ > 0) { //VINOS
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar  un día posterior a la fecha en que se realizó la subasta.<br><br>";

							echo "Si tiene alguna duda, favor de ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortonsubastas.com <br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortonsubastas.com <br><br>";
						} else { //LIBROS
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta. <br><br>";

							//echo "Si tiene alguna duda, favor de ponerse en contacto con Jessica Cazares al 55 52 83 31 40 ext. 3130 o vía correo electrónico a jcazares@mortonsubastas.com <br><br>";
							//$body .= "Si tiene alguna duda, favor de ponerse en contacto con Jessica Cazares al 55 52 83 31 40 ext. 3130 o vía correo electrónico a jcazares@mortonsubastas.com <br><br>";

							echo "Si tiene alguna duda, favor de ponerse en contacto con Verónica Bernal al 55 52 83 31 40 ext. 6883 o vía correo electrónico a vbernal@mortonsubastas.com <br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Verónica Bernal al 55 52 83 31 40 ext. 6883 o vía correo electrónico a vbernal@mortonsubastas.com <br><br>";
						}
					} else {
						if ($fac == 'ebonilla@mortonsubastas.com') {
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta. <br><br>";

							$es_ = strpos($nom_subasta_es, 'Obra Gráfica');
							//echo "<b>".$es_."</b>";
							if ($es_ > 0) {
								echo "Si tiene alguna duda, favor de ponerse en contacto con Diana Álvarez para Obra Gráfica  ext. 3145 o vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
								$body .= "Si tiene alguna duda, favor de ponerse en contacto con Diana Álvarez  para Obra Gráfica  ext. 3145 o vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
							} else {
								echo "Si tiene alguna duda, favor de ponerse en contacto con Fernanda Serrano al 55 52 83 31 40 ext. 6894 o vía correo electrónico a <a href='mailto:mserrano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mserrano@mortonsubastas.com</a> o con ";
								echo "Ana Paula López Nieto ext. 3384 o vía correo electrónico a <a href='mailto:aplopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>aplopez@mortonsubastas.com</a><br><br>";
								$body .= "Si tiene alguna duda, favor de ponerse en contacto con Fernanda Serrano al 55 52 83 31 40 ext. 6894 o vía correo electrónico a <a href='mailto:mserrano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>mserrano@mortonsubastas.com</a> o con ";
								$body .= "Ana Paula López Nieto ext. 3384 o vía correo electrónico a <a href='mailto:aplopez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>aplopez@mortonsubastas.com</a><br><br>";
							}
						}
						if ($fac == 'jjuarez@mortonsubastas.com') {
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a> <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$es_ = strpos($nom_subasta_es, 'Obra Gráfica');
							//echo "<b>".$es_."</b>";
							if ($es_ > 0) {
								echo "Si tiene alguna duda, favor de ponerse en contacto con Diana Álvarez para Obra Gráfica  ext. 3145 o vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
							} else {
								$new_data = strpos($nom_subasta_es, 'Alta Relojería');
								$new_data_1 = strpos($nom_subasta_es, 'Antigüedades Mexicanas');
								if ($new_data > 0) {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									echo "<br><br>";
									$body .= "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									$body .= "<br><br>";
								} elseif ($new_data_1 > 0) {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Verónica Bernal al <span style='font-weight: bold; color: #004d43;'>55 52 83 31 40 ext. 6883</span> o vía correo electrónico a <a href='mailto:vbernal@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>vbernal@mortonsubastas.com</a> ";
									echo "<br><br>";
									$body .= "Si tiene alguna duda, favor de ponerse en contacto con Verónica Bernal al <span style='font-weight: bold; color: #004d43;'>55 52 83 31 40 ext. 6883</span> o vía correo electrónico a <a href='mailto:vbernal@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>vbernal@mortonsubastas.com</a> ";
									$body .= "<br><br>";
								} else {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									echo "<br><br>";
								}
							}
						} elseif ($fac !== 'ebonilla@mortonsubastas.com') {
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a>. <br><br>Los resultados de la misma se harán llegar el próximo lunes.<br><br>";
						$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a>. <br><br>Los resultados de la misma se harán llegar el próximo lunes. <br><br>";

						echo "Si tiene alguna duda, favor de ponerse en contacto con <a href='tel:5552833140' style='font-weight:bold;color:#004d43;'>Miriam Jiménez al 55 52 83 31 40 ext. 5093</a> o vía correo electrónico a <a href='mailto:mjimenez@moortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> <br><br>";
						$body .= "Si tiene alguna duda, favor de ponerse en contacto con <a href='tel:5552833140' style='font-weight:bold;color:#004d43;'>Miriam Jiménez al 55 52 83 31 40 ext. 5093</a> o vía correo electrónico a <a href='mailto:mjimenez@moortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> <br><br>";
						}
					}
					//echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com. <br><br>Los resultados de la misma se harán llegar el próximo lunes.<br><br>";
					//$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com. <br><br>Los resultados de la misma se harán llegar el próximo lunes. <br><br>";

					//echo "Si tiene alguna duda, favor de ponerse en contacto con Mariana Ramírez al 55 52 83 31 40 ext. 4110 o vía correo electrónico a mramirez@mortonsubastas.com <br><br>";
					//$body .= "Si tiene alguna duda, favor de ponerse en contacto con Mariana Ramírez al 55 52 83 31 40 ext. 4110 o vía correo electrónico a mramirez@mortonsubastas.com <br><br>";
					echo "Saludos cordiales.<br><br>";
					$body .= "Saludos cordiales.<br><br>";

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
					$body .= "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
					echo "<img src='https://mortonsubastas.com/images/iconos_sociales/caballo-morton.png' alt='' style='width: 20%;'><br>";
					$body .= "<b>Morton Subastas</b> <br><br>";
					echo "<b>Morton Subastas</b> <br><br>";
					if ($_POST['radio'] == 'Mayka') {
						$body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
						echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec	Av. Constituyentes No. 910, Col. Lomas Altas</a><br><br>";
					}
					if ($_POST['radio'] == 'Constituyentes') {
						$body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
						echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a><br><br>";
					}

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

					$mail->Body = "" . $body . "";
					//$mail->Body = "BODDYYYY";
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					//echo "antes de enviar";
					$mail->CharSet = 'UTF-8';
					//echo 'Correo antes de envio <br>';

					if ($llega_de == 'prueba') {
						//echo "<b>No mail</b>";
						//echo 'NO SE ENVIA NADA';

						if ($fac == 'cpascual@mortonsubastas.com') {
							//$mail->send();
							echo "se envio correo prueba CRISTIAN";
						} else {
							//$mail->send();
							echo "Se envia correos prueba EDGAR";
						}
					} else {
						//echo "<b>mail</b>";
						$mail->send();                                                        //When I want to send a email
						//echo 'Correo enviado correctamente CRISTIAN, EDGAR, MIRIAM';
						echo 'Correo enviado correctamente desde: ' . $envia_correo . "<br>";
					}

					//unset($mail);
					$mail->ClearAddresses();
				}
			}
			//echo $body;

			// $mail->isHTML(true);


		} catch (Exception $e) {
			echo "Hubo un  Error: {$mail->ErrorInfo}";
		}
		//</html>

	}

	?>
