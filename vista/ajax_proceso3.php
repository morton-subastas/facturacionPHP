<?php
//echo "ajax_proceso3";
//$resultado = "C:".$_POST['contrato']."P:".$_POST['partida']."A:".$_POST['paleta']."O".$_POST['correo'];

$CON_R = trim($_POST['contrato']);
$PAR_R = trim($_POST['partida']);
$PAL_R = trim($_POST['paleta']);
$EMA_R = trim($_POST['correo']);

//$resultado = "C:".$CON_R."P:".$PAR_R."A:".$PAL_R."O".$EMA_R;
//echo $resultado;
//echo "*1";
$conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");
//echo "*2";


  if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
    $resultado = "ERROR";
    echo "*3";
  }else{
    session_start();
    $fac = $_SESSION['email'];

      $query = "INSERT INTO `emailenviados`(`id_email`, `contrato`, `partida`, `paleta`, `ofrece`, `correo`,`comentarios50`, `status`,`lugar30`, `capturo40`)
      VALUES (0,'".$CON_R."','".$PAR_R."','".$PAL_R."','0.0','".$EMA_R."','', 'DEVOLVER','','".$fac."');";
      //return $query;
      //echo $query;

      $resultado = $query;
      $result = $conn->query($query);

      //echo "*4";
    //echo "Numero de resultado: $result->num_rows";
    //$resultado = "OK".$result->num_rows;
    $result->close();
    echo "Registro insertado...";
  }

  //echo $resultado;

?>
