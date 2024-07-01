<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">

<?php

    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

    // Allow from any origin
    if(isset($_SERVER["HTTP_ORIGIN"]))
    {
    // You can decide if the origin in $_SERVER['HTTP_ORIGIN'] is something you want to allow, or as we do here, just allow all
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    }
    else
    {
    //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
    header("Access-Control-Allow-Origin: *");
    }

    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 600");    // cache for 10 minutes

    if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
    {
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    //Just exit with 200 OK with the above headers for OPTIONS method
    exit(0);
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    session_start();
    $fac = $_SESSION['email'];

    if (($fac != '')) {

        $conn = new mysqli("localhost", "root", "", "timbrado");
        include "head.php";
        include "aside.php";
        include 'funciones_RFC.php';
        require_once("../Controlador/controladorUsuarios.php");
		require_once("../Modelo/modeloUsuarios.php");
        

        $info = json_decode($_POST['info']);
        $name = $_FILES['file']['name'];
		$all_AnUser = ControladorUsuarios::SearchUser($fac);


        $uploadDir = '../files/1/edoCuenta/';
        $fileToSend = $uploadDir. basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $fileToSend);


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
        $body .= "<div style='max-width: 900px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        echo "<div style='max-width: 900px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; background: #fff; padding: 10px 40px;'>";
        $body .= "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro_facturacion.jpg' style='width: 250px;margin-top:20px'>";
        echo "<img src='https://mortonsubastas.com/new/img/ms_caballo_negro_facturacion.jpg' style='width: 250px;margin-top:20px'>";
        $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
        echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
        $body .= "<p style='line-height: 1.6; font-size: 14px'>";
        echo "<p style='line-height: 1.6; font-size: 14px'>";

        echo "<p>Estimado Consignante: </p>";
        $body .= "<p>Estimado Consignante: </p>";
        echo "<p>Con base a su contrato ".$info[0]->recibo." le informó que con este pago, que se adjunta en el presente correo, queda totalmente pagado el saldo por la subasta ".$info[0]->subasta."</p>";
        $body .= "<p>Con base a su contrato ".$info[0]->recibo." le informó que con este pago, que se adjunta en el presente correo, queda totalmente pagado el saldo por la subasta ".$info[0]->subasta."</p>";
        echo "<p> Si tiene alguna duda, favor de comunicarse con Sonia López de Cuentas por Pagar a la extensión 3396</p>";
        $body .= "<p> Si tiene alguna duda, favor de comunicarse con Sonia López de Cuentas por Pagar a la extensión 3396</p>";
        
        echo "<p>A continuación se muestra su estado de cuenta: </p>";
        $body .= "<p>A continuación se muestra su estado de cuenta: </p>";

        $lots = getLotsByRcpt($info[0]->recibo, $info[0]->subasta);

        echo "<table style='margin: 5px auto; font-size: 16px;'>
        <tr>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Lote</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Dept.</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Precio Martillo</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Seguro</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Fotos</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Comisión</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>ARR</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>ISR</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>IVA</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Neto</th>
        </tr>";

        $body.= "<table class='table' style='margin: 5px auto; font-size: 16px;'>
        <tr>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Lote</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Dept.</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Precio Martillo</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Seguro</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Fotos</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Comisión</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>ARR</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>ISR</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>IVA</th>
            <th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'>Neto</th>
        </tr>";


        $martillo = 0;
        $comisionSum = 0;
        $isrSum = 0;
        $ivaSum = 0;
        $totalSum = 0;

        foreach ($lots as $key => $value) {
            if(($value['hammer'] > 0 && $value['hammer'] < 4999)){
                $comision = $value['hammer'] * 0.20;
            }else if($value['hammer'] > 5000 && $value['hammer'] < 99999){
                $comision = $value['hammer'] * 0.15;
            }else if($value['hammer'] > 100000 && $value['hammer'] < 199999){
                $comision = $value['hammer'] * 0.12;
            }else{
                $comision = $value['hammer'] * 0.10;
            }

            if($value['hammer'] != 0 && ($value['itemstatus'] == 'VEN' || $value['itemstatus']=='EAC') && $value['ddspct'] == -1){
                if($value['hammer'] >= 500001){
                    $arr = $value['hammer'] * 0.015;
                }if($value['hammer'] >= 200001 && $value['hammer'] <= 500000) {
                    $arr = $value['hammer'] * 0.02;
                }
                if($value['hammer'] >= 50001 && $value['hammer'] <= 200000){
                    $arr = $value['hammer'] * 0.03;
                }
                if($value['hammer'] >= 1 && $value['hammer'] <= 50000){
                    $arr= $value['hammer'] * 0.04;
                }
            }else{
                $arr = 0;
            }
        
            $martillo = $martillo + $value['hammer'];        
            $inssurance = $value['inspct'] / 100;
            $isr = (($value['hammer'] - $inssurance - $value['photo'] - $comision - $arr)*0.08);
            $isr = number_format($isr,2,'.',"");
            $iva = ($inssurance + $comision + $value['photo']) * 0.16;
            $iva = number_format($iva, 2, '.', "");
            $total = $value['hammer'] - $inssurance - $value['photo'] - $comision - $iva - $isr - $arr;
            $total = number_format($total, 2, '.', "");
            $comisionSum = $comisionSum + $comision;
            $isrSum = $isrSum + $isr;
            $ivaSum = $ivaSum + $iva;
            $totalSum = $totalSum + $total;

            

            echo "<tr>";
            $body .= "<tr>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['lot'].", ".$value['descript']."</td>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['lot'].", ".$value['descript']."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['dept']."</td>";
            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['dept']."</td>";

            if($value['hammer'] == 0){
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>No vendido</td>";
                $body.= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>No vendido</td>";
            }else{
                echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['hammer']."</td>";
                $body.= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['hammer']."</td>";
            }
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$inssurance."</td>";
            $body.="<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$inssurance."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['photo']."</td>";
            $body.="<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$value['photo']."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$comision."</td>";
            $body.="<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$comision."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$arr."</td>";
            $body.="<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$arr."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$isr."</td>";
            $body.="<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$isr."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$iva."</td>";
            $body.= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$iva."</td>";
            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$total."</td>";
            $body.= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;'>".$total."</td>";

        
            echo "</tr>";
            $body.="</tr>";
        }

        echo "<tr>
                <td><b>TOTALES: </b></td>
                <td></td>
                <td>".number_format($martillo,2,'.',"")."</td>
                <td></td>
                <td></td>
                <td>".number_format($comisionSum,2,'.',"")."</td>
                <td></td>
                <td>".number_format($isrSum,2,'.',"")."</td>
                <td>".number_format($ivaSum,2,'.',"")."</td>
                <td>".number_format($totalSum,2,'.',"")."</td>
              </tr>
            </table>";
        
        $body .= "<tr>
                    <td><b>TOTALES: </b></td>
                    <td></td>
                    <td>".number_format($martillo,2,'.',"")."</td>
                    <td></td>
                    <td></td>
                    <td>".number_format($comisionSum,2,'.',"")."</td>
                    <td></td>
                    <td>".number_format($isrSum,2,'.',"")."</td>
                    <td>".number_format($ivaSum,2,'.',"")."</td>
                    <td>".number_format($totalSum,2,'.',"")."</td>
                </tr>
                </table>";

            echo "<div class = 'row'>
                <div class='col-md-6'>
                    <p>Comisión para lotes vendidos hasta $4,999: 20%</p>
                    <p>para lotes vendidos hasta $4,999 o más: 15%</p>
                    <p>para lotes vendidos hasta $99,999 o más: 12%</p>
                    <p>para lotes vendidos en mas de $199,999 o más: 10%</p>
                    <p>No hay comisión minima, seguro sin cargo</p>
                </div>
                <div class='col-md-6'>
                    <p><b>Cantidad pendiente por liquidar ( $0)</b></p>
                    <p><b>Pagos Anteriores ( ".$info[0]->total.")</b></p>
                    <p> <b>PAGADO</b> </p>
                </div></div>";
            
            $body .= "<div class = 'row'>
            <div class='col-md-6'>
                <p>Comisión para lotes vendidos hasta $4,999: 20%</p>
                <p>para lotes vendidos hasta $4,999 o más: 15%</p>
                <p>para lotes vendidos hasta $99,999 o más: 12%</p>
                <p>para lotes vendidos en mas de $199,999 o más: 10%</p>
                <p>No hay comisión minima, seguro sin cargo</p>
            </div>
            <div class='col-md-6'>
                <p><b>Cantidad pendiente por liquidar ( $0)</b></p>
                <p><b>Pagos Anteriores ( ".$info[0]->total.")</b></p>
                <p> <b>PAGADO</b> </p>
            </div></div>";

    


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

                        $mail = new PHPMailer();

                        $mail->SMTPDebug = 0;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'hdezmortonsubastas@gmail.com';                 	    //SMTP username
                        $mail->Password   = 'hgwe nxpv rxig vrzm';                               //SMTP password
                        $mail->SMTPSecure = 'tsl';            //Enable implicit TLS encryption
                        $mail->Port       = 587;       
                        $mail->isHTML(true);            
                        $mail->setFrom('ehernandez@mortonsubastas.com', 'Morton Subastas');                      //Set email format to HTML
                        $mail->Subject = "Pago total de contrato ".$info[0]->recibo." de la subasta ".$info[0]->subasta.". ";
                        $mail->Body = "".$body."";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $mail->CharSet = 'UTF-8';
                        $mail->AddAttachment($fileToSend);
                        $mail->AddAddress("ehernandez@mortonsubastas.com");
                        
                        if(!$mail->Send())
                            {
                               echo $mail->ErrorInfo;
                            }
                            else{
                                
                                echo "todo bien";
                    
                            }
   
    }

?>
