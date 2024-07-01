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

        if ($subasta == '') {
            $subasta = $_GET["subasta"];
        }
        if ($rol_recibe == '') {
            $rol_recibe = $_GET['rol'];
        }

        $resultsAuction = getEmailCliente($subasta);
        $infoAuctions = getAllSubastaBuys($subasta);
        $totalResultsAuction = count($resultsAuction);
        $totalInfoAuctions = count($infoAuctions);

        for ($a = 0; $a <= $totalResultsAuction; $a++) {
            if (trim($resultsAuction[$a]["email"]) != "") {
              $cuantos_correos = $cuantos_correos + 1;
            }
        }


        for ($i = 0; $i <= $totalResultsAuction; $i++) {
            $emailResults = $resultsAuction[$i]["email"];
            $receiptResults = $resultsAuction[$i]["receipt"];
            if (trim($emailResults) != '') {
                echo "<h1 style='max-width:700px;text-align:center;margin:50px auto;background:#d3d3d3'>Se enviará a <span style='font-weight:bold;color:#004d43'>" . $resultsAuction[$i]["email"] . "<br>" . $i . "</span> de " . $cuantos_correos . "<br></h1>";
            }
            if (trim($emailResults) != "" || trim($emailResults) != null) {
                $estimado = 0;
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

                $body .=  "<table style='margin: 5px auto; font-size: 16px;'>";
                echo "<table style='margin: 5px auto; font-size: 16px;'>";
                $body .=  "<tr>";
                echo  "<tr>";
                $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
                echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>DESCRIPCIÓN</center></th>";
                $body .=  "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>IMAGEN</center></th>";
                echo "<th style='padding: 15px; border-right: 2px solid #fff; background: #004d43; color: #fff'><center>IMAGEN</center></th>";
                $body .=  "</tr>";

                for ($j = 0; $j <= $totalInfoAuctions; $j++) {
                    $emailAuctions = $infoAuctions[$j]["email"];
                    $receiptAuctions = $infoAuctions[$j]["receipt"];
                    if (($emailResults == $emailAuctions) && ($receiptResults == $receiptAuctions)) {
                        if ($estimado == 0) {
                            $nombre = "<b>" . $infoAuctions[$j]["firstname"] . " " . $infoAuctions[$j]["lastname"] . "</b><br>";
                            echo $nombre;
                            

                            echo "<div>
                                    <p>Estimado Consignante: </p>
                                    <p>Nuevamente muchas gracias por comprar en Morton Subastas.</p>
                                    <p>Hacemos de su conocimiento que para poder entregar la totalidad de sus lotes, la autoridad de Hacienda y Crédito Público nos requeire
                                    pedirle la siguiente documentación: </p>
                                    <table class='table' style='margin: 5px auto; font-size: 16px;'>
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
                                    </table>
                                </div>";
                                $estimado = 1;
                        }  

                        $img = $infoAuctions[$j]["pictpath"];
                        $valor = "/";
                        $este = "\ ";
                        $este = trim($este);
                        $cambio = str_replace($este, $valor, $img);
                        $cambio = str_replace("p:/", "", $cambio);

                        echo "</tr>";
                        $body .=  "<tr>";  
                        echo "<tr>";
                        if(trim($infoAuctions[$j]["price"] > 0)){
                            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='40%'><center><b>".substr($infoAuctions[$j]["salelot"], 5, 12)."</b><br>".$infoAuctions[$j]["descript"]."</h6><br><img src='https://mimorton.com/imglink/$cambio' width='60' heigth='60'></center></td>";
                            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='40%'><center><b>".substr($infoAuctions[$j]["salelot"], 5, 12)."</b><br>".$infoAuctions[$j]["descript"]."</h6><br><img src='https://mimorton.com/imglink/$cambio' width='60' heigth='60'></center></td>";
                            $body .= "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>Se liquidarán el 4to. lunes posterior a la fecha de subasta.</center></td>";
                            echo "<td style='padding: 15px; border-top: 2px solid #004D43; border-right: 2px solid #004D43;' width='30%'><center>Se liquidarán el 4to. lunes posterior a la fecha de subasta.</center></td>";
                            $body .= "</tr>";
                            echo "</tr>";
                        }

                    } 
                }

                $body .= "</table>";
                echo "</table>";
            }   
        }
    }

?>

