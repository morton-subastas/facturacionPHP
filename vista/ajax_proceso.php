<?php
//$resultado = "C:".$_POST['contrato']."P:".$_POST['partida']."A:".$_POST['paleta']."O".$_POST['ofrece']."E".$_POST['email'];

//echo "entra_ajax";
//echo $resultado;

$SUB_R = trim($_POST['subasta']);
$CON_R = trim($_POST['contrato']);
$PAR_R = trim($_POST['partida']);
$PAL_R = trim($_POST['paleta']);
$EMA_R = trim($_POST['correo']);
$OFR_R = trim($_POST['ofrece']);


$conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");


  if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
    $resultado = "ERROR";
  }else{
    $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='".$CON_R."' and `partida`='".$PAR_R."' and `paleta`='".$PAL_R."' and `correo`='".$EMA_R."'";
    //$resultado = "ANTES"; // .$sql;
    $result = $conn->query($sql);

    $trae = $result->num_rows;
    //$resultado = "-".$trae."-";

    if ($trae == 0){
      session_start();
      $fac = $_SESSION['email'];

      $query = "INSERT INTO `emailenviados`(`id_email`, `subasta_10`,`contrato`, `partida`, `paleta`, `ofrece`, `correo`,`comentarios50`, `status`,`lugar30`, `capturo40`)
      VALUES (0,'".$SUB_R."','".$CON_R."','".$PAR_R."','".$PAL_R."','".$OFR_R."','".$EMA_R."','', 'INSERTADO','','".$fac."');";
      //$resultado =  $query;
      $result = $conn->query($query);

      $resultado = "INSERTADO"; //.$query;
      //$resultado = $query;

    }else{
      //$resultado = "UPDATE";
      $query = "UPDATE `emailenviados` SET `ofrece` =  '".$OFR_R."',`correo` = '".$EMA_R."',`status` = 'MODIFICADO' WHERE `contrato` = '".$CON_R."' AND `partida` = '".$PAR_R."' AND `paleta` ='".$PAL_R."';";
      //$resultado = $query;
      $result = $conn->query($query);

      $resultado = "MODIFICADO"; //.$query;
    }

    //echo "Numero de resultado: $result->num_rows";
    //$resultado = "OK".$result->num_rows;
    $result->close();
  }

  echo $resultado;
//$resultado  = "LLEGA";

?>
