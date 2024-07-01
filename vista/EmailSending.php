
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
      //echo "<br>VISTA: envia controlador";
      $all_AnUser = ControladorUsuarios::SearchUser($fac);

      $Host = "localhost";
      $User = "root";
      $Password = "h0rKm8dEwHZz";
      //$Password = "";
      $DataBase = "timbrado";
      $conexion = mysqli_connect($Host, $User, $Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");


      $fin = trim($_POST['finaliza']);
      //echo "fin-".$fin."-<br>";
      $var = 'correo' . $fin;
      $cor = trim($_POST['email']);
      $emp = trim($_POST['empieza']);
    
      $fin = trim($_POST['finaliza']);
      $sub = trim($_POST['subasta']);
      
      $Ya = $_POST['Yano'];  

      $variable = getEmail($sub);
      $cuantos  = count($variable);
      $suma = 0;
      $contador = $suma + 1;
      $temporal = 0;
      $emailCor = $_POST['email'];

      echo '<a style="float:right;" href="SearchSellers.php?subasta=' . $sub . '&rol=EMAIL" onclick="" class="btn-lg ov-btn-slide-close">Regresar</a>';
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
      //$body .=  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
      //echo  "<h2 style='font-size: 30px; color: #004d43; font-family: Helvetica,sans-serif;'>¡GRACIAS POR CONFIAR!</h2>";
      $body .= "<p style='line-height: 1.6; font-size: 14px'>";
      echo "<p style='line-height: 1.6; font-size: 14px'>";
      $emp_t = $emp;
      $fin_t = $fin;
      while ($emp_t <= $fin_t) {
        if (trim($variable[$emp_t]["email"]) == trim($cor)) {
          $nameEvaluate = $variable[$emp_t]["firstname"] . " " . $variable[$emp_t]["lastname"];
          if(trim($nameEvaluate)==""){
            $nombre = "<b>" . $variable2[$j]["company"] . "</b>";
          }else{
            $nombre = "<b>" . $variable[$emp_t]["firstname"] . " " . $variable[$emp_t]["lastname"] . "</b>";
          }
          $receipt = $variable[$emp_t]['receipt'];
          $emp_t = $fin_t;
        }
        $emp_t  = $emp_t + 1;
      }
      //echo "--".$_POST['radio']."--";
      $body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br><p style='text-align:justify'> Con base a su contrato  <b>" . $receipt . "</b>, le envío la propuesta de precios para su consideración, en caso de estar de acuerdo favor de responder con un 'acepto propuesta' para que puedan ser reprogramados.</p>";
      echo "<font face='Helvetica, serif'>" . $nombre . "<br>Estimado Consignante:<br><br><p style='text-align:justify'> Con base a su contrato  <b>" . $receipt . "</b>, le envío la propuesta de precios para su consideración, en caso de estar de acuerdo favor de responder con un 'acepto propuesta' para que puedan ser reprogramados.</p>";

      $body .= "<br>";
      echo  " <br>";
      /**/
      $body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
      echo "<table style='margin: 5px auto; font-size: 16px;'>";
      $body .=  "<tr>";
      echo  "<tr>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
      if($fac == 'mjimenez@mortonsubastas.com'){
        $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA ANTERIOR</center></th>";
        echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA ANTERIOR</center></th>";
      }
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>NUEVA RESERVA</center></th>";
      echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>NUEVA RESERVA</center></th>";
      if($fac == 'jjuarez@mortonsubastas.com'){
        $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>ESTIMADOS</center></th>";
        echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>ESTIMADOS</center></th>";
      }
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>IMAGEN</center></th>";
      echo  "<th style='padding: 15px;background: #004d43; color: #fff'><center>IMAGEN</center></th>";
      $body .=  "</tr>";
      echo "</tr>";
      while ($emp <= $fin) {

        $CON_R = trim($variable[$emp]["receipt"]);
        $PAR_R = trim($variable[$emp]["item"]);
        $lot_RFC = trim(substr($variable[$emp]["salelot"], 5, 12));
        $PAL_R = trim($lot_RFC);

        $EMA_R = trim($variable[$emp]["email"]);
        $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $CON_R . "' and `partida`='" . $PAR_R . "' and `paleta`='" . $lot_RFC . "' and `correo`='" . $emailCor . "' AND status != 'ENVIADO'";
       // echo $sql;
        $resultado = mysqli_query($conexion, $sql);
        $numero_filas = mysqli_num_rows($resultado);
        while ($fila = mysqli_fetch_array($resultado)) {
          $va_enviar = trim($variable[$emp]["email"]);
          //$query = "UPDATE `emailenviados` SET `status` = 'ENVIADO' WHERE `contrato` = '" . $CON_R . "' AND `partida` = '" . $PAR_R . "' AND `paleta` ='" . $lot_RFC . "' AND `correo` = '" . $emailCor . "'";
          //$result = mysqli_query($conexion, $query);
          //var_dump($result);

          $body .=  "<tr>";
          echo "<tr>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>" . $variable[$emp]["descript"] . "</center></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>" . $variable[$emp]['descript'] . "</center></td>";
          if($fac == 'mjimenez@mortonsubastas.com'){
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$" . number_format($variable[$emp]["reserve"]) . " MXN</center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$" . number_format($variable[$emp]['reserve']) . " MXN</center></td>";
          }
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>$" . number_format($fila["ofrece"]) . " MXN</b></center></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>$" . number_format($fila['ofrece']) . " MXN</b></center></td>";
          if($fac == 'jjuarez@mortonsubastas.com'){
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>" . $fila["estimado"] . " MXN</b></center></td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>" . $fila["estimado"] . " MXN</b></center></td>";
          }
          $img = $variable[$emp]["pictpath"];
          //echo "IMG*".$img."*<br>";
          $valor = "/";
          $este = "\ ";

          $este = trim($este);
          $cambio = str_replace($este, $valor, $img);
          $cambio = str_replace("p:/", "", $cambio);
          //echo "IMG2-".$cambio."<br>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43;'><img src='https://mimorton.com/imglink/$cambio' width='60%' heigth='60%'><br>Observaciones:<b>" . $fila['comentarios50'] . "</b></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43;'><img src='https://mimorton.com/imglink/$cambio' width='60%' heigth='60%'><br>Observaciones:<b>" . $fila['comentarios50'] . "</b></td>";

          $body .= "</tr>";
          echo "</tr>";
          $fechaRe = $fila["fecha_re"];
          //break;
        }
        $cuenta = $cuenta - 1;
        $emp = $emp + 1;
      }


      $body .= "</table>";
      echo "</table>";
      $body .= "<br>";
      echo "<br>";


      $body .= "
      <table width='100%'><tr>
      <td style='padding: 15px; width:25%;'>
        <a href='https://mortonsubastas.com/informacion/recoleccion_consignantes.php' TARGET='_BLANK'>
          <img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
        </a>
      </td>
      <td style='padding: 15px; width:25%;'>
      <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
        <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
      </a>
      </td>
      <td style='padding: 15px; width:25%;'></td>
      <td style='padding: 15px; width:25%;'></td>
      </tr></table>";

      echo "
      <table width='100%'><tr>
      <td style='padding: 15px; width:25%;'>
        <a href='https://mortonsubastas.com/informacion/recoleccion_consignantes.php' TARGET='_BLANK'>
          <img src='https://mortonsubastas.com/new/img/recoleccion_button.jpg'>
        </a>
      </td>
      <td style='padding: 15px; width:25%;'>
      <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
        <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
      </a>
      </td>
      <td style='padding: 15px; width:25%;'></td>
      <td style='padding: 15px; width:25%;'></td></tr></table>";
    
    
      
      if($fac == 'mjimenez@mortonsubastas.com'){
        echo "<p>En caso que podamos contar con su autorización, su inventario se dejará descansar algunas subastas antes de ser programadas, regularmente 4 semanas después de su autorización, dependiendo de la disponibilidad de espacio.<p>";
        $body .= "<p>En caso que podamos contar con su autorización, su inventario se dejará descansar algunas subastas antes de ser programadas, regularmente 4 semanas después de su autorización, dependiendo de la disponibilidad de espacio.<p>";
        echo "<p>En el caso de los óleos, acuarelas, grabados, litografías, etc. debido al volúmen que tenemos en espera, tardarán de 2 a 3 meses en ser programados. De cualquier manera le mantendremos al tanto. </p>";
        $body .= "<p>En el caso de los óleos, acuarelas, grabados, litografías, etc. debido al volúmen que tenemos en espera, tardarán de 2 a 3 meses en ser programados. De cualquier manera le mantendremos al tanto. </p>";
        echo "<p>IMPORTANTE: Si no es de su interés seguir participando en subasta, puede pasar por la devolución correspondiente en Lago Andromaco 84, Granada, Miguel Hidalgo, 11529 Ciudad de México, CDMX. Le recordamos que cuenta con 15 días hábiles después de la fecha de la subasta para no pagar gastos por almacenaje.</p>";
        $body .= "<p>IMPORTANTE: Si no es de su interés seguir participando en subasta, puede pasar por la devolución correspondiente en Lago Andromaco 84, Granada, Miguel Hidalgo, 11529 Ciudad de México, CDMX. Le recordamos que cuenta con 15 días hábiles después de la fecha de la subasta para no pagar gastos por almacenaje.</p>";
        echo "<p>Si tiene alguna duda, por favor contactarme al correo electrónico mjimenez@mortonsubastas.com</p>";
        $body .= "<p>Si tiene alguna duda, por favor contactarme al correo electrónico mjimenez@mortonsubastas.com</p>";
      }else{

        echo "<p><b>NOTA IMPORTANTE: En caso de no aceptar la recontratación, requerimos haga la recolección de sus piezas el ".$fechaRe.", de lo contrario, estas se incluirán en la subasta señalada con los estimados que se indican.</b></p>";
        $body .= "<p><b>NOTA IMPORTANTE: En caso de no aceptar la recontratación, requerimos haga la recolección de sus piezas el ".$fechaRe.", de lo contrario, estas se incluirán en la subasta señalada con los estimados que se indican.</b></p>";
        echo "<p>Ubicación: Av. Constituyentes no. 910, col. Lomas Altas. Horario de Atención: lunes a viernes de 09:30 am a 18:00 hrs.</p>";
        $body.= "<p>Ubicación: Av. Constituyentes no. 910, col. Lomas Altas. Horario de Atención: lunes a viernes de 09:30 am a 18:00 hrs.</p>";
      }
      
      $body .= "Saludos cordiales.<br>";
      echo "Saludos cordiales.<br>";


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


      $body .= "</p>";
      echo "</p>";
      $body .= "<hr style='border: 1px solid #004d43; margin: 40px auto;'>";
      echo "<hr style='border: 1px solid #004d43; margin: 40px auto; opacity: 1'>";

      $body .= "<p style='text-align: center; font-size:14px'>";
      echo "<p style='text-align: center; font-size:14px'>";
      $body .= "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro.jpg' alt='' style='width: 20%;'><br>";
      echo "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro.jpg' alt='' style='width: 20%;'><br>";
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


      switch($fac){
        case 'mjimenez@mortonsubastas.com' : 
          $username = 'mjimenez@mortonsubastas.com';
          $password = 'tenmisericordia';
          $name = 'Miriam Jimenez';
        break;
        case 'jjuarez@mortonsubastas.com' :
          $username = 'jjuarez@mortonsubastas.com';
          $password = 'ISHTAR#15';
          $name = 'Joel Juarez';
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
			$mail->setFrom($username, $name);
			//$mail->AddCC($username);                     //Enable SMTP authentication
			$mail->Subject = 'Recontratación de Lotes';
			$mail->isHTML(true);
			$mail->Body = "" . $body . "";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->CharSet = 'UTF-8';
      $mail->addAddress('ehernandez@mortonsubastas.com');
			//$mail->addAddress($emailCor);

		  if ($mail->send()) {                                                   
				echo 'Mensaje se envio correctamente....';
			} else {
				echo "<H1>NO SE ENVIO EL CORREO</H1>";
			}
			$mail->ClearAddresses();


    } catch (Exception $e) {
      echo "Hubo un  Error: {$mail->ErrorInfo}";
    }

  }
