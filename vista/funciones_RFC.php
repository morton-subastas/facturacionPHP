<?php

function getLotsRecipt($recibo){
    //echo "dos";
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

    //echo "recibos::.8443".$recibo."<br>";
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
    $data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=$recibo", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("http://mimorton.com:8444/getLotsRecipt/$recibo", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getMane&invno=$recibo", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("https://mimorton.com:8444/getLotsRecipt/$recibo", true, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    //echo "<br><br>";
    //echo "muestra".count($inventor);
    //echo "<br>-----------------------------*<br>";
    foreach ($inventor as $product) {
      //echo $product[0]["bidder"];
      //echo "<br>----------------------------*<br>";
        $refno = $product[0]["refno"];
        $bidder = $product[0]["bidder"];
        $bidder2 = $product[0]["bidder"];
        $saleno = $product[0]["saleno"];
        $date = $product[0]["lastupdate"];
        $e_correo = $product[0]["email"];
        $subasta = $product[0]["receipt"];
        $bidder = substr($bidder,0,2);
    }
    //echo "function-".$date."-<br>";

    return array($refno, $bidder2, $subasta, $inventor, $saleno, $date, $e_correo);

    //return $inventor;
}

function getAuctions($filtro){
  try {
    //echo "filtro:<br>".$filtro;
    $filtro = trim($filtro);
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);
    //echo "recibos::.".$recibo."<br>";
    $data = file_get_contents("https://mimorton.com:8444/getSales/$filtro", true, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    return $inventor;
  } catch (Exception $e) {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
       var_dump($e->getMessage());
  }


}

function getAuctionsAll($filtro){
  try {
    //echo "filtro:<br>".$filtro;
    $filtro = trim($filtro);
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);
    echo "2)recibos:-".$filtro."-<br>";
    $data = file_get_contents("https://mimorton.com:8444/getSalesAll/$filtro", true, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    return $inventor;
  } catch (Exception $e) {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
       var_dump($e->getMessage());
  }


}

function getEmail($numero){
    //echo "dos";
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

    //echo "recibos::.".$recibo."<br>";
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getEmail&id=$numero", false, stream_context_create($arrContextOptions));
    $data = file_get_contents("https://mimorton.com:8444/getEmail2/$numero", false, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    //echo "muestra".count($inventor);
    return $inventor;

}

function getAllSubasta($numero){
    //echo "dos";
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

    //echo "recibos::.".$recibo."<br>";
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getEmail&id=$numero", false, stream_context_create($arrContextOptions));
    $data = file_get_contents("https://mimorton.com:8444/getAllSubasta/$numero", false, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    //echo "muestra".count($inventor);
    return $inventor;

}

function getEmailCliente_NotificacionesDatos($numero){
    //echo "dos";
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

    //echo "recibos::.".$recibo."<br>";
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
    //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getEmail&id=$numero", false, stream_context_create($arrContextOptions));
    $data = file_get_contents("https://mimorton.com:8444/getEmailCliente_NotificacionesDatos/$numero", false, stream_context_create($arrContextOptions));
    $inventor = json_decode($data, true);
    //var_dump($inventor);
    //echo "muestra".count($inventor);
    return $inventor;

}

function getEmailCliente($numero){
  $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

  //echo "recibos::.".$recibo."<br>";
  //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
  //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getEmail&id=$numero", false, stream_context_create($arrContextOptions));
  $data = file_get_contents("https://mimorton.com:8444/getEmailCliente/$numero", false, stream_context_create($arrContextOptions));
  $inventor = json_decode($data, true);
  //var_dump($inventor);
  //echo "muestra".count($inventor);
  return $inventor;

}

function getEmailCliente_Notificaciones($numero){
  $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

  //echo "recibos::.".$recibo."<br>";
  //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getLotsRecipt&invno=GM00106182", false, stream_context_create($arrContextOptions));
  //$data = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getEmail&id=$numero", false, stream_context_create($arrContextOptions));
  $data = file_get_contents("https://mimorton.com:8444/getEmailCliente_Notificaciones/$numero", false, stream_context_create($arrContextOptions));
  $inventor = json_decode($data, true);
  //var_dump($inventor);
  //echo "muestra".count($inventor);
  return $inventor;

}

function getMane($recibo){
    //echo "<h1>".$recibo."</h1>";
    $arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);

    $data_2 = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getMane&invno=$recibo", false, stream_context_create($arrContextOptions));
    //$data_2 = file_get_contents("https://mimorton.com:8443/estadoCuenta?oper=getMane&invno=$recibo", false, stream_context_create($arrContextOptions));
    //var_dump($data_2);
    $buyrbllg = json_decode($data_2, true);
    //echo "<br>..base2..<br>";
    //var_dump ($products_2);
    return $buyrbllg;
}
 ?>
