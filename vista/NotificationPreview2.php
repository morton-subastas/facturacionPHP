
	<?php

	include 'funciones_RFC.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Phpmailer/Exception.php';
	require 'Phpmailer/PHPMailer.php';
	require 'Phpmailer/SMTP.php';

	session_start();
	$fac = $_SESSION['email'];

	$sub = trim($_POST['subasta']);
	$fecha_subasta = trim($_POST['fecha']);
	$nom_subasta_es = trim($_POST['nombre_sub']);
	$nom_subasta_es = str_replace(".", "", $nom_subasta_es);
	$llega_de = trim($_POST['llega_de']);

	if (($fac != '')) {
		include "head.php";
		include "aside.php";
		$mail = new PHPMailer(true);

		try {
			
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
					$mail->Password = 'ISHTAR#15';
					$envia_correo = 'Joel Juarez';
					break;

				default:
					$mail->Username   = 'hdezmortonsubastas@gmail.com';                 	    //SMTP username
					$mail->Password   = 'hgwe nxpv rxig vrzm';
					$envia_correo = 'Edgar Prueba';
					break;
			}


			$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			$mail->setFrom($fac, $envia_correo);
			//$mail->AddCC($fac, $envia_correo);

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Notificación de piezas programadas para subasta ' . $sub . '';

			$variable = getEmailCliente_Notificaciones($sub);
			$cuantos  = count($variable);
			$variable2 = getEmailCliente_NotificacionesDatos($sub);
			$cuantos2 = count($variable2);

			echo "<center><H1>NOTIFICACIONES PREVIAS A SUBASTA</H1></center>";
			for ($a = 0; $a <= $cuantos; $a++) {
				if ((trim($variable[$a]["email"]) != "")) {
					$cuantos_correos = $cuantos_correos + 1;
				}
			}

			$inicio = $_POST["inicio"];
			$cuantos = $_POST["fin"];
			for ($i = $inicio; $i <= $cuantos; $i++) {
				$corr = $variable[$i]["email"];
				$con1 = $variable[$i]["receipt"];
				
				if ((trim($corr) != '')) {
					$encabezado = 0;
					echo "<br><h1>SE ENVIARÁ <b>-" . trim($corr) . "-</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $i . " de " . $cuantos_correos . "<br></h1><br>";
					$correo_envia = $variable[$i]['email'];
					//$mail->AddAddress(trim($corr));
					$mail->AddAddress('ehernandez@mortonsubastas.com');
					$mail->AddCC($fac, $envia_correo);
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
					$body .= "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro_facturacion.jpg' style='width: 250px;margin-top:20px'>";
					echo "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro_facturacion.jpg' style='width: 250px;margin-top:20px'>";
					$body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
					echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
					$body .= "<p style='line-height: 1.6; font-size: 14px'>";
					echo "<p style='line-height: 1.6; font-size: 14px'>";


					for ($j = 0; $j <= $cuantos2; $j++) {
						$corr2 = $variable2[$j]["email"];
						$con2 = $variable2[$j]["receipt"];
						if (($corr == $corr2) and ($con1 == $con2)) {
							if ($encabezado == 0) {
								$nombre = $variable2[$j]["firstname"] . " " . $variable2[$j]["lastname"];
								$body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br><p style='text-align:justify'>";
								echo  "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br><p style='text-align:justify'> ";
								if ($fac == "cpascual@mortonsubastas.com") {
									$es_ = strpos($nom_subasta_es, 'Libros');
									if ($es_ > 0) { //LIBROS
										echo "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
										$body .= "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									} else { //VINOS
										echo "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									$body .= "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									}
								} elseif ($fac == "jjuarez@mortonsubastas.com") {
									echo "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b> en nuestro salón de subastas en Monte Athos # 179.<br><br>";
									$body .= "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b> en nuestro salón de subastas en Monte Athos # 179.<br><br>";
								} else {
									if ($fac == 'ebonilla@mortonsubastas.com') {
										echo "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									$body .= "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									} else {
										echo "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
										$body .= "Con base a su contrato <b>" . trim($variable2[$j]["receipt"]) . "</b>, le comparto la relacion de piezas programadas para la " . trim($nom_subasta_es) . " No. <b>" . trim($sub) . "</b>, la cual se llevará a cabo el <b>" . $fecha_subasta . "</b>.<br><br>";
									}
								}
								

								$body .=	"<table style='margin: 5px auto; font-size: 16px;'>";
								echo "<table style='margin: 5px auto; font-size: 16px;'>";
								$body .=	"<tr>";
								echo	"<tr>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
								echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
								$body .=	"<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
								echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
								if($fac != 'mjimenez@mortonsubastas.com'){
									$body .= "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>ESTIMADO</center></th>";
									echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>ESTIMADO</center></th>";
								}
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
							if($fac != 'mjimenez@mortonsubastas.com'){
								$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='25%'><center>$" . number_format($variable2[$j]['low']) . " - $" .number_format($variable2[$j]['high']) . "</center></td>";
								echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='25%'><center>$" . number_format($variable2[$j]['low']) . " - $" .number_format($variable2[$j]['high']) . "</center></td>";
							}
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


						
				$body .= "<table width='100%'>
				<tr>
					<td style='padding: 15px; width='25%'>
						<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
							<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
						</a>
					</td>
				  	<td style='padding: 15px; width='25%'>
				    </td>
				    <td style='padding: 15px; width='25%'>
				    </td>
				    <td  style='padding: 15px; width='25%'>
				    </td> 
			    </tr></table><br><br>";


	

				echo "<table width='100%'>
				<tr>
					<td style='padding: 15px; width='25%'>
						<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
							<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
						</a>
					</td>
					<td style='padding: 15px; width='25%'>
					</td>
					<td style='padding: 15px; width='25%'>
					</td>
					<td  style='padding: 15px; width='25%'>
					</td>
					
				</tr></table><br><br>";


					if ($fac == "cpascual@mortonsubastas.com") {
						$es_ = strpos($nom_subasta_es, 'Libros');
						if ($es_ > 0) { //VINOS
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web https://www.mortonsubastas.com <br><br>Los resultados de la misma se harán llegar  un día posterior a la fecha en que se realizó la subasta.<br><br>";

							echo "Si tiene alguna duda, favor de ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortonsubastas.com <br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortonsubastas.com <br><br>";
						} else { //LIBROS
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href='https://mortonsubastas.com' style='font-weigth: bold; color:#004d43;'>www.mortonsubastas.com</a> <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href = 'https://mortonsubastas.com' style='font-weigth: bold; color:#004d43;'>www.mortonsubastas.com </a></a><br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta. <br><br>";
							echo "Si tiene alguna duda, favor de ponerse en contacto con Ana Laura Rodríguez al 55 52 83 31 40 ext. 3424 o vía correo electrónico a arodriguez@mortonsubastas.com <br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Ana Laura Rodríguez al 55 52 83 31 40 ext. 3424 o vía correo electrónico a arodriguez@mortonsubastas.com <br><br>";
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
								echo "Si tiene alguna duda, favor de ponerse en contacto con Ana Segoviano al 55 52 83 31 40 ext. 3146 o vía correo electrónico a <a href='mailto:asegoviano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>asegoviano@mortonsubastas.com</a> o con Diana Álvarez ext. 3145 o vía correo electrónico a ";
							echo "<a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Ana Segoviano al 55 52 83 31 40 ext. 3146 o vía correo electrónico a <a href='mailto:asegoviano@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>asegoviano@mortonsubastas.com</a> o con Diana Álvarez ext. 3145 o vía correo electrónico a ";
							$body .= "<a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
							}
						}
						if ($fac == 'jjuarez@mortonsubastas.com') {
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a> <br><br>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a>. <br><br>Los resultados de la misma se harán llegar al siguiente día hábil. <br><br>";
							
							$es_ = strpos($nom_subasta_es, 'Obra Gráfica');
							//echo "<b>".$es_."</b>";
							if ($es_ > 0) {
								echo "Si tiene alguna duda, favor de ponerse en contacto con Diana Álvarez para Obra Gráfica  ext. 3145 o vía correo electrónico a <a href='mailto:dalvarez@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>dalvarez@mortonsubastas.com </a><br><br>";
							} else {
								$new_data = (strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0);
								$new_data_1 = strpos($nom_subasta_es, "Antigüedades") > 0;
								if ($new_data > 0) {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									echo "<br><br>";
									$body .= "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									$body .= "<br><br>";
								} elseif ($new_data_1 > 0) {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Areli Carranza al <span style='font-weight: bold; color: #004d43;'>55 52 83 31 40 ext. 6883</span> o vía correo electrónico a <a href='mailto:acarranza@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>acarranza@mortonsubastas.com</a> ";
									echo "<br><br>";
									$body .= "Si tiene alguna duda, favor de ponerse en contacto con Areli Carranza al <span style='font-weight: bold; color: #004d43;'>55 52 83 31 40 ext. 6883</span> o vía correo electrónico a <a href='mailto:acarranza@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>acarranza@mortonsubastas.com</a> ";
									$body .= "<br><br>";
								} else {
									echo "Si tiene alguna duda, favor de ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a <a href='mailto:arojas@mortonsubastas.com' style='font-weight: bold; color: #004d43; text-decoration: none'>arojas@mortonsubastas.com</a> ";
									echo "<br><br>";
								}
							}
						} elseif ($fac !== 'ebonilla@mortonsubastas.com') {
							echo "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a>. <br><br>Los resultados de la misma se harán llegar al siguiente día hábil.<br><br>";
							$body .= "Lo invitamos a consultar el catálogo digital en nuestro sitio web <a href= 'https://www.mortonsubastas.com' style= 'font-weight:bold; color: #004d43'>www.mortonsubastas.com</a>. <br><br>Los resultados de la misma se harán llegar al siguiente día hábil. <br><br>";

							echo "Si tiene alguna duda, favor de ponerse en contacto con Miriam Jiménez vía correo electrónico  <a href='mailto:mjimenez@moortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> <br><br>";
							$body .= "Si tiene alguna duda, favor de ponerse en contacto con Miriam Jiménez vía correo electrónico  <a href='mailto:mjimenez@moortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> <br><br>";
						}
					}
					
					echo "Saludos cordiales.<br><br>";
					$body .= "Saludos cordiales.<br><br>";

					require_once("../Controlador/controladorUsuarios.php");
					require_once("../Modelo/modeloUsuarios.php");

					$all_AnUser = ControladorUsuarios::SearchUser($fac);

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
					

					$body .= "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/new/img/facebook.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					echo "<a href='https://www.facebook.com/mortonsubastas'> <img src='https://mortonsubastas.com/new/img/facebook.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					$body .= "<a href='https://www.instagram.com/mortonsubastas/'>";
					echo "<a href='https://www.instagram.com/mortonsubastas/'>";
					$body .= "<img src='https://mortonsubastas.com/new/img/instagram.jpg' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					echo "<img src='https://mortonsubastas.com/new/img/instagram.jpg' alt='icono de facebook' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					$body .= "<a href='https://twitter.com/mortonsubastas'>";
					echo "<a href='https://twitter.com/mortonsubastas'>";
					$body .= "<img src='https://mortonsubastas.com/new/img/twitter.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					echo "<img src='https://mortonsubastas.com/new/img/twitter.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					$body .= "<a href='https://www.youtube.com/user/MortonSubastas'>";
					echo "<a href='https://www.youtube.com/user/MortonSubastas'>";
					$body .= "<img src='https://mortonsubastas.com/new/img/youtube.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					echo "<img src='https://mortonsubastas.com/new/img/youtube.jpg' style='width: 2.5em; margin-left: 10px; filter: grayscale(100%) opacity(60%);'></a>";
					$body .= "</p>";
					echo "</p>";
					$body .= "</div>";
					echo "</div>";
					$body .= "</body>";
					echo "</body>";
					$body .= "</html>";
					echo "</html>";

					$mail->Body = "" . $body . "";
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					$mail->CharSet = 'UTF-8';

					/*if(!$mail->Send())
					{
						echo $mail->ErrorInfo;
						$mail->clearAllRecipients();
						$mail->ClearAddresses();
					}
					else{
						$mail->clearAllRecipients();
						$mail->ClearAddresses();
						echo "todo bien";
					}*/
				}
			}
			


		} catch (Exception $e) {
			echo "Hubo un  Error: {$mail->ErrorInfo}";
		}
		//</html>

	}

	?>
