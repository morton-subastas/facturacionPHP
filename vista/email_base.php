<?php
//https://docs.aws.amazon.com/es_es/ses/latest/DeveloperGuide/send-using-smtp-php.html
$aa = $_GET["a"]; $bb = $_GET["b"]; $cc=$_GET["c"];

require_once ("../Controlador/controladorRandom.php");
require_once ("../Modelo/modeloRandom.php");


$_AllCFDI =  controladorRandom::ctrl_CFDI($aa, $bb, $cc);
//var_dump($_AllCFDI);
//echo "<br>-------------------------<br>";
$_AllConceptos = controladorRandom::ctrl_Cptos($aa, $bb, $cc);
//var_dump($_AllConceptos);
echo "
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>¡GRACIAS POR SU COMPRA!</title>
	</head>
	<body>
		<center><img src='https://www.mortonsubastas.com/images/Misc/logotipo.png' style='width: 250px;''></center>
		<hr style='max-width: 1000px; border: 1px solid #C1D82F; margin: 40px auto;'>
		<div style='max-width: 800px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; font-size: 20px;'>

			<center><h2>¡GRACIAS POR COMPRAR EN MORTON!</h2></center>
			<h3>Le hacemos los archivos con los que se facturo su compra</h3>
			<p>
				<ol>

					<br>
          <li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_factura.png' width='30px'>
              Conforme a remision <b>".$_AllCFDI[0]['cfdiobs']."</b> de fecha <b>".$_AllCFDI[0]['cfdifec']."</b> donde los compro los articulos:
							<br><br>
									<ul style='list-style-type: disc'>
                    <li>".$_AllConceptos[0]['cfdipronom']."</li>
									</ul>
                  <br><br>
							</span>
					</li>
          <br>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_recontratar.png' width='30px'>Algunos datos sobre su factura
							<br><br>
							 <ul>
								<li>Subtotal: $".number_format($_AllCFDI[0]['cfdisub'],2)."</li>
                <li>I.V.A.: $".number_format($_AllCFDI[0]['cfdiiva'],2)."</li>
                <li>Total: $".number_format($_AllCFDI[0]['cfditot'],2)."</li>
							</ul>
						</span>
					</li>
					<br>
          <li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
								<img src='https://www.mortonsubastas.com/correo/img/icono_adjunto.png' width='30px'> Anexo encontrará su estado de cuenta
						</span>
            <ul>
              <li>XML</li>
              <li>PDF</li>
            </ul>
					</li>
					<br>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_atencion.png' width='30px'> Dudas y/o aclaraciones de la Facturación<br>
							<em>Envia tus datos fiscales a facturacion@mortonsubastas.com</em>
							<br><br>
						</span>
					</li>
				</ol>
			</p>
		</div>";

		echo "<hr style='max-width: 1000px; border: 1px solid #C1D82F; margin: 40px auto;'>";
/*
		<div style='max-width: 800px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; font-size: 20px;'>
			<center><h2>Thank you for buying with Morton Subastas!</h2></center>
			<h3>Please read the following steps in order to obtain your purchase:</h3>
			<p>
				<ol>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
								<img src='https://www.mortonsubastas.com/correo/img/icono_adjunto.png' width='30px'> Attached you will find your account statement
						</span>
					</li>
					<br>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_pago.png' width='30px'> Payment Options:
							<br><br>
							We offer different payment options so you can choose the one that suits you best:
							<ul>
								<li>Cash  (Maximum amount of $278,000.00 MN) - Paid directly in our offices</li>
								<li>Check - made out to Morton Subasta S.A. de C.V.</li>
								<li>Paypal - creditoycobranza@mortonsubastas.com</li>
								<li>Credit card – Includes an additional 6.6% charge</li>
								<li>Wire transfer</li>
								<li>
									Bank deposit<br>
									<div style='border: 3px solid #C1D82F; max-width: 300px; margin: 10px auto; padding: 10px'>
										<center>
										BBVA Bancomer<br>
										Morton Subastas, S.A. de C.V.<br>
										Cuenta 0103807037<br>
										Clabe 0121 8000 1038 0703 75
										</center>
									</div>
								</li>
								<li>Once the payment is made, please send proof of payment to: creditoycobranza@mortonsubastas.com</li>
							</ul>
						</span>
					</li>
					<br>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_recoger.png' width='30px'> Where to pick up your purchase? (Monday through Friday 9:00 a.m. - 3:00 p.m.) 
							<p>For the delivery of your purchases, please read the following points carefully:</p>
								<p>As a requirement to withdraw your purchases, in accordance with the 'Ley Federal para la Prevención e Identificación de Operaciones con Recursos de Procedencia Ilícita', Morton Subastas requests the following documentation:</p>
									<br>
									<ul style='list-style-type: disc'>
										<li>Copy ID both sides</li>
										<li>Proof of residency (maximum 3 months old)</li>
										<li>Customer Identity Format (is attached on this email)</li>
									</ul>

							<br><br>
							<ul>
								<!-- <li>Monte Athos 165. Caja - Aqui obtendrá sus hojas de salida.</li> -->
								<li>Monte Athos 179</li>
								<li>Cerro de Mayka 115</li>
								<li>Constituyentes 910</li>
								<li>
									For shipment, contact MailBoxes:
										<ul>
											<li>Cesar Rojas o Carlos López</li>
											<li>Email: mx0114@mx.mbelatam.com</li>
											<li>Phone: 5552929519</li>
										</ul>
								 </li>
							</ul>
						</span>
					</li>
					<br>
					<li style='font-weight: bold;'>
						<span style='font-weight: normal;'>
							<img src='https://www.mortonsubastas.com/correo/img/icono_factura.png' width='30px'> Invoicing<br>
							<em>Send your tax information to facturacion@mortonsubastas.com </em>
							<br><br>
							<ul>
								<li>Tax ID</li>
								<li>Name</li>
								<li>Address</li>
							</ul>
						</span>
					</li>
				</ol>
			</p>
		</div>
		<hr style='max-width: 1000px; border: 1px solid #C1D82F; margin: 40px auto;'>
*/

  echo "
		<div style='max-width: 800px; margin: 0px auto; font-family: Helvetica, sans-serif, 'Open Sans'; font-size: 14px;'>
			<table style='margin: 5px auto;'>
				<tr>
					<td style='padding: 15px;'><center><img src='https://www.mortonsubastas.com/correo/img/icono_envio.png' width='50px'><br>&nbsp;&nbsp;Envios&nbsp;&nbsp;</center></td>
					<td style='padding: 15px;'><center><img src='https://www.mortonsubastas.com/correo/img/icono_devolucion.png' width='50px'><br>&nbsp;&nbsp;No hay devoluciones&nbsp;&nbsp;</center></td>
					<td style='padding: 15px;'><center><img src='https://www.mortonsubastas.com/correo/img/icono_seguro.png' width='50px'><br>&nbsp;&nbsp;100% pago seguro&nbsp;&nbsp;</center></td>
					<td style='padding: 15px;'><center><img src='https://www.mortonsubastas.com/correo/img/icono_atencion.png' width='50px'><br>&nbsp;&nbsp;Atención a clientes&nbsp;&nbsp;</center></td>
				</tr>
			</table>
			<br>
			<table style='margin: 5px auto;'>
				<tr>
					<td style='padding: 15px;'><center>Monte Athos 179 <br>Lomas de Chapultepec, CDMX</center></td>
					<td style='padding: 15px;'><center>Cerro de Mayka 115<br>Lomas de Chapultepec, CDMX</center></td>
					<td style='padding: 15px;'><center>Virreyes 155<br>Lomas de Chapultepec, CDMX</center></td>
					<td style='padding: 15px;'><center>Constituyentes 910<br>Lomas Altas, CDMX</center></td>
				</tr>
			</table>
			<br>
			<table style='margin: 5px auto; font-size: 18px;'>
				<tr>
					<td style='padding: 15px;'><center><a href='https://www.facebook.com/mortonsubastas/'><img src='https://www.mortonsubastas.com/correo/img/icono_facebook.png' width='30px'></a></center></td>
					<td style='padding: 15px;'><center><a href='https://www.twitter.com/mortonsubastas'><img src='https://www.mortonsubastas.com/correo/img/icono_tuider.png' width='30px'></a></center></td>
					<td style='padding: 15px;'><center><a href='https://www.instagram.com/mortonsubastas/'><img src='https://www.mortonsubastas.com/correo/img/icono_insta.png' width='30px'></a></center></td>
					<td style='padding: 15px;'><center><a href='https://www.youtube.com/mortonsubastas'><img src='https://www.mortonsubastas.com/correo/img/icono_youtube.png' width='30px'></a></center></td>
				</tr>
			</table>
			<br>
			<table style='margin: 5px auto; font-size: 18px;'>
				<tr>
					<td style='padding: 15px;'><center><a href='https://www.mortonsubastas.com' style='color: #004D43; font-weight: bold;'>www.mortonsubastas.com</a></center></td>
					<td style='padding: 15px;'><center><a href='tel:+525552833140' style='color: #004D43; font-weight: bold;'>Tel:+52 (55) 52 83 31 40</a></center></td>
				</tr>
			</table>
		</div>
	</body>
</html>";
