<?php
//$resultado = "C:".$_POST['contrato']."P:".$_POST['partida']."A:".$_POST['paleta']."O".$_POST['ofrece']."E".$_POST['email'];

//echo $resultado;
$CON_R = trim($_POST['contrato']);
$PAL_R = trim($_POST['paleta']);
$OBS_R = trim($_POST['observaciones']);

$conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");

  if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
    $resultado = "ERROR";
  }else{

      //$resultado = "UPDATE";
      $query = "UPDATE `emailenviados` SET `comentarios50` =  '".$OBS_R."' WHERE `contrato` = '".$CON_R."' AND `paleta` ='".$PAL_R."';";
      $resultado = $query;
      $result = $conn->query($query);

      $resultado = "MODIFICADO"; //.$query;

    //echo "Numero de resultado: $result->num_rows";
    //$resultado = "OK".$result->num_rows;
    $result->close();
  }

  echo $resultado;
//$resultado  = "LLEGA";

?>
