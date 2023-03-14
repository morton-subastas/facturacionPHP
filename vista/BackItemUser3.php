	<?php
  include 'funciones_RFC.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'Phpmailer/Exception.php';
  require 'Phpmailer/PHPMailer.php';
  require 'Phpmailer/SMTP.php';

  session_start();
  $fac = $_SESSION['email'];
  if (($fac != '')) {
    include "head.php";
    include "aside.php";
    $mail = new PHPMailer(true);

    try {
      //$fac = 'mramirez@MortonSubastas.com';
      require_once("../Controlador/controladorUsuarios.php");
      require_once("../Modelo/modeloUsuarios.php");
      //echo "<br>VISTA: envia controlador";
      $all_AnUser = ControladorUsuarios::SearchUser($fac);

      //echo "llega23";
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

      //$mail->Username   = ''.trim($all_AnUser['usu_email']).'';                 	    //SMTP username
      //$mail->Password   = ''.trim($all_AnUser['gmail20']).'';                               //SMTP password
      //$mail->Username = 'msanchez@mortonsubastas.com';
      //$mail->Password = 'ManeMorton';
      switch ($fac) {
        case 'mramirez@mortonsubastas.com':
          //echo "mariana";
          $mail->Username = 'mramirez@mortonsubastas.com';
          $mail->Password = 'Mari197401';
          $envia_correo = 'Mariana Ramirez Mancera';
          break;
        case 'msanchez@mortonsubastas.com':
          $mail->Username = 'msanchez@mortonsubastas.com';
          $mail->Password = 'ManeMorton';
          break;
        default:
          // code...
          break;
      }

      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


      //$mail->setFrom('mramirez@mortonsubastas.com', 'CORREO');
      //$mail->addAddress('mramirez@mortonsubastas.com', 'CORREO');     //Add a recipient
      $mail->setFrom($fac, $envia_correo);
      $mail->addBCC($fac, $envia_correo);
      //$mail->addBCC('msanchez@mortonsubastas.com', 'CORREO DEVOLUCIONES');
      //$mail->addBCC('msanchez@mortonsubastas.com', 'CORREO DEVOLUCIONES');
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Devolución de Lotes';

      //$conn = new mysqli("localhost", "root", "99HHxhdnhM6D", "timbrado");

      $Host = "localhost";
      $User = "root";
      $Password = "h0rKm8dEwHZz";
      $DataBase = "timbrado";
      $conexion = mysqli_connect($Host, $User, $Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");

      //echo "cor-".$cor."-<br>";
      $sub = trim($_POST['subasta']);
      $conTR = trim($_POST['contrato']);
      $lote_b = trim($_POST['lote']);
      $sub = trim($_POST['subasta']);
      $variable = getEmail($sub);
      $cuantos  = count($variable);

      $cuenta = 0;
      //echo "-".$cuantos."-LOTE:".$lote_b."<br>";
      //echo "------------------------<br>";

      while ($cuenta < $cuantos) {

        $esBD = substr($variable[$cuenta]["salelot"], 5, 12);
        /*
						if ($lote_b == $esBD){
              echo "<b>";
            }
						*/
        //echo $cuenta."BD".$esBD."<br>";
        /*
						if ($lote_b == $esBD){
              echo "</b>";
            }
						*/
        //var_dump($variable[$cuenta]["salelot"]);
        $cuenta = $cuenta + 1;
        //echo "***<br>";

      }

      $cuenta2 = 0;
      while ($cuenta2 < $cuantos) {
        //var_dump($variable[$cuenta2]["salelot"]);
        $cuenta2 = $cuenta2 + 1;
      }
      //echo "------------------------<br>";
      $suma = 0;
      $contador = $suma + 1;
      $temporal = 0;

      if ($fac == 'mramirez@mortonsubastas.com') {
        echo '<a href="SearchSellers.php?subasta=' . $sub . '&rol=DEVOLVER" onclick="" class="btn-lg ov-btn-slide-close">Regresar</a>';
      }
      if ($fac == 'mmartinez@mortonsubastas.com') {
        echo '<a href="SearchSellers.php?subasta=' . $sub . '&rol=EMAIL" onclick="" class="btn-lg ov-btn-slide-close">Regresar</a>';
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
      $body .= "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
      echo "<img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;margin-top:20px'>";
      $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
      echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
      //$body .=  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
      //echo  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
      $body .= "<p style='line-height: 1.6; font-size: 14px'>";
      echo "<p style='line-height: 1.6; font-size: 14px'>";
      $nombre = $variable[$emp]["firstname"] . " " . $variable[$emp]["lastname"];

      $body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Presente:<br><br><p style='text-align:justify'> Para dar seguimiento a los lotes no vendidos, de su contrato número <b>" . $contrato . "</b> de la subasta <b>" . $sub . "</b> le pido amablemente pase a recogerlos a más tardar en 5 días hábiles.";
      echo  "<font face='Helvetica, serif'>" . $nombre . "<br>Presente:<br><br><p style='text-align:justify'> Para dar seguimiento a los lotes no vendidos, de su contrato número <b>" . $contrato . "</b> de la subasta <b>" . $sub . "</b> le pido amablemente pase a recogerlos a más tardar en 5 días hábiles.";

      $body .= "En caso de no tener respuesta dentro del tiempo señalado y de acuerdo al contrato de prestación de servicios que firmó con nosotros, se generarán gastos de almacenamiento y Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración. <br><br>";
      echo "En caso de no tener respuesta dentro del tiempo señalado y de acuerdo al contrato de prestación de servicios que firmó con nosotros, se generarán gastos de almacenamiento y Morton Subastas podrá reprogramar su venta automáticamente en otra subasta ajustando el precio a nuestra consideración. <br><br>";

      $body .= "Le sugerimos ponerse en contacto con Mariana Ramirez al 55 5283 3140 ext. 4110 o vía correo electrónico (mramirez@mortonsubastas.com) para darle a conocer la ubicación exacta de sus piezas, ya que, por cuestiones internas de logística, podrían estar ubicadas en Av. Constituyentes # 910 Col. Lomas Altas o en Cerro de Mayka #115. El horario de recolección es de lunes a viernes de 9:30 am a 6:00pm.<br><br>";
      echo "Le sugerimos ponerse en contacto con Mariana Rarmirez al 55 5283 3140 ext. 4110 o vía correo electrónico (mramirez@mortonsubastas.com) para darle a conocer la ubicación exacta de sus piezas, ya que, por cuestiones internas de logística, podrían estar ubicadas en Av. Constituyentes # 910 Col. Lomas Altas o en Cerro de Mayka #115. El horario de recolección es de lunes a viernes de 9:30 am a 6:00pm.<br><br>";

      $body .= "Por último, se le recomienda traer material de empaque si considera que sus piezas así lo requieren, ya que Morton no cuenta con este servicio.<br><br>";
      echo "Por último, se le recomienda traer material de empaque si considera que sus piezas así lo requieren, ya que Morton no cuenta con este servicio.<br><br>";



      $body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
      echo "<table style='margin: 5px auto; font-size: 16px;'>";
      $body .=  "<tr>";
      echo  "<tr>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center></center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center></center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Descripción</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Reserva </center></th>";
      echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Reserva </center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>Imagen</center></th>";
      echo  "<th style='padding: 15px;background: #004d43; color: #fff'><center>Imagen</center></th>";
      $body .=  "</tr>";
      echo "</tr>";

      //echo "Cuenta:<b>".$cuenta."</b><br>Cuantos:".$cuantos."<br>";
      $cuenta = 0;
      while ($cuenta < $cuantos) {
        $esBD = substr($variable[$cuenta]["salelot"], 5, 12);

        //echo $cuenta.")lote-".$lote_b."-esBD-".$esBD."<br>";
        if ($lote_b == $esBD) {


          $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $conTR . "' and `subasta_10`='" . $sub . "' and `paleta`='" . $lote_b . "' ";
          //echo "SQL<br>".$sql."<br>";

          $resultado = mysqli_query($conexion, $sql);
          $numero_filas = mysqli_num_rows($resultado);
          //echo "numero".$numero_filas;
          //while ($fila = $result->fetch_assoc()){
          while ($fila = mysqli_fetch_array($resultado)) {
            //echo "-".$fila['correo']."-<br>";

            //$correo_envia = "halo_10_reach@hotmail.com";
            $correo_envia = $fila['correo'];            //MARIANA-
            $mail->addAddress($correo_envia, 'CORREO DEVOLUCIONES');  //MARIANA-
            //$va_enviar = trim($variable[$emp]["email"]);

            //echo "fila:".var_dump($fila)."<br><br>";  //echo $fila["ofrece"]."<br>";
            //echo "fila".$fila["lugar30"]."<br>";
            $query = "UPDATE `emailenviados` SET `status` = 'ENVIADO/REGRESO' WHERE `contrato` = '" . $conTR . "'  AND `subasta_10` = '" . $sub . "' and `paleta`='" . $lote_b . "'";
            //echo "update:".$query."<br>";
            //$result = $conn->query($query);
            $result = mysqli_query($conexion, $query);

            if ($result == 1) {
              $envia_send = true;
            } else {
              $envia_send = false;
            }
            //echo "<h1>RESULT:".$result."</h1><br>";
            $body .=  "<tr>";
            echo "<tr>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'>Contrato:<b>" . $conTR . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$cuenta]["salelot"], 5, 12) . "</b><br></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'>Contrato:<b>" . $conTR . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$cuenta]["salelot"], 5, 12) . "</b><br></td>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='25%'><center>" . $variable[$cuenta]["descript"] . "</center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center width='25%'>" . $variable[$cuenta]['descript'] . "</center></td>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable[$cuenta]["reserve"]) . " MXN</center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='15%'><center>$" . number_format($variable[$cuenta]['reserve']) . " MXN</center></td>";
            $img = $variable[$cuenta]["pictpath"];
            //echo "IMG*".$img."*<br>";
            $valor = "/";
            $este = "\ ";

            $este = trim($este);
            $cambio = str_replace($este, $valor, $img);
            $cambio = str_replace("p:/", "", $cambio);
            //echo "IMG2-".$cambio."<br>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43;' width='25%'><img src='https://mimorton.com/imglink/$cambio' width='120' heigth='120'><br>";
            //echo "IMG".$cambio;
            if ($fila['lugar30'] == 'Mayka') {
              $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka</a><br><br>";
            }
            if ($fila['lugar30'] == 'Constituyentes') {
              $body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910</a><br><br>";
            }
            if ($fila['lugar30'] == 'Athos175') {
              $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Monte+Athos+175,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4208256,-99.2128501,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f32028f0d9:0xa593e2fff93cbe91!8m2!3d19.4208206!4d-99.2106614'>Monte Athos 175</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Monte+Athos+175,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4208256,-99.2128501,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f32028f0d9:0xa593e2fff93cbe91!8m2!3d19.4208206!4d-99.2106614'>Monte Athos 175</a><br><br>";
            }
            if ($fila['lugar30'] == 'Athos179') {
              $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Monte+Athos+179,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4207255,-99.2130147,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f320651f43:0x51de024e7e5a97ff!8m2!3d19.4207205!4d-99.210826'>Monte Athos 179</a><br><br>";
              echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Monte+Athos+179,+Lomas+-+Virreyes,+Lomas+de+Chapultepec+IV+Secc,+Miguel+Hidalgo,+11000+Ciudad+de+M%C3%A9xico,+CDMX/@19.4207255,-99.2130147,17z/data=!3m1!4b1!4m5!3m4!1s0x85d201f320651f43:0x51de024e7e5a97ff!8m2!3d19.4207205!4d-99.210826'>Monte Athos 179</a><br><br>";
            }
            $body .= "</td>";
            echo "</td>";

            $body .= "</tr>";
            echo "</tr>";
            //break;
          }
        }
        $cuenta = $cuenta + 1;
        //$cuenta = $cuenta + 1;
      }
      $body .= "</table>";
      echo "</table>";
      $body .= "<br>";
      echo "<br>";
      $body .= "<ul>En caso de que el consignante y/o comprador envíen a un tercero a recoger sus lotes, debemos de solicitar y guardar la siguiente documentación:<br><br>";
      echo "<ul>En caso de que el consignante y/o comprador envíen a un tercero a recoger sus lotes, debemos de solicitar y guardar la siguiente documentación:<br><br>";
      $body .= "<li>Carta poder por medio de la cual el consignante o comprador autorice a un tercero a recoger los lotes. En dicha carta se deberán identificar los lotes que estamos entregando.</li>";
      echo "<li>Carta poder por medio de la cual el consignante o comprador autorice a un tercero a recoger los lotes. En dicha carta se deberán identificar los lotes que estamos entregando.</li>";
      $body .= "<li>Copia de la identificación del consignante / comprador adjunta a la carta poder.</li>";
      echo "<li>Copia de la identificación del consignante / comprador adjunta a la carta poder.</li>";
      $body .= "<li>Copia de la Identificación de la persona autorizada para recoger los lotes.</li>";
      echo "<li>Copia de la Identificación de la persona autorizada para recoger los lotes.</li>";
      $body .= "</ul>";
      echo "</ul>";
      $body .= "<br>";
      echo "<br>";
      $body .= "Quedamos atentos en caso de que tenga cualquier duda o comentario. Por favor no deje de revisar nuestros Términos y Condiciones.<br><br>";
      echo "Quedamos atentos en caso de que tenga cualquier duda o comentario.Por favor no deje de revisar nuestros Términos y Condiciones.<br><br>";
      $body .= "Saludos y que tenga un excelente día.<br><br>";
      echo "Saludos y que tenga un excelente día.<br><br>";

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


      //echo $body;

      // $mail->isHTML(true);

      $mail->Body = "" . $body . "";
      //$mail->Body = "BODDYYYY";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      //echo "antes de enviar";
      $mail->CharSet = 'UTF-8';

      if ($envia_send) {
        $mail->send();                                                        //When I want to send a email
        //echo 'NO NADA__Mensaje se envio correctamente....';
        echo "SE ENVIO CORREO";
      } else {
        echo "<H1>NO SE ENVIO EL CORREO</H1>";
      }
      $mail->ClearAddresses();
    } catch (Exception $e) {
      echo "Hubo un  Error: {$mail->ErrorInfo}";
    }
    //</html>
  }
