<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">

<?php

    session_start();
    $fac = $_SESSION['email'];

    if (($fac != '')) {

        $conn = new mysqli("localhost", "root", "", "timbrado");
        include "head.php";
        include "aside.php";
        include 'funciones_RFC.php';

        $postSubasta = $_POST["subasta"];
       
        $splitPost = explode(" ,", $postSubasta);
        $subasta = $splitPost[0];
        $salename = $splitPost[1];
        $rol_recibe = $_POST["rol"];
        $receiptsE = ['OG0909', 'LB7678', 'VN0578', 'OG0908', 'OP18002', 'LB7576', 'AG11102', 'AG10829'];

        if ($subasta == '') {
            $subasta = $_GET["subasta"];
        }
        if ($rol_recibe == '') {
            $rol_recibe = $_GET['rol'];
        }

        $getAuctionDebts = getAuctionDebts($subasta);
       // print_r($getAuctionDebts);

        for ($a = 0; $a <= count($getAuctionDebts); $a++) {
            if (trim($getAuctionDebts[$a]["email"]) != "") {
              $cuantos_correos = $cuantos_correos + 1;
            }
        }

        if($cuantos_correos == NULL){
            echo "Los clientes a los que se le tienen que enviar correo, no cuentan con ninguno registrado en RFC";
        }

        for ($i = 0; $i <= count($getAuctionDebts); $i++) {
            $email = $getAuctionDebts[$i]["email"];
            $receipt = $getAuctionDebts[$i]["receipt"];
            $getReceipt = getReceipt($receipt);        

            if (trim($email) != '') {
                echo "<h1 style='max-width:700px;text-align:center;margin:50px auto;background:#d3d3d3'>Se enviará a <span style='font-weight:bold;color:#004d43'>" . $email . "<br>" . $i . "</span> de " . $cuantos_correos . "<br></h1>";
            }
            if (trim($email) != "" || trim($email) != null) {
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
                $body .= "<img src='https://mortonsubastas.com/new/img/logo_negro_morton.svg' style='width: 250px;margin-top:20px'>";
                echo "<img src='https://mortonsubastas.com/new/img/logo_negro_morton.svg' style='width: 250px;margin-top:20px'>";
                $body .= "<hr style='border: 1px solid #004D43; margin: 25px auto;opacity:1'>";
                echo "<hr style='border: 1px solid #004D43; margin: 25px auto; opacity: 1'>";
                $body .= "<p style='line-height: 1.6; font-size: 14px'>";
                echo "<p style='line-height: 1.6; font-size: 14px'>";


                echo "<div class='row'>
                        <div class='col-md-3'>
                            <b>Último pago realizado: </b>  ".$getAuctionDebts[$i]['ultimopago']."
                        </div>
                        <div class='col-md-3'>
                            <b>Monto total de pagos realizados:</b>  ".$getAuctionDebts[$i]['payments']."
                        </div>
                        <div class='col-md-3'>
                            <b>Monto total de la venta:</b> ".$getAuctionDebts[$i]['total']."
                        </div>
                        <div class='col-md-3'>
                           <b>Diferencia:</b>  ".$getAuctionDebts[$i]['total'] - $getAuctionDebts[$i]['payments']."
                        </div>
                </div><br><br><br>";

                $lots = getLotsByRcpt($getAuctionDebts[$i]['receipt'], $subasta);
            echo $getAuctionDebts[$i]['termsname'];
                echo "<table class='table' style='margin: 5px auto; font-size: 16px;'>
                        <tr>
                            <th>Lote</th>
                            <th>Dept.</th>
                            <th>Precio Martillo</th>
                            <th>Seguro</th>
                            <th>Fotos</th>
                            <th>Comisión</th>
                            <th>ARR</th>
                            <th>ISR</th>
                            <th>IVA</th>
                            <th>Neto</th>
                            <th>Estatus</th>
                        </tr>";

                foreach ($lots as $key => $value) {

                    // CALCULO ARR


                    if($value['hammer'] != 0 && ($value['itemstatus'] == 'VEN' || $value['itemstatus']=='EAC') && $value['ddspct'] == -1 && !in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
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


                    $level1 = $getAuctionDebts[$i]['level1'];
                    $level2 = $getAuctionDebts[$i]['level2'];
                    $level3 = $getAuctionDebts[$i]['level3'];
                    $level4 = $getAuctionDebts[$i]['level4'];
                    $cms1 = $getAuctionDebts[$i]['cms1'];
                    $cms2 = $getAuctionDebts[$i]['cms2'];
                    $cms3 = $getAuctionDebts[$i]['cms3'];
                    $cms4 = $getAuctionDebts[$i]['cms4'];
                    $cms5 = $getAuctionDebts[$i]['cms5'];


                    if(trim($getAuctionDebts[$i]['termsname'])=='Especial' && !in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
                      
                        if($leve1 == 0){
                            $comision = $value['hammer'] * ($cms1/100);
                        }

                        if($level1 > 0 && $level2 == 0 && $value['hammer'] < $level1){
                            $comision = $value['hammer'] * ($cms1/100);
                        }

                        if($level1 > 0 && $level2 == 0 && $value['hammer'] > $level1 ){
                            $comision = $value['hammer'] * ($cms2/100);
                        }

                        // MARTILLO MENOR QUE LEVEL 2 Y MAYOR QUE LEVEL 1 
                        if($level1 > 0 && $level2 > 0 && $level3 == 0 && $value['hammer'] < $level2 && $value['hammer'] > $level1){
                            $comision = $value['hammer'] * ($cms2/100);  
                        }

                        // MARTILLO ES MÁS GRANDE QUE LEVEL2   = CM3

                        if($level1 > 0 && $level2 > 0 && $level3 == 0 && $value['hammer'] > $level2 ){
                            $comision = $value['hammer'] * ($cms3/100);
                        }

                        // MARTILLO MAYOR QUE LEVEL 2 PERO MENOR QUE LEVEL 3 = CMS3
                        if($level1 > 0 && $level2 > 0 && $level3 > 0 && $value['hammer'] < $level3 && $value['hammer'] > $level2){
                            $comision = $value['hammer'] * ($cms3/100);
                        }

                        // MARTILLO MAYOR QUE LEVEL 3 
                        if($level1 > 0 && $level2 > 0 && $level3 > 0 && $level4 == 0 && $value['hammer'] > $level3 ){
                            $comision = $value['hammer'] * ($cms4/100);
                        }

                        if($level1 > 0 && $level2 > 0 && $level3 > 0 && $level4 > 0){
                            $comision = $value['hammer'] * ($cms5/100);
                        }

                        if($getAuctionDebts[$i]['hammtax'] > 0 && $value['hammer'] > 0){
                            $isr = (($value['hammer'] - $inssurance - $value['photo'] - $comision - $arr - $getAuctionDebts[$i]['droitdesui'])*0.08);
                        }else{
                            $isr = 0;
                        }
                    }else{
                        if(in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
                          $comision = 0;
                          
                        }else{
                            if(($value['hammer'] > 0 && $value['hammer'] < 4999 )){
                                $comision = $value['hammer'] * 0.20;
                            }else if($value['hammer'] > 5000 && $value['hammer'] < 99999){
                                $comision = $value['hammer'] * 0.15;
                            }else if($value['hammer'] > 100000 && $value['hammer'] < 199999){
                                $comision = $value['hammer'] * 0.12;
                            }else{
                                $comision = $value['hammer'] * 0.10;
                            }
                        }
                        
                        if($value['hammer'] > 0 && $getAuctionDebts[$i]['hammtax'] > 0  &&  !in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
                            $isr = (($value['hammer'] - $inssurance - $value['photo'] - $comision - $arr - $getAuctionDebts[$i]['droitdesui'])*0.08);
                            $isr = number_format($isr,2,'.',"");
                        }else{
                            $isr = 0;
                        }
                       
                    }
                        
                    $inssurance = $value['inspct'] / 100;
                    
                    $iva = ($inssurance + $comision + $value['photo']) * 0.16;
                    $iva = number_format($iva, 2, '.', "");
                    if($value['hammer']>0 && !in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
                        $total = $value['hammer'] - $inssurance - $value['photo'] - $comision - $iva - $isr - $arr - $getAuctionDebts[$i]['droitdesui'];
                        $total = number_format($total, 2, '.', "");
                    }else{
                        if($value['hammer']> 0 && in_array(trim($getAuctionDebts[$i]['receipt']),$receiptsE)){
                            $total = $value['hammer'] - $value['droitdesui'];
                        }else{
                            $total = 0;
                        }
                    }
                  

                    echo "<tr>";
                    echo "<td>".$value['lot'].", ".$value['descript']."</td>";
                    echo "<td>".$value['dept']."</td>";
                    echo "<td>".$value['hammer']."</td>";
                    echo "<td>".$inssurance."</td>";
                    echo "<td>".$value['photo']."</td>";
                    echo "<td>".$comision."</td>";
                    echo "<td>".$arr."</td>";
                    echo "<td>".$isr."</td>";
                    echo "<td>".$iva."</td>";
                    echo "<td>".$total."</td>";

                    if($value['hammer']<=0){
                        echo "<td>No Vendido</td>";
                    }else{
                        echo "<td>Vendido</td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";


                echo "<form action='preparePayment' method='POST'>
                        <input type='hidden' name='receipt' value=".$getAuctionDebts[$i]["receipt"].">
                        <input type='hidden' name='subasta' value=".$subasta.">
                        <input type='hidden' name='ultimo'  value=".$getAuctionDebts[$i]['ultimopago'].">
                        <input type='hidden' name='pagado' value=".$getAuctionDebts[$i]['payments'].">
                        <input type='hidden' name='total' value=".$getAuctionDebts[$i]['total'].">
                        <input type='hidden' name='email' value=".$getAuctionDebts[$i]['email'].">
                        <input type='hidden' name='diferencia' value=".$getAuctionDebts[$i]['total']-$getAuctionDebts[$i]['payments'].">";
                echo "<button type='submit' class='btn btn-primary' value='1' name='button'>Envio Pago Parcial</button>";
                echo "<button type='submit' style='float:right;' class='btn btn-primary' value='2' name='button'>Envio Liquidación</button>";
                echo "</form>";

				/*echo "<table width='100%'>
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
					
				</tr></table><br><br>";*/

            
            }
                
        }
    }

?>

