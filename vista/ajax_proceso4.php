<?php
//$resultado = "C:".$_POST['contrato']."A:".$_POST['paleta']."RADIO".$_POST['radio'];

//echo $resultado;
$CON_R = trim($_POST['contrato']);
$PAR_R = trim($_POST['partida']);
$PAL_R = trim($_POST['paleta']);
$LUGAR_R = trim($_POST['radio']);
$EMA_R = trim($_POST['correo']);

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
      $query = "INSERT INTO `emailenviados`(`id_email`, `contrato`, `partida`, `paleta`, `ofrece`, `correo`,`comentarios50`, `status`,`lugar30`)
      VALUES (0,'".$CON_R."','".$PAR_R."','','0.00','".$EMA_R."','', 'DEVOLVER','".$LUGAR_R."');";
      //echo $query;
      //$resultado = $query;
      $result = $conn->query($query);

      $resultado = "INSERTADO"; //.$query;

    }else{
      //$resultado = "UPDATE";
      $query = "UPDATE `emailenviados` SET `lugar30` =  '".$LUGAR_R."' WHERE `contrato` = '".$CON_R."' AND `paleta` ='".$PAL_R."';";
      echo $query;
      //$resultado = $query;
      //$result = $conn->query($query);

      //$resultado = "MODIFICADO"; //.$query;
    }
    //echo "Numero de resultado: $result->num_rows";
    //$resultado = "OK".$result->num_rows;
    $result->close();
  }

  echo $resultado;
//$resultado  = "LLEGA";

?>
