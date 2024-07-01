
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
	if (($fac != '')) {
		include "head.php";
		include "aside.php";
		$mail = new PHPMailer(true);
		try {
			require_once("../Controlador/controladorUsuarios.php");
			require_once("../Modelo/modeloUsuarios.php");
			$all_AnUser = ControladorUsuarios::SearchUser($fac);
			$sub = trim($_POST['subasta']);

			$Host = "localhost";
			$User = "root";
			$Password = "h0rKm8dEwHZz";
			$DataBase = "timbrado";
			$conexion = mysqli_connect($Host, $User, $Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");
	
			$fin = trim($_POST['finaliza']);

			
			$cor = trim($_POST['email']);
			$suma = trim($_POST['suma']);
	
			$var2 = 'contrato' . $suma;
			$contrato = trim($_POST[$var2]);
			
			$emp = trim($_POST['empieza']);
		
			$PAL_R = trim($_POST['paleta']);
			$lastCharAcu = substr($sub, -1);

			$variable = getEmail($sub);
			$cuantos  = count($variable);
			$suma = 0;
			$contador = $suma + 1;
			$temporal = 0;

			if ($fac == 'mjimenez@mortonsubastas.com' || $fac == 'jjuarez@mortonsubastas.com') {
				echo '<a href="searchDevolver.php?subasta=' . $sub . '&rol=EMAIL" style="float:right;" class="btn-lg ov-btn-slide-close">Regresar</a>';
			}

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

			$emp_t = $emp;
			$fin_t = $fin;
			while ($emp_t <= $fin_t) {
				if (trim($variable[$emp_t]["email"]) == trim($cor)) {
					$nombre = $variable[$emp_t]["firstname"] . " " . $variable[$emp_t]["lastname"];
					$emp_t = $fin_t;
				}
				$emp_t  = $emp_t + 1;
			}


			switch($fac){
				case 'mjimenez@mortonsubastas.com': 
					$body .= "<font face='Helvetica, serif'>" . $nombre . "<br><p>Estimado Consignante:<br><br><p style='text-align:justify'> Con base a su contrato <b>" . $contrato . "</b> que participó en la subasta ".$sub.", le informo los pasos a seguir para los lotes no vendidos, serán para devolución.</p>";
					echo  "<font face='Helvetica, serif'>" . $nombre . "<br><p>Estimado Consignante:<br><br><p style='text-align:justify'> Con base a su contrato <b>" . $contrato . "</b> que participó en la subasta ".$sub.", le informo los pasos a seguir para los lotes no vendidos, serán para devolución.</p>";
					$body .= "<p>Cuenta como máximo con 15 días hábiles después de la fecha de la subasta, para que no genere gastos por almacenaje. A partir del décimo sexto día se cobrarán $100.00 diarios por lote.</p>";
					echo "<p>Cuenta como máximo con 15 días hábiles después de la fecha de la subasta, para que no genere gastos por almacenaje. A partir del décimo sexto día se cobrarán $100.00 diarios por lote.</p>";
				break;
				case 'jjuarez@mortonsubastas.com':
					$body .= "<font face='Helvetica, serif'>" . $nombre . "<br><p>Presente:<br><br><p style='text-align:justify'>Dando seguimiento a su(s) lote(s) no vendido(s) de su contrato <b>" . $contrato . "</b>, los pasos a seguir serán para devolución.</p>";
					echo  "<font face='Helvetica, serif'>" . $nombre . "<br><p>Presente:<br><br><p style='text-align:justify'>Dando seguimiento a su(s) lote(s) no vendido(s) de su contrato <b>" . $contrato . "</b>, los pasos a seguir serán para devolución.</p>";
					$body .= "<p>Cuenta como máximo con 15 días hábiles después de la fecha de la subasta, para que no genere gastos por almacenaje.</p>";
					echo "<p>Cuenta como máximo con 15 días hábiles después de la fecha de la subasta, para que no genere gastos por almacenaje.</p>";
				break;
				default:
					echo "No se reconoce usuario";
				break;
			}
			
			$body .=	"<table style='margin: 5px auto; border='2'  width='92%' font-size: 16px;'>";
			echo "<table style='margin: 5px auto; border='2'  width='92%' font-size: 16px;'>";
			$body .=	"<tr style='color:#fff; font-weight:normal; text-align:center; background: #004D43'>";
			echo	"<tr style='color:#fff; font-weight:normal; text-align:center; background: #004D43'>";
			$body .=	"<th style='font-weight:normal; text-align:center'><center>Contrato</center></th>";
			echo "<th style='font-weight:normal; text-align:center'><center>Contrato</center></th>";
			$body .=	"<th style='font-weight:normal; text-align:center'><center>Descripción</center></th>";
			echo "<th style='font-weight:normal; text-align:center'><center>Descripción</center></th>";
			$body .=	"<th style='font-weight:normal; text-align:center'><center>Reserva </center></th>";
			echo	"<th style='font-weight:normal; text-align:center'><center>Reserva </center></th>";
			$body .=	"<th style='font-weight:normal; text-align:center'><center>Imagen</center></th>";
			echo	"<th style='padding: 15px;background: #004d43; color: #fff'><center>Imagen</center></th>";
			$body .=	"</tr>";
			echo "</tr>";
			while ($emp <= $fin) {
				$CON_R = trim($variable[$emp]["receipt"]);
				$PAR_R = trim($variable[$emp]["item"]);
				$lot_RFC = trim(substr($variable[$emp]["salelot"], 5, 12));
				$EMA_R = trim($variable[$emp]["email"]);

				$sql = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $CON_R . "' and `partida`='" . $PAR_R . "' and `paleta`='" . $lot_RFC . "' and `correo`='" . $cor . "' and status != 'ENVIADO' " ;
			
				$resultado = mysqli_query($conexion, $sql);
				$numero_filas = mysqli_num_rows($resultado);
				while ($fila = mysqli_fetch_array($resultado)) {
					$correo_envia = $fila['correo'];
					$query = "UPDATE `emailenviados` SET `status` = 'ENVIADO' WHERE `contrato` = '" . $CON_R . "' AND `partida` = '" . $PAR_R . "' AND `paleta` ='" . $lot_RFC . "' AND `correo` = '" . $cor . "'";
					$result = mysqli_query($conexion, $query);
					if ($result == 1) {
						$envia_send = true;
					} else {
						$envia_send = false;
					}
					$body .=  "<tr>";
					echo "<tr>";
					$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
					echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
					$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='25%'><center>" . $variable[$emp]["descript"] . "</center></td>";
					echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='25%'>" . $variable[$emp]['descript'] . "</center></td>";
					$body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable[$emp]["reserve"]) . " MXN</center></td>";
					echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable[$emp]['reserve']) . " MXN</center></td>";
					$img = $variable[$emp]["pictpath"];
					$valor = "/";
					$este = "\ ";

					$este = trim($este);
					$cambio = str_replace($este, $valor, $img);
					$cambio = str_replace("p:/", "", $cambio);
					$body .= "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
					echo "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
					if ($fila['lugar30'] == 'Constituyentes') {
						$body .= "Ubicación	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
						echo "Ubicación	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
					}
					if ($fila['lugar30'] == 'Andrómaco') {
						$body .= "Ubicación	<a href='https://maps.app.goo.gl/aqCzmTBAfpc6ob7a8'>Lago Andrómaco 84-B</a><br><br>";
						echo "Ubicación	<a href='https://maps.app.goo.gl/aqCzmTBAfpc6ob7a8'>Lago Andrómaco 84-B</a><br><br>";
					}
					if ($fila['lugar30'] == 'Athos175') {
						$body .= "Ubicación	<a href='https://www.google.com.mx/maps/place/Monte+Athos+175,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4208256,-99.2128501,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f32028f0d9:0xa593e2fff93cbe91!8m2!3d19.4208206!4d-99.2106614'>Monte Athos 175</a><br><br>";
						echo "Ubicación	<a href='https://www.google.com.mx/maps/place/Monte+Athos+175,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4208256,-99.2128501,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f32028f0d9:0xa593e2fff93cbe91!8m2!3d19.4208206!4d-99.2106614'>Monte Athos 175</a><br><br>";
					}
					if ($fila['lugar30'] == 'Athos179') {
						$body .= "Ubicación	<a href='https://www.google.com.mx/maps/place/Monte+Athos+179,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4207255,-99.2130147,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f320651f43:0x51de024e7e5a97ff!8m2!3d19.4207205!4d-99.210826'>Monte Athos 179</a><br><br>";
						echo "Ubicación	<a href='https://www.google.com.mx/maps/place/Monte+Athos+179,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4207255,-99.2130147,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f320651f43:0x51de024e7e5a97ff!8m2!3d19.4207205!4d-99.210826'>Monte Athos 179</a><br><br>";
					}
					$body .= "</td>";
					echo "</td>";

					$body .= "</tr>";
					echo "</tr>";
				}
				$cuenta = $cuenta - 1;
				$emp = $emp + 1;
			}

		

			$body .= "</table>";
			echo "</table>";

			$body .= "<table width='100%'><tr>";

			if($lastCharAcu == "T" || $fac == 'jjuarez@mortonsubastas.com'){
				$body .= "<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/informacion/recoleccion_consignantes.php' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
				</a>
			 </td>
				<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
				</a>
				</td>
				<td style='padding: 15px; width:25%;'></td><td style='padding: 15px; width:25%;'></td>";
			}else{
				$body .= "<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/informacion/pago.php' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/pago_button.jpg'>
				</a>
			</td>
			   <td style='padding: 15px; width:25%;'>
			   <a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
				   <img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
			   </a>
			   </td>
			<td style='padding: 15px; width:25%;'>
			   <a href='https://mortonsubastas.com/informacion/recoleccion.php' TARGET='_BLANK'>
				   <img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
			   </a>
			</td>
			   <td style='padding: 15px; width:25%;'>
			   <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
				   <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
			   </a>
			   </td>";
			}

            $body .= "</tr></table><br><br>";




   echo "<table width='100%'>
   <tr>";

	   if($lastCharAcu == "T" || $fac == 'jjuarez@mortonsubastas.com'){
		echo "<td style='padding: 15px; width:25%;'>
		<a href='https://mortonsubastas.com/informacion/recoleccion_consignantes.php' TARGET='_BLANK'>
			<img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
		</a>
		</td>
		<td style='padding: 15px; width:25%;'>
			<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
				<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
			</a>
		</td>
		<td style='padding: 15px; width:25%;'></td><td style='padding: 15px; width:25%;'></td>";
	   }else{
		echo "<td style='padding: 15px; width:25%;'>
		<a href='https://mortonsubastas.com/informacion/pago.php' TARGET='_BLANK'>
			<img src='https://mortonsubastas.com/new/img/pago_button.jpg'>
		</a>
			</td>
			<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
				</a>
			</td>
			<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/informacion/recoleccion.php' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
				</a>
			</td>
			<td style='padding: 15px; width:25%;'>
				<a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
					<img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
				</a>
			</td><td style='padding: 15px; width:25%;'></td><td style='padding: 15px; width:25%;'></td>";
	   	}

  		echo "</tr></table><br><br>";

			if($fac == 'mjimenez@mortonsubastas.com'){
				$body .= "<p>Si tiene alguna duda, por favor contactarme al correo electrónico mjimenez@mortonsubastas.com.</p>";
				echo "<p>Si tiene alguna duda, por favor contactarme al correo electrónico mjimenez@mortonsubastas.com.</p>";
			}
			
			$body .= "Saludos y que tenga un excelente día.<br><br>";
			echo "Saludos y que tenga un excelente día.<br><br>";

			require_once("../Controlador/controladorUsuarios.php");
			require_once("../Modelo/modeloUsuarios.php");
			//echo "<br>VISTA: envia controlador";
			if ($fac == "mramirez@mortonsubastas.com") {
				echo '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
						<tr>
							<td width="200" align="right" valign="top">
							<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
							</td>
							<td align="left" valign="top" style="padding: 0px 10px;">
							<p>
								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong> Miriam Jiménez Rangel </strong></font>
								<br />
								<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >Administrativo de Oportunidades</font>
								<br />
								<br />
								<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
								<strong><font color="#384845">(55) 5283 3140
									ext. 5093</font></strong>
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
									<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>Miriam Jiménez Rangel</strong></font>
									<br />
									<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >Administrativo de Oportunidades</font>
									<br />
									<br />
									<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
										<strong><font color="#384845">(55) 5283 3140
											ext. 5093</font></strong>
									</font>
									<br />
										<font face="Helvetica, Geneva, sans-serif" color="#384845" style="font-size:12px;">
											<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none">www.mortonsubastas.com</a>
										</font>
								</p>
								</td>
								</tr>
							</table>';
			} else {
				echo '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
  <tr>
    <td width="200" align="right" valign="top">
      <a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none"><img src="http://www.mortonsubastas.com/images/correo/logo.jpg" alt="Logo" hspace="5" /></a>
    </td>
    <td align="left" valign="top" style="padding: 0px 10px;">
      <p>
        <font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>' . $all_AnUser['usu_nombre'] . '</strong></font>
        <br />
        <font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >
          ' . $all_AnUser['puesto100'] . '        </font>
        <br />
        <br />
        <font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
          <strong><font color="#384845">(55) 5283 3140
            ext. ' . $all_AnUser['ext20'] . '</font></strong>
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
	<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:16px;"><strong>' . $all_AnUser['usu_nombre'] . '</strong></font>
	<br />
	<font face="Helvetica, Geneva, sans-serif" color="#1c2927" style="font-size:12px;" >
		' . $all_AnUser['puesto100'] . '        </font>
	<br />
	<br />
	<font face="Helvetica, Geneva, sans-serif" color="#606f6c" style="font-size:12px; ">
		<strong><font color="#384845">(55) 5283 3140
			ext. ' . $all_AnUser['ext20'] . '</font></strong>
	</font>
	<br />
		<font face="Helvetica, Geneva, sans-serif" color="#384845" style="font-size:12px;">
			<a href="http://www.mortonsubastas.com" style="color:#004d43; text-decoration: none">www.mortonsubastas.com</a>
		</font>
</p>
</td>
</tr>
</table>';
			}

		
			
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
			
			switch(trim($fac)){
				case 'mjimenez@mortonsubastas.com' : 
					$username = 'mjimenez@mortonsubastas.com';
					$password = 'tenmisericordia';
				break;
				case 'jjuarez@mortonsubastas.com' :
					$username = 'jjuarez@mortonsubastas.com';
					$password = 'ISHTAR#15';
					$employee = 'Joel Juarez';
				break;
				default:
					$username = 'ehernandez@mortonsubastas.com';
					$password = 'Bigsteal2024;';
				break;	
			}

			$mail->clearAllRecipients();
			$mail->ClearAddresses();
			$mail->ClearCCs();
			$mail->SMTPDebug = 0;                      //Enable verbose debug output
			$mail->isSMTP();   
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;  
			$mail->Port       = 587;                                         //Send using SMTP
			$mail->Username   = $username;                 	    //SMTP username
			$mail->Password   = $password;   
			$mail->setFrom($username, $employee); 
			$mail->AddCC($username);                     //Enable SMTP authentication
			$mail->Subject = 'Devolución de Lotes subasta '.$sub;
			$mail->isHTML(true);
			$mail->Body = "" . $body . "";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->CharSet = 'UTF-8';
			$mail->AddAddress('ehernandez@mortonsubastas.com');

			if ($envia_send) {
				$mail->send();                                                        //When I want to send a email
				echo 'Mensaje se envio correctamente....';
			} else {
				echo "<H1>NO SE ENVIO EL CORREO</H1>";
			}
			$mail->clearAllRecipients();
			$mail->ClearAddresses();
			$mail->ClearCCs();
		} catch (Exception $e) {
			echo "Hubo un  Error: {$mail->ErrorInfo}";
		}
		//</html>
	}
