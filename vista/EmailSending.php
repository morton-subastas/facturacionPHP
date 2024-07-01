
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

      //echo "llegaA";
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      //$mail->Username   = ''.trim($all_AnUser['usu_email']).'';                 	    //SMTP username
      //$mail->Password   = ''.trim($all_AnUser['gmail20']).'';                               //SMTP password

      switch ($fac) {
        case 'mjimenez@mortonsubastas.com':
          $mail->Username = 'mjimenez@mortonsubastas.com';
          $mail->Password = 'tenmisericordia';
          $envia_correo = "Miriam Jiménez Rangel";
          break;
        case 'msanchez@mortonsubastas.com':
          $mail->Username = 'msanchez@mortonsubastas.com';
          $mail->Password = 'ManeMorton';
          $envia_correo = "Manuel Sánchez";
          break;
        default:
          // code...
          break;
      }
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //echo "U*".$all_AnUser['usu_email']."*<br>";
      //echo "C*".$all_AnUser['gmail20']."*<br>";
      //Recipients
      //$mail->setFrom('msanchez@mortonsubastas.com', 'CORREO');
      //$mail->addAddress('msanchez@mortonsubastas.com', 'CORREO');     //Add a recipient

      //$mail->setFrom('mjimenez@mortonsubastas.com', 'CORREO');
      //$mail->addAddress('mjimenez@mortonsubastas.com', 'CORREO');     //Add a recipient
      $mail->setFrom($fac, $envia_correo);
      //$mail->addAddress($fac,'CORREO');
      $mail->addBCC($fac, $envia_correo);

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Recontratación de Lotes';

      //$conn = new mysqli("localhost", "root", "99HHxhdnhM6D", "timbrado");

      $Host = "localhost";
      $User = "root";
      $Password = "h0rKm8dEwHZz";
      $DataBase = "timbrado";
      $conexion = mysqli_connect($Host, $User, $Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");


      $fin = trim($_POST['finaliza']);
      //echo "fin-".$fin."-<br>";
      $var = 'correo' . $fin;
      //echo "var-".$var."-<br>";
      $cor = trim($_POST[$var]);
      //echo "cor-".$cor."-<br>";
      //if ($cor <> ''){ session_start();  $_SESSION['correo'] = trim($cor);  } else { session_start(); $cor = trim($_SESSION['correo']);}
      $emp = trim($_POST['empieza']);
      //echo "emp-".$emp."-<br>";
      //if ($emp <> ''){ session_start();  $_SESSION['empieza'] = $emp;  } else {  session_start(); $emp = $_SESSION['empieza'];}
      $fin = trim($_POST['finaliza']);
      //echo "fin-".$fin."-<br>";
      //if ($fin <> ''){ session_start();  $_SESSION['finaliza'] = $fin;  } else {  session_start(); $fin = $_SESSION['finaliza'];}
      //$var1 = 'subasta'.$fin;
      //echo "var".$var1."<br>";
      $sub = trim($_POST['subasta']);
      //echo "sub-".$sub."-<br>";
      //if ($sub <> ''){ session_start();  $_SESSION['subasta'] = $sub;  } else {  session_start(); $sub = $_SESSION['subasta'];}
      $Ya = $_POST['Yano'];  //ON YA NO SE OFRECERA
      //echo "ya-".$ya."-<br>";
      //echo "<b>Contraro-".$con."-Partida-".$par."-Paleta-".$pal."-Descripcion-".$des."-<br>";
      //echo "-Reserva-".$res."-Ofrece-".$ofr."-Nombre-".$nom."-Correo-".$cor."<br>";
      //echo "Cor:".$cor."-Empieza:".$emp."-Finaliza:".$fin."-Subasta:".$sub."<br>";
      //echo "-Subasta-".$sub."-Empieza -".$emp."- y Finaliza -".$fin."-Ya:".$Ya."-</b>";

      $variable = getEmail($sub);
      $cuantos  = count($variable);
      $suma = 0;
      $contador = $suma + 1;
      $temporal = 0;

      echo '<a href="SearchSellers.php?subasta=' . $sub . '" onclick="" class="btn-lg ov-btn-slide-close">Regresar</a>';
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
      $emp_t = $emp;
      $fin_t = $fin;
      while ($emp_t <= $fin_t) {
        //echo "-".$variable[$emp_t]["email"]."-<br>";
        //echo "-".$cor."<br>";
        if (trim($variable[$emp_t]["email"]) == trim($cor)) {
          //var_dump($variable[$emp_t]);
          $nombre = $variable[$emp_t]["firstname"] . " " . $variable[$emp_t]["lastname"];
          //echo "nombre".$nombre."<br>";
          $emp_t = $fin_t;
        }
        $emp_t  = $emp_t + 1;
      }
      //echo "--".$_POST['radio']."--";
      $body .= "<font face='Helvetica, serif'>" . $nombre . "<br>Presente:<br><br><p style='text-align:justify'> Para dar seguimiento a sus lotes no vendidos en la subasta <b>" . $sub . "</b>, a continuación le envío el listado de sus lotes con el nuevo precio de reserva para ser incluidos nuevamente en una próxima subasta. Si está de acuerdo, le pido responder con un 'Acepto' para dar seguimiento.</p>";
      echo "<font face='Helvetica, serif'> " . $nombre . "<br>Presente:<br><br><p style='text-align:justify'> Para dar seguimiento a sus lotes no vendidos en la subasta <b>" . $sub . "</b>, a continuación le envío el listado de sus lotes con el nuevo precio de reserva para ser incluidos nuevamente en una próxima subasta. Si está de acuerdo, le pido responder con un 'Acepto' para dar seguimiento.</p>";

      $body .= "<br><br>";
      echo  " <br><br>";
      /**/
      $body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
      echo "<table style='margin: 5px auto; font-size: 16px;'>";
      $body .=  "<tr>";
      echo  "<tr>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>CONTRATO</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
      echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA ANTERIOR</center></th>";
      echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>RESERVA ANTERIOR</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>NUEVA RESERVA</center></th>";
      echo  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>NUEVA RESERVA</center></th>";
      $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>IMAGEN</center></th>";
      echo  "<th style='padding: 15px;background: #004d43; color: #fff'><center>IMAGEN</center></th>";
      $body .=  "</tr>";
      echo "</tr>";
      while ($emp <= $fin) {
        //echo "<b>".$emp.")entro:-".$ofr."-</b><br>";

        $CON_R = trim($variable[$emp]["receipt"]);
        $PAR_R = trim($variable[$emp]["item"]);
        $lot_RFC = substr($variable[$emp]["salelot"], 5, 12);
        $PAL_R = trim($lot_RFC);

        $EMA_R = trim($variable[$emp]["email"]);
        /*if ($conn->connect_error) {
              die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
              $resultado = "ERROR";
            }
            else{*/
        $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $CON_R . "' and `partida`='" . $PAR_R . "' and `paleta`='" . $PAL_R . "' and `correo`='" . $cor . "'";
        //echo "SQL: ".$sql."<br>";

        $resultado = mysqli_query($conexion, $sql);
        $numero_filas = mysqli_num_rows($resultado);
        //echo "numero".$numero_filas;
        //while ($fila = $result->fetch_assoc()){
        while ($fila = mysqli_fetch_array($resultado)) {
          //echo "entra:<br>";

          if ($fac == 'msanchez@mortonsubastas.com') {
            $correo_envia = 'masv0104@yahoo.com.mx';
          } else {
            //$correo_respaldo('msanchez@mortonsustas.com');
            //$mail->addAddress($correo_respaldo, 'CORREO');
            $correo_envia = $fila['correo'];
            //$nombre2 = $fila["firstname"]." ".$variable[$i]["lastname"];
          }

          $mail->addAddress($correo_envia, $correo_envia);

          //echo "dos<br>";
          //echo "<h1>".$variable[$emp]["email"]."</h1>";
          $va_enviar = trim($variable[$emp]["email"]);
          //$mail->addAddress($va_enviar, $nombre);
          //echo $va_enviar."*<br>";
          //echo "fila:".var_dump($fila)."<br><br>";  //echo $fila["ofrece"]."<br>";
          $query = "UPDATE `emailenviados` SET `status` = 'ENVIADO' WHERE `contrato` = '" . $CON_R . "' AND `partida` = '" . $PAR_R . "' AND `paleta` ='" . $PAL_R . "' AND `correo` = '" . $cor . "'";
          //echo "update:".$query."<br>";
          //$result = $conn->query($query);
          $result = mysqli_query($conexion, $query);

          $body .=  "<tr>";
          echo "<tr>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>Contrato:<b>" . $CON_R . "</b><br>Partida:<b>" . $PAR_R . "</b><br>Lote: <b>" . substr($variable[$emp]["salelot"], 5, 12) . "</b><br></td>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>" . $variable[$emp]["descript"] . "</center></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>" . $variable[$emp]['descript'] . "</center></td>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$" . number_format($variable[$emp]["reserve"]) . " MXN</center></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center>$" . number_format($variable[$emp]['reserve']) . " MXN</center></td>";
          $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>$" . number_format($fila["ofrece"]) . " MXN</b></center></td>";
          echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'><center><b>$" . number_format($fila['ofrece']) . " MXN</b></center></td>";
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

      $body .= "<p style='text-align:justify'>Si contamos con su autorización le informo que se dejarán descansar algunas subastas antes de ser programados, regularmente 4 semanas ";
      echo "<p style='text-align:justify'>Si contamos con su autorización le informo que se dejarán descansar algunas subastas antes de ser programados, regularmente 4 semanas ";
      $body .= "después de su autorización.  En el caso de los óleos, acuarelas, grabados, litografías, etc., debido al volumen que tenemos en espera, tardarán ";
      echo "después de su autorización.  En el caso de los óleos, acuarelas, grabados, litografías, etc., debido al volumen que tenemos en espera, tardarán ";
      $body .= "un poco más en ser programados. De cualquier manera le mantendremos al tanto.</p>";
      echo "un poco más en ser programados. De cualquier manera le mantendremos al tanto.</p>";
      $body .= "<p style='text-align:justify'>En caso de preferir la devolución de los lotes, le pido contactar a <a href='tel:5552833140' style='font-weight:bold;color:#004d43;'>Miriam Jiménez al 55 52 83 31 40 ext. 5093</a> o ";
      echo "<p style='text-align:justify'>En caso de preferir la devolución de los lotes, le pido contactar a <a href='tel:5552833140' style='font-weight:bold;color:#004d43;'>Miriam Jiménez al 55 52 83 31 40 ext. 5093</a> o ";
      $body .= "vía correo electrónico a <a href='mailto:mjimenez@mortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> , para que le informe sobre la  ubicación de sus lotes.<br<br>";
      echo "vía correo electrónico a <a href='mailto:mjimenez@mortonsubastas.com' style='font-weight:bold; color:#004d43;'>mjimenez@mortonsubastas.com</a> , para que le informe sobre la  ubicación de sus lotes.<br<br>";
      $body .= " Los horarios para devolución tanto en Cerro de Mayka #115 como en Av. Constituyentes # 910, son de lunes a viernes de 9:30 a.m. 6:00 p.m.";
      echo " Los horarios para devolución tanto en Cerro de Mayka #115 como en Av. Constituyentes # 910, son de lunes a viernes de 9:30 a.m. 6:00 p.m.";
      if ($_POST['radio'] == 'Mayka') {
        $body .= "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec</p></a><br><br>";
        echo "Ver mapa	<a href='https://www.google.com.mx/maps/place/Morton+Subastas+Sal%C3%B3n+Cerro+de+Mayka/@19.4272811,-99.2209882,16z/data=!4m5!3m4!1s0x85d201898e215555:0x9753601b8d0ce520!8m2!3d19.4271639!4d-99.2182472'>Cerro de Mayka No. 115, Col. Lomas de Chapultepec</p></a><br><br>";
      }
      if ($_POST['radio'] == 'Constituyentes') {
        $body .= "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a></p><br><br>";
        echo "Ver mapa	<a href='https://www.google.com/maps/place/Av+Constituyentes+910,+Lomas+Altas,+Miguel+Hidalgo,+11950+Ciudad+de+M%C3%A9xico,+CDMX/@19.39566,-99.228795,16z/data=!4m5!3m4!1s0x85d201a67892b40d:0x3575f03b9aaca225!8m2!3d19.3956775!4d-99.2287547?hl=es-419'>Av Constituyentes 910, Lomas Altas, CDMX, México ,CP 11950</a></p><br><br>";
      }
      $body .= "<p style='text-align:justify'>Para las devoluciones de joyeria, favor de contactar a Alejandro Suari, al 55 5283 3140 ext. 6897 o  ";
      echo "<p style='text-align:justify'>Para las devoluciones de joyeria, favor de contactar a Alejandro Suari, al 55 5283 3140 ext. 6897 o  ";
      $body .= "vía correo electrónico asuari@mortonsubastas.com, para concertar una cita.</p><br>";
      echo "vía correo electrónico asuari@mortonsubastas.com, para concertar una cita.</p><br>";
      //$body .= "<a href='https://www.google.com.mx/maps/place/Morton+Subastas,+S.A+de+C.V./@19.4203164,-99.2108655,18z/data=!4m5!3m4!1s0x85d21ce7601f431d:0x757f8eea0d77d45f!8m2!3d19.4205626!4d-99.2110705'>Monte Athos No. 179, Col. Lomas de Chapultepec</a><br><br>";
      //echo "<a href='https://www.google.com.mx/maps/place/Morton+Subastas,+S.A+de+C.V./@19.4203164,-99.2108655,18z/data=!4m5!3m4!1s0x85d21ce7601f431d:0x757f8eea0d77d45f!8m2!3d19.4205626!4d-99.2110705'>Monte Athos No. 179, Col. Lomas de Chapultepec</a><br><br>";
      $body .= "<b>¿NECESITA ENVIAR A UN REPRESENTANTE POR LA DEVOLUCIÓN?</b><br><br>";
      echo "<b>¿NECESITA ENVIAR A UN REPRESENTANTE POR LA DEVOLUCIÓN?</b><br><br>";
      $body .= "Debe presentar la siguiente documentación:<br><br>";
      echo "Debe presentar la siguiente documentación:<br><br>";
      $body .= "<ul><p style='text-align:justify'><li>Carta poder por medio de la cual autorice a un tercero para recoger los lotes. En dicha carta ";
      echo "<p style='text-align:justify'><li>Carta poder por medio de la cual autorice a un tercero para recoger los lotes. En dicha carta ";
      $body .= "deberá contener los lotes que serán devueltos.</p></li>";
      echo "deberá contener los lotes que serán devueltos.</p></li>";
      $body .= "<li>Copia de la identificación del consignante adjunta a la carta poder.</li>";
      echo "<li>Copia de la identificación del consignante adjunta a la carta poder.</li>";
      $body .= "<p style='text-align:justify'><li>Copia de la Identificación de la persona autorizada para recoger los lotes.</p></li><br>";
      echo "<p style='text-align:justify'><li>Copia de la Identificación de la persona autorizada para recoger los lotes.</p></li></ul><br>";
      $body .= "<p style='text-align:justify'>Quedamos atentos en caso de que tenga cualquier duda o comentario.</p><br>";
      echo "<p style='text-align:justify'>Quedamos atentos en caso de que tenga cualquier duda o comentario.</p><br>";
      $body .= "Saludos cordiales.<br>";
      echo "Saludos cordiales.<br>";

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

      $mail->Body = "" . $body . "";
      //$mail->Body = "BODDYYYY";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      //echo "antes de enviar";
      $mail->CharSet = 'UTF-8';
      $mail->send();
      echo 'Mensaje se envio correctamente';
      $mail->ClearAddresses();
    } catch (Exception $e) {
      echo "Hubo un  Error: {$mail->ErrorInfo}";
    }
    //</html>
  }
