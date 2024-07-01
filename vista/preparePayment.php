<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">

<?php
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
       
		$mail = new PHPMailer(true);

        $all_AnUser = ControladorUsuarios::SearchUser($fac);

        $subasta = $_POST['subasta'];
        $recibo = $_POST['receipt'];
        $ultimoPago = $_POST['ultimo'];
        $totalVenta = $_POST['total'];
        $diferencia = $_POST['diferencia'];
        $totalPagos = $_POST['pagado'];
        $boton = $_POST['button'];


        $lots = getLotsByRcpt($recibo, $subasta);


       echo "<br><br><br><br><h4> Previsualización de Correo </h4>";

       echo "<div class='row'>
                <div class='col-md-3'>
                    <b>Último pago realizado: </b>  ".$ultimoPago."
                </div>
                <div class='col-md-3'>
                    <b>Monto total de pagos realizados:</b>  ".$totalPagos."
                </div>
                <div class='col-md-3'>
                    <b>Monto total de la venta:</b> ".$totalVenta."
                </div>
                <div class='col-md-3'>
                    <b>Diferencia:</b>  ".$diferencia."
                </div>
            </div><br><br><br>";

            $body .= "<div class='row'>
                        <div class='col-md-3'>
                            <b>Último pago realizado: </b>  ".$ultimoPago."
                        </div>
                        <div class='col-md-3'>
                            <b>Monto total de pagos realizados:</b>  ".$totalPagos."
                        </div>
                        <div class='col-md-3'>
                            <b>Monto total de la venta:</b> ".$totalVenta."
                        </div>
                        <div class='col-md-3'>
                            <b>Diferencia:</b>  ".$diferencia."
                        </div>
                    </div><br><br><br>";

            if($boton == 1){
                echo "<p>Estimado Consignante: Con base a su contrato ".$recibo." le informó el estatus de sus pagos por la subasta ".$subasta."</p>";
                $body .= "<p>Estimado Consignante: Con base a su contrato ".$recibo." le informó el estatus de sus pagos por la subasta ".$subasta."</p>";
            }else{
                echo "<p>Estimado Consignante: Con base a su contrato ".$recibo." le informó que  con este pago queda totalmente pagado el saldo por la subasta ".$subasta."</p>";
                $body .= "<p>Estimado Consignante: Con base a su contrato ".$recibo." le informó que  con este pago queda totalmente pagado el saldo por la subasta ".$subasta."</p>";
                echo "<p> Si tiene alguna duda, favor de comunicarse con Sonia López de Cuentas por Pagar a la extensión 3396</p>";
                $body .= "<p> Si tiene alguna duda, favor de comunicarse con Sonia López de Cuentas por Pagar a la extensión 3396</p>";
            }

            echo "
                     <input type='file' name='adjuntar' id='constancia'>
                     <button type='button' class='btn btn-primary' onclick='sendEmail();'>Enviar Correo</button>
                  ";

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

            echo  "<input type='hidden' value='".$_POST['email']."' id='email'>";
            echo  "<input type='hidden' value='".$subasta."' id='subasta'>";
            echo  "<input type='hidden' value='".$recibo."' id='recibo'>";
            echo  "<input type='hidden' value='".$ultimoPago."' id='ultimo'>";
            echo  "<input type='hidden' value='".$totalVenta."' id='total'>";
            echo  "<input type='hidden' value='".$totalPagos."' id='pagado'>";
            echo  "<input type='hidden' value='".$dierencia."' id='diferencia'>";


?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script type="text/javascript">
    function sendEmail(){
        var file_data = $("#constancia").prop("files")[0];  
        if(file_data === undefined){
            console.log("No adjuntaste nada");
        }else{
            const subasta = document.getElementById("subasta").value;
            const recibo = document.getElementById("recibo").value;
            const ultimo = document.getElementById("ultimo").value;
            const total = document.getElementById("total").value;
            const pagado = document.getElementById("pagado").value;
            const diferencia = document.getElementById("diferencia").value;
            const email = document.getElementById("email").value;
            const infoArray = [{
                "subasta":subasta,
                "recibo":recibo,
                "ultimo":ultimo,
                "total":total,
                "pagado":pagado,
                "diferencia":diferencia,
                "email":email
            }]

            var form_data = new FormData();       
            form_data.append("info", JSON.stringify(infoArray)); 
            form_data.append("file", file_data); 
            let ajax = new XMLHttpRequest();
            ajax.open('POST', 'sendPayment');
            ajax.setRequestHeader("enctype","multipart/form-data");
            ajax.send(form_data);
            ajax.onreadystatechange = function(){
                if (ajax.readyState === 4 && ajax.status === 200) {
                    console.log("Exito");
                }
            }; 

        }
    }

</script>

<?PHP   } ?>