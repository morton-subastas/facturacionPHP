
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
	$nom_sub = trim($_POST['nom_subasta']);
	//$llega_de = trim($_POST['llega_de']);

	$variable = getEmailCliente($sub);
	//var_dump($variable);
	$variable2 = getAllSubasta($sub);
	$cuantos2 = count($variable2);
	$cuantos  = count($variable);
	$nom_subasta_es = $_POST['nom_subasta'];
	//print_r($variable2);
	if (($fac != '')) {
		include "head.php";
		include "aside.php";
		$mail = new PHPMailer(true);

		try {
			echo "<center><H1>RESULTADOS DE SUBASTA</H1></center>";
			for ($a = 0; $a <= $cuantos; $a++) {
				if (trim($variable[$a]["email"]) != "") {
					$cuantos_correos = $cuantos_correos + 1;
				}
			}
	
			for ($i = $_POST['inicio']; $i <= $_POST['fin']; $i++) {
				$con1 = $variable[$i]["receipt"];
				$corr = $variable[$i]["email"];
				if (trim($corr) != '') {
					echo "<h1>SE ENVIO A <b>" . $variable[$i]["email"] . "</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $i . " de " . $cuantos_correos . "<br></h1><br>";
				}
				
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
						if ($estimado == 0) {
							$nameEvaluate = $variable2[$j]["firstname"] . " " . $variable2[$j]["lastname"];
							if(trim($nameEvaluate)==""){
								$nombre = "<b>" . $variable2[$j]["company"] . "</b>";
							}else{
								$nombre = "<b>" . $variable2[$j]["firstname"] . " " . $variable2[$j]["lastname"] . "</b>";
							}
							$body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br>";
							echo  "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br>";
							$body .= "Con base en su contrato: <b> ".trim($variable2[$j]['receipt'])."</b>, le informo los resultados de la <b> ".$nom_subasta_es." </b>No. <b>".$sub."</b><br><br>";
							echo "Con base en su contrato: <b> ".trim($variable2[$j]['receipt'])."</b>, le informo los resultados de la <b> ".$nom_subasta_es." </b>No. <b>".$sub."</b><br><br>";

							$body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
							echo "<table style='margin: 5px auto; font-size: 16px;'>";
							$body .=  "<tr>";
							echo  "<tr>";
							$body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>LOTE</center></th>";
							echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>LOTE</center></th>";
							$body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Resultado<br>(martillo)</center></th>";
							echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Resultado<br> (martillo)</center></th>";
							$body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>SIGUIENTES PASOS</center></th>";
							echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>SIGUIENTES PASOS</center></th>";
							$body .=  "</tr>";
						 
						  $estimado = 1;
						/**  FIN DEL IF QUE IMPRIME EL PRIMER TEXTO DE CONSIGNANTE      */
						}     

						
			
						/*************      INICIO DE CREACIÓN DE TABLA                  ****************/
						$img = $variable2[$j]["pictpath"];
						//echo "IMG*".$img."*<br>";
						$valor = "/";
						$este = "\ ";
			
						$este = trim($este);
						$cambio = str_replace($este, $valor, $img);
						$cambio = str_replace("p:/", "", $cambio);
			
						echo "</tr>";
						$body .=  "<tr>";   // inicio
						echo "<tr>";
						$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='40%'><center><b>".substr($variable2[$j]["salelot"], 5, 12)."</b><br>".$variable2[$j]["descript"]."</h6><br><img src='https://mimorton.com/imglink/$cambio' width='60' heigth='60'></center></td>";
						echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='40%'><center><b>".substr($variable2[$j]["salelot"], 5, 12)."</b><br>".$variable2[$j]["descript"]."</h6><br><img src='https://mimorton.com/imglink/$cambio' width='60' heigth='60'></center></td>";
						if(trim($variable2[$j]["price"]) > 0){
							$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='10%'><center>VENDIDO<br><b>en: $ ".number_format($variable2[$j]['price'],  2, '.', ',')."</center></td>";
							echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='10%'>VENDIDO<br><b>en: $ ".number_format($variable2[$j]['price'],  2, '.', ',')."</center></td>";
							if($fac == 'mjimenez@mortonsubastas.com' || $fac == 'ehernandez@mortonsubastas.com'){
							  $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 2do. lunes posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
							  echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 2do. lunes posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
							}else{
								switch(trim($fac)){
									case 'jjuarez@mortonsubastas.com':
										if (strpos($nom_subasta_es, "Antigüedades") > 0) {
											$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
											echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
										}
										if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
											$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
											echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
										}
									break;
									case 'ebonilla@mortonsubastas.com':
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
									break;
									case 'cpascual@mortonsubastas.com':
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>El pago se realizará el 4to. miércoles posterior a la fecha de subasta.<br><span style='font-size:10px;'>*Siempre y cuando se haya realizado el pago del comprador.</span></center></td>";
									break;
									default : 
									   echo "nada";
									break;
								}	
							}
						}else{
							$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='10%'><center>NO VENDIDO</center></td>";
							echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='10%'>NO VENDIDO</center></td>";
							switch(trim($fac)){
								case 'mjimenez@mortonsubastas.com':
								    $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Si desea retirar su lote, cuenta con 15 días hábiles posteriores a la subasta para recoger en Lago Andrómaco #84 B.</li></ul></center></td>";
									echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Si desea retirar su lote, cuenta con 15 días hábiles posteriores a la subasta para recoger en Lago Andrómaco #84 B.</li><li></ul></center></td>";
								break;
								case 'jjuarez@mortonsubastas.com':
									if (strpos($nom_subasta_es, "Antigüedades") > 0) {
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si no desea recontratar sus lotes, le sugerimos ponerse en contacto con Areli Carranza al 55 52 83 31 40 ext. 3422 o vía correo electrónico a acarranza@mortonsubastas.</li></ul></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si no desea recontratar sus lotes, le sugerimos ponerse en contacto con Areli Carranza al 55 52 83 31 40 ext. 3422 o vía correo electrónico a acarranza@mortonsubastas.</li></ul></center></td>";
									}
									if ((strpos($nom_subasta_es, "Joyeria") > 0) || (strpos($nom_subasta_es, "Joyería") > 0)) {
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si no desea recontratar sus lotes, le sugerimos ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a arojas@mortonsubastas.</li></ul></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si no desea recontratar sus lotes, le sugerimos ponerse en contacto con Alejandra Rojas al 55 52 83 31 40 ext. 6895 o vía correo electrónico a arojas@mortonsubastas.</li></ul></center></td>";
									}
								break;
								case 'ebonilla@mortonsubastas.com':
									$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Esmeralda Castillo al 55 52 83 31 40 ext. 6880 o vía correo electrónico a jcastillo@mortonsubastas.</li></ul></center></td>";
									echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Esmeralda Castillo al 55 52 83 31 40 ext. 6880 o vía correo electrónico a jcastillo@mortonsubastas.</li></ul></center></td>";
								break;
								case 'cpascual@mortonsubastas.com':
									if (strpos($nom_subasta_es, "Libros") > 0) {
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 4 días hábiles posteriores a la subasta para recoger en Lago Andrómaco 84-B, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortosnsubastas.</li></ul></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 4 días hábiles posteriores a la subasta para recoger en Lago Andrómaco 84-B, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Jaciel López al 55 52 83 31 40 ext. 5120 o vía correo electrónico a jlopez@mortonsubastas.</li></ul></center></td>";
									  }
									  if(strpos($nom_subasta_es, "Vinos") > 0){
										$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Ana Laura Rodríguez al 55 52 83 31 40 ext. 3424 o vía correo electrónico arodriguez@mortonsubastas.com.</li></ul></center></td>";
										echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center><ul><li>Cuenta con 5 días hábiles posteriores a la subasta para recoger en Monte Athos 179, sus lotes.</li><li>Si desea recontratar sus lotes, le sugerimos ponerse en contacto con Ana Laura Rodríguez al 55 52 83 31 40 ext. 3424 o vía correo electrónico arodriguez@mortonsubastas.com.</li></ul></center></td>";
									  }
								break;
								default : 
								   echo "nada";
								break;
							}			 
						  }
						echo "</tr>";
					  } // END IF EN DADO CASO QUE LOS CORREOS Y RECIBOS COINCIDAN.
					}  // TERMINO DEL CILO FOR QUE LLENA LA TABLA
			
			
				
					$body .= "</table>";
					echo "</table>";
					$body .= "<br><br><br>";
					echo "<br><br><br>";
			
					/* ---  ESTE ES EL FINAL, LO QUE VA AL TERMINO DEL DESGOLOSE DE LOS PRODUCTOS   */

					switch(trim($fac)){
						case 'jjuarez@mortonsubastas.com':
			  
							$body.= "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'></td>
							</tr></table><br><br>";
				  
				  
							echo "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'></td>
						  </tr></table><br><br>";
						break;
						case 'mjimenez@mortonsubastas.com':
							  $body.= "<table width='100%'>
							  <tr>
							  <td style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								  <img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
								</a>
							  </td>
							  <td style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								  <img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
								</a>
							  </td>
							  <td  style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/informacion/pago_resultados.php' TARGET='_BLANK'>
								  <img src='https://mortonsubastas.com/new/img/pago_button.jpg'>
								</a>
							  </td>
							  <td style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								  <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
								</a>
							  </td>
							</tr></table><br><br>";
				
							echo "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/pago_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/pago_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
						  </tr></table><br><br>";
						break;
						case 'ebonilla@mortonsubastas.com':
							$body.= "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/informacion/adeudo.php' TARGET='_BLANK'>
									<img src='https://mortonsubastas.com/new/img/adeudos.jpg'>
							  	</a>
							</td>
							</tr></table><br><br>";
				  
				  
							echo "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'>
								<a href='https://mortonsubastas.com/informacion/adeudo.php' TARGET='_BLANK'>
									<img src='https://mortonsubastas.com/new/img/adeudos.jpg'>
							  	</a>
							</td>
						  </tr></table><br><br>";
						break;
						case 'cpascual@mortonsubastas.com':
							$body.= "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'>
							   
							</td>
							</tr></table><br><br>";
				  
				  
							echo "<table width='100%'>
							<tr>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/facturacion_resultados.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
							  </a>
							</td>
							<td style='padding: 15px; width='25%'>
							  <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
								<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
							  </a>
							</td>
							<td  style='padding: 15px; width='25%'>
							   
							</td>
						  </tr></table><br><br>";
						  break;
						default : 
						   echo "nada";
						break;
					  }

					if($fac == 'ebonilla@mortonsubastas.com'){
						$body .= "<p>En caso de haber dejado sus certificados de autenticidad, documentos o publicaciones que acompañen a la obra, estos no serán enviados junto con las obras a Constituyentes y deberá pasar a recogerlos a Monte Athos #175. </p>";
						echo "<p>En caso de haber dejado sus certificados de autenticidad, documentos o publicaciones que acompañen a la obra, estos no serán enviados junto con las obras a Constituyentes y deberá pasar a recogerlos a Monte Athos #175. </p>";
					}

					if($fac != 'ebonilla@mortonsubastas.com'){
						$body .= "En caso de que algún lote no haya sido vendido, recibirá un segundo correo para dar seguimiento.<br>";
						echo "En caso de que algún lote no haya sido vendido, recibirá un segundo correo para dar seguimiento.<br>";
					}
					
					$body .= "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
					echo "Quedamos atentos en caso de que tenga cualquier duda o comentario.<br><br>";
					$body .= "Saludos cordiales.<br><br>";
					echo "Saludos cordiales.<br><br>";
		
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
					$body .= "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro.jpg' alt='' style='width: 50%;'><br><br>";
					echo "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro.jpg' alt='' style='width: 50%;'><br><br>";
				   
			
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
			
				  } //  TERMINO DEL IF PRINCIPAL   // 

				// AQUI DESPUES DE LA TABLA
				// }
                     
				switch(trim($fac)){
					case 'mjimenez@mortonsubastas.com' : 
						$username = 'mjimenez@mortonsubastas.com';
						$password = 'tenmisericordia';
						$employee = 'Miriam Jiménez';
					break;
					case 'jjuarez@mortonsubastas.com' :
						$username = 'jjuarez@mortonsubastas.com';
						$password = 'ISHTAR#15';
						$employee = 'Joel Juarez';
					break;
					case 'ebonilla@mortonsubastas.com':
						$username = 'ebonilla@mortonsubastas.com';
						$password = 'ClubAmerica10';
						$employee = 'Edgar Bonilla';
					case 'cpascual@mortonsubastas.com':
						$username = 'cpascual@mortonsubastas.com';
						$password = 'perales246';
						$employee = 'Cristian Pascual';
					break;
					default:
						$username = 'hdezmortonsubastas@gmail.com';
						$password = 'hgwe nxpv rxig vrzm';
						$employee = 'Edgar Prueba';
					break;	
				}

				$mail->clearAllRecipients();
				$mail->ClearAddresses();
				$mail->ClearCCs();
				$mail->SMTPDebug = 0;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = $username;                 	    //SMTP username
				$mail->Password   = $password;                               //SMTP password
				$mail->SMTPSecure = 'tsl';            //Enable implicit TLS encryption
				$mail->Port       = 587;       
				$mail->isHTML(true);            
				$mail->setFrom($username, $employee);                      //Set email format to HTML
				$mail->Subject = 'Resultados de la subasta "'.$sub.'"';
				$mail->Body =  "" . $body . "";
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->CharSet = 'UTF-8';
				$mail->AddAddress($variable[$i]["email"]);
				//$mail->AddAddress('ehernandez@mortonsubastas.com');
				$mail->AddCC($username);
			if(!$mail->Send())
				{
					echo $mail->ErrorInfo;
				}
				else{
					echo "email enviado";
					$mail->clearAllRecipients();
				}
			}    // ciclo for de envio
		} catch (Exception $e) {
			echo "Hubo un  Error: {$mail->ErrorInfo}";
		}
		//</html>
	}

	?>
