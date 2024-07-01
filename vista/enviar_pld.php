
<?php
  include 'funciones_RFC.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use Phppot\DataSource;

  require 'Phpmailer/Exception.php';
  require 'Phpmailer/PHPMailer.php';
  require 'Phpmailer/SMTP.php';
  require_once 'DataSource.php';

  session_start();
  $fac = $_SESSION['email'];
  $db = new DataSource();
  $conn = $db->getConnection();

  if (($fac != '')) {
    include "head.php";
    include "aside.php";

    $documentacion = $_POST['documentacion'];
    $subasta = $_POST['subasta'];
    $pdfMoral = '../assets/docs/FORMATO IDENTIDAD PERSONA MORAL.pdf';
    $pdfFisica = '../assets/docs/FORMATO IDENTIDAD PERSONA FISICA.pdf';
    $pdfExtranjero = '../assets/docs/FORMATO IDENTIDAD PERSONA FISICA (EXTENJERA VISITANTE).pdf';

    $mail = new PHPMailer(true);

    try {
      require_once("../Controlador/controladorUsuarios.php");
      require_once("../Modelo/modeloUsuarios.php");
      $all_AnUser = ControladorUsuarios::SearchUser($fac);
      $db = new DataSource();
      $conn = $db->getConnection();
      echo '<a style="float:right;" href="pld.php" class="btn-lg ov-btn-slide-close">Regresar</a>';
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
      $body .= "<title>PLD</title>";
      echo "<title>PLD</title>";
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
   

      
      $body .= "<font face='Helvetica, serif'>Estimado cliente:<br><br><p style='text-align:justify'>Nuevamente muchas gracias por comprar en Morton Subastas.<br><br>Hacemos de su conocimiento que por el monto de su compra, para entregarle la totalidad de sus lotes, la autoridad nos requiere la siguiente documentación.</p>";
      echo "<font face='Helvetica, serif'>Estimado cliente:<br><br><p style='text-align:justify'>Nuevamente muchas gracias por comprar en Morton Subastas.<br><br>Hacemos de su conocimiento que por el monto de su compra, para entregarle la totalidad de sus lotes, la autoridad nos requiere la siguiente documentación.</p</p>";
      $body .= "<br>";
      echo  "<br>";
    /**/
        if($documentacion == 'todo'){
            echo " <table class='table' style='margin: 5px auto; font-size: 16px;  border: 1px solid black;'>
            <tr>
                <th>Persona Física</th>
                <th>Persona Moral</th>
            </tr>
            <tr>
                <td>1. Formato de Identidad Adjunto (debidamente llenado y firmado)</td>
                <td>1. Formato de Identidad Adjunto (debidamente llenado y firmado)</td>
            </tr>
            <tr>
                <td>2. Identificación Oficial </td>
                <td>2. Identificación Oficial del representante legal </td>
            </tr>
            <tr>
                <td>3. Comprobante de domicilio no mayor a 3 meses </td>
                <td>3. Acta Constitutiva </td>
            </tr>
            <tr>
                <td>4. Clave Única de Registro de Población (CURP) </td>
                <td>4. Poder del representante legal </td>
            </tr>
            <tr>
                <td>5. Cédula de Identificación Oficial</td>
                <td>5. Comprobante de domicilio no mayor a 3 meses</td>
            </tr>
            <tr>
                <td></td>
                <td>6. Cédula de identificación Fiscal</td>
            </tr>
        </table>";

        $body .= " 
                <table class='table-striped' style='margin: 5px auto; font-size: 16px;  border: 1px solid black;'>
                <tr>
                    <th>Persona Física</th>
                    <th>Persona Moral</th>
                </tr>
                <tr>
                    <td>1. Formato de Identidad Adjunto (debidamente llenado y firmado)</td>
                    <td>1. Formato de Identidad Adjunto (debidamente llenado y firmado)</td>
                </tr>
                <tr>
                    <td>2. Identificación Oficial </td>
                    <td>2. Identificación Oficial del representante legal </td>
                </tr>
                <tr>
                    <td>3. Comprobante de domicilio no mayor a 3 meses </td>
                    <td>3. Acta Constitutiva </td>
                </tr>
                <tr>
                    <td>4. Clave Única de Registro de Población (CURP) </td>
                    <td>4. Poder del representante legal </td>
                </tr>
                <tr>
                    <td>5. Cédula de Identificación Oficial</td>
                    <td>5. Comprobante de domicilio no mayor a 3 meses</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6. Cédula de identificación Fiscal</td>
                </tr>
            </table>";
        }else{
            $docs = explode(',',$documentacion);
            foreach ($docs as $key => $value) {
                echo "<p><b>- ".$value."</b></p>";
                $body .= "<b><p>- ".$value."</b></p>";
            }
        }
        
      $body .= "<br>";
      echo "<br>";


      $body .= "
      <table width='100%'><tr>
        <td style='padding: 15px; width:25%;'>
            <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
            </a>
        </td>
        <td style='padding: 15px; width:25%;'></td>
        <td style='padding: 15px; width:25%;'></td>
        <td style='padding: 15px; width:25%;'></td>
      </tr></table>";

      echo "
      <table width='100%'>
        <tr>
            <td style='padding: 15px; width:25%;'>
                <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
                </a>
            </td>
            <td style='padding: 15px; width:25%;'></td>
            <td style='padding: 15px; width:25%;'></td>
            <td style='padding: 15px; width:25%;'></td>
        </tr>
        </table>";
    
    
      echo "<p>Es importante nos sea enviada al correo creditoycobranza@mortonsubastas.com para evitar retrasos en la entrega de las piezas adquiridas. </p>";
      $body .= "<p>Es importante nos sea enviada al correo creditoycobranza@mortonsubastas.com para evitar retrasos en la entrega de las piezas adquiridas. </p>";
      if($documentacion == 'todo'){
        echo "<p style='color:red;'>Es necesario marcar con 'x' o rellenar los recuadros del segmento que se muestra enseguida en el formato adjunto.</p>";
        $body .= "<p style='color:red;'>Es necesario marcar con 'x' o rellenar los recuadros del segmento que se muestra enseguida en el formato adjunto.</p>";
        echo "<img src='../assets/img/docpld.jpg'><br><br>";
        $body .= "<img src='../assets/img/docpld.jpg'><br><br>";
      }
      $body .= "Saludos cordiales.<br><br>";
      echo "Saludos cordiales.<br><br>";


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
        default:
          $username   = 'hdezmortonsubastas@gmail.com';                 	    //SMTP username
          $password   = 'hgwe nxpv rxig vrzm';
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
			//$mail->setFrom($username, $name);
			//$mail->AddCC($username);                     //Enable SMTP authentication
			$mail->Subject = 'Documentación necesaria para entrega de sus lotes';
			$mail->isHTML(true);
			$mail->Body = "" . $body . "";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->CharSet = 'UTF-8';
            $mail->AddAttachment($pdfFisica);
            $mail->AddAttachment($pdfMoral);
            $mail->AddAttachment($pdfExtranjero);
			$mail->addAddress($_POST['correo']);
		    if ($mail->send()) {    
                $query = "UPDATE `pld` SET `status` = 'ENVIADO' WHERE `id` = '" . $_POST['id']. "'";
				$result = $conn->query($query);
				echo '<h1>Mensaje se envio correctamente</h1>';
			} else {
				echo "<H1>NO SE ENVIO EL CORREO</H1>";
			}
			$mail->ClearAddresses();
    } catch (Exception $e) {
      echo "Hubo un  Error: {$mail->ErrorInfo}";
    }

  }
