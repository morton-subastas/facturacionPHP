<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">

<?php

    session_start();
    $fac = $_SESSION['email'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    if (($fac != '')) {
        $conn = new mysqli("localhost", "root", "", "timbrado");
        include "head.php";
        include "aside.php";
        include 'funciones_RFC.php';
        require_once("../Controlador/controladorUsuarios.php");
        require_once("../Modelo/modeloUsuarios.php");
        $all_AnUser = ControladorUsuarios::SearchUser($fac);
        $bidderInfo = getBidderInfo($_POST['custno'], $_POST['saleno']);

        echo '<a style="float:right;" href="searchOffers.php?subasta='.trim($_POST['saleno']).'" class="btn-lg ov-btn-slide-close">Regresar</a>';
    
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
        echo $bidderInfo[0]['firstname']." ".$bidderInfo['lastname'];
        echo "<p>Estimado comprador: </p>";
        $body .= "<p>Estimado comprador: </p>";
        echo "<p>Muchas gracias por su interés en participar en nuestra ".$bidderInfo[0]['salename']." ".$bidderInfo[0]['saleno'].", que se llevará acabo el ".$bidderInfo[0]['edate']."";
        $body .= "<p>Muchas gracias por su interés en participar en nuestra ".$bidderInfo[0]['salename']." ".$bidderInfo[0]['saleno'].", que se llevará acabo el ".$bidderInfo[0]['edate']."";
        echo "<table class='table' style='margin: 5px auto; font-size: 16px;'>
                <tr>
                    <th>Lote</th>
                    <th>Descripción</th>
                    <th>Oferta</th>
                    <th>Reserva</th>
                    <th>Estimado Bajo</th>
                    <th>Estimado Alto</th>
                    <th></th>
                <tr>";
        $body .= "<table class='table' style='margin: 5px auto; font-size: 16px;'>
                    <tr>
                        <th>Lote</th>
                        <th>Descripción</th>
                        <th>Oferta</th>
                        <th>Reserva</th>
                        <th>Estimado Bajo</th>
                        <th>Estimado Alto</th>
                        <th></th>
                    <tr>";

        for ($i=0; $i < count($bidderInfo); $i++) {
            $valor = "/";
            $este = "\ ";
            $este = trim($este);
            $img = $bidderInfo[$i]["pictpath"];
            $cambio = str_replace($este, $valor, $img);
            echo "<tr>
                    <td>".$bidderInfo[$i]['lot']."</td>
                    <td>".$bidderInfo[$i]['descript']."</td>
                    <td>".$bidderInfo[$i]['bid']."</td>
                    <td>".$bidderInfo[$i]['reserve']."</td>
                    <td>".$bidderInfo[$i]['low']."</td>
                    <td>".$bidderInfo[$i]['high']."</td>
                    <td><img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'></td>
                    </tr>";
            $body .= "<tr>
                        <td>".$bidderInfo[$i]['lot']."</td>
                        <td>".$bidderInfo[$i]['descript']."</td>
                        <td>".$bidderInfo[$i]['bid']."</td>
                        <td>".$bidderInfo[$i]['reserve']."</td>
                        <td>".$bidderInfo[$i]['low']."</td>
                        <td>".$bidderInfo[$i]['high']."</td>
                        <td><img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'></td>
                    </tr>";
                    
        }

        echo "</table>";
        $body .= "</table>";
        echo "<p>Lo invitamos a consultar el catálogo digital en nuestro sitio web https://mortonsubastas.com</p>";
        $body .= "<p>Lo invitamos a consultar el catálogo digital en nuestro sitio web https://mortonsubastas.com</p>";
        echo "<p>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.*</p>";
        $body .= "<p>Los resultados de la misma se harán llegar un día posterior a la fecha en que se realizó la subasta.*</p>";
        echo "<p>Si tiene alguna duda, favor de comunicarse con Blanca Sánchez, coordinadora de Ofertas en Ausencia a la extensión 3149</p>";
        $body .= "<p>Si tiene alguna duda, favor de comunicarse con Blanca Sánchez, coordinadora de Ofertas en Ausencia a la extensión 3149</p>";
        echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
        $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
       
        echo "<table width='100%'>
        <tr>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
                </a>
            </td>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
                </a>
            </td>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
                </a>
            </td>
            <td  style='padding: 15px; width='25%'>
            </td>
            
        </tr></table><br><br>";

        $body .= "<table width='100%'>
        <tr>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/avisodeprivacidad/' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/aviso_privacidad_button.jpg'>
                </a>
            </td>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/informacion/facturacion.php' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/fact_button.jpg'>
                </a>
            </td>
            <td style='padding: 15px; width='25%'>
                <a href='https://mortonsubastas.com/informacion/retencion.php' TARGET='_BLANK'>
                    <img src='https://mortonsubastas.com/new/img/constancia_retencion_button.jpg'>
                </a>
            </td>
            <td  style='padding: 15px; width='25%'>
            </td>
            
        </tr></table><br><br>";

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

            $body .= '<table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#c4d2d0;">
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

        $body .= "</body>";
        echo "</body>";
        $body .= "</html>";
        echo "</html>";


        $mail = new PHPMailer();

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fgomez@mortonsubastas.com';                 	    //SMTP username
        $mail->Password   = 'Fgomezsis07!';                               //SMTP password
        $mail->SMTPSecure = 'tsl';            //Enable implicit TLS encryption
        $mail->Port       = 587;       
        $mail->isHTML(true);            
        $mail->setFrom('ehernandez@mortonsubastas.com', 'Morton Subastas');                      //Set email format to HTML
        $mail->Subject = "Confirmación de oferta(s) para subasta ".$bidderInfo[0]['saleno']." ";
        $mail->Body = "".$body."";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->CharSet = 'UTF-8';
        $mail->AddAttachment($fileToSend);
        $mail->AddAddress("fgomez@mortonsubastas.com");
        
        if(!$mail->Send())
            {
                echo $mail->ErrorInfo;
            }
            else{
                
                echo "todo bien";
    
            }
       

    }

