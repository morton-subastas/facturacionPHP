<?php
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
    include "head.php";
    include "aside.php";
    include 'funciones_RFC.php';
    $subasta = $_POST['subasta_r'];
    $variable = getEmail ($_POST['subasta_r']);
    $lotR =  $_POST['lote_r'];
    $cuantos  = count($variable);
    $com = 0;

    //echo "subasta:".$_POST['subasta_r']."<br>";
    //echo "correo:".$_POST['correo_r']."<br>";

    $conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");
    if ($conn->connect_error) {
      die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
      $resultado = "ERROR";
    }
    else{
    $Host = "localhost";
    $User = "root";
    $Password = "h0rKm8dEwHZz";
    $DataBase = "timbrado";
    $conexion = mysqli_connect($Host,$User,$Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");

    $sql = "SELECT * FROM `emailenviados` WHERE `subasta_10`='".$_POST['subasta_r']."' and `correo`='".$_POST['correo_r']."' and `paleta`='".$lotR."' and `status`='ENVIADO'";
    //echo "SQL<br>".$sql."<br>";

    $resultado=mysqli_query($conexion, $sql);

    echo "<center>";
      echo "<div class='container'>";
        echo "<div class='row'>";
          echo "<div class='col-md-12'>";

    echo "<table class='table table-bordered' width='92%' border='2'>";
      echo "<tr><th colspan='6' style='background-color:#004D43; color: #fff;'><center><b><h1>LOTES NO VENDIDOS-DEVOLVER DE LA SUBASTAS ".$subasta." </h1></b></center></th></tr>";
      echo "<tr style='color:#fff; font-weight:normal; text-align:center; background: #004D43'>";
        //echo "<th style='font-weight:normal; text-align:center'>LOTE_</th>";
        echo "<td  bgcolor='#004D43' style='color:#ffffff' width='10%'>LOTE</th>";
        echo "<th style='font-weight:normal; text-align:center' width='20%'>DESCRIPCION</th>";
        echo "<th style='font-weight:normal; text-align:center' width='20%'>CLIENTE</th>";
        echo "<th style='font-weight:normal; text-align:center' width='30%'>CORREO</th>";
        echo "<th style='font-weight:normal; text-align:center' width='20%'>IMAGEN</th>";
      echo "</tr>";

    echo "<form  class='col-lg-12' id='ItemNotSells' name='BackItemUser3' action='BackItemUser3.php' method='post' >";

    while($fila=mysqli_fetch_array($resultado)){
        //var_dump($fila);
        echo "<br>";
        echo "<tr>";
          echo "<td>";
              echo "Contrato:<b>".$fila['contrato']."</b><br><br> Partida:<b>".$fila['partida']."</b><br><br> Lote:<b>".$fila['paleta']."</b>";
              echo "<input type='hidden' id='contrato' name='contrato' value='".$fila['contrato']."'>";
          echo "</td>";
          $suma = 0;
            while ($com < $cuantos){

            //var_dump($variable[$com]["email"]);
              //echo "-".$_POST['correo_r']."<br>";
              $pal_es = substr($variable[$com]['salelot'],5,12);

              if (trim($variable[$com]["email"]) == trim($_POST['correo_r']) AND (trim($variable[$com]["receipt"]) == trim($fila['contrato'])) AND (trim($variable[$com]["item"]) == trim($fila['partida']))) {
                $suma = $suma + 1;
                echo "SUMA:".$suma."<br>";
                //} AND (trim($pal_es) == trim($fila['paleta']) ){
                //var_dump($variable[$com])."<br>";
              echo "<td>".$variable[$com]["descript"]."</td>";
              //echo "precio".$variable[$com]["price"]."<br>";
              echo "<td>";
              echo $variable[$com]["firstname"]."-".$variable[$com]["lastname"];
              echo "<br>";
              echo " <b><input type='hidden' id='subasta' name='subasta' value='".$fila['subasta_10']."'></b>";

              echo "</td>";
              echo "<td>";
                echo $_POST['correo_r']."<br><br>";
                echo "<input type='hidden' id='lote' name='lote' value='".$fila['paleta']."'>";
                echo "<input type='hidden' id='partida' name='partida' value='".$fila['partida']."'>";
                echo "<input type='hidden' id='correo' name='correo' value='".$_POST['correo_r']."'>";
                echo "<label class='miro-radiobutton'>";
                    echo "<input type='radio' name='radio".$suma."' id='radio".$suma."' value='Athos175' onchange='cambia_direccionA175($suma)'>";
                    echo "<span>Monte Athos 175</span>";
                echo "</label><br>";
                echo "<label class='miro-radiobutton'>";
                    echo "<input type='radio' name='radio".$suma."' id='radio".$suma."' value='Athos179' onchange='cambia_direccionA179($suma)'>";
                    echo "<span>Monte Athos 179</span>";
                echo "</label><br>";
                  echo "<label class='miro-radiobutton'>";
                      echo "<input type='radio' name='radio".$suma."' id='radio".$suma."' value='Mayka' onchange='cambia_direccionM($suma)'>";
                      echo "<span>Cerro Mayka</span>";
                  echo "</label><br>";
                  echo "<label class='miro-radiobutton'>";
                      echo "<input type='radio' name='radio".$suma."' id='radio".$suma."' value='Constituyentes' onchange='cambia_direccionC($suma)'>";
                      echo "<span>Constituyentes</span>";
                  echo "</label><br>";
                  echo "<div id='resultado4' name='resultado4'></div>";

              echo "</td>";
              echo "<td>";

              $valor = "/";
              $este = "\ ";
              $este = trim($este);
              //echo $suma."_9)".$cambio."<br>";
              $img = $variable[$com]["pictpath"];
              $cambio = str_replace($este,$valor,$img);
              $cambio = str_replace("p:/","",$cambio);
              //echo $cambio;
              echo "<img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'> ";


              echo "</td>";
            }else{
              //echo "".trim($variable[$com]["email"])."-".$_POST['correo_r']."<br>";
              //echo "".trim($variable[$com]["receipt"])."-".$fila['contrato']."<br>";
              //echo "".trim($variable[$com]["item"])."-".$fila['partida']."<br>";
              //echo "".trim($pal_es)."-".$fila['paleta']."<br><br>";
            }
              $com = $com + 1;
          }
          $com = 0;

        echo "</tr>";
    }
    echo "<tr><td colspan=5 ><center><button type='submit' id='btn_save' name='btn_save' class='btn-lg btn-2' value='1'>Enviar Correo</button></center></td></tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
    echo "</form>";
  }


}
?>
<script>
function cambia_direccionA175(suma){
    //alert(suma);
    var s = document.getElementById("subasta").value;
    //alert ("S" + s);
    var c = document.getElementById("contrato").value;
    //alert("C" + c);
    var p = document.getElementById("lote").value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida").value;
    //alert("A" + a);
    var e = document.getElementById("correo").value;
    //alert("E" + e);

    var parametros = {"subasta": s, "contrato": c, "partida": a, "paleta": p, "radio": r, "correo": e};
    $.ajax({
                 data:  parametros, //datos que se envian a traves de ajax
                 url:   'ajax_proceso4A175.php', //archivo que recibe la peticion
                 type:  'post', //método de envio
                 beforeSend: function () {
                         $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
                 },
                 success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         $("#resultado4").html(response);
                }
    });

}

function cambia_direccionA179(suma){
    var s = document.getElementById("subasta").value;
    var c = document.getElementById("contrato").value;
    //alert("C" + c);
    var p = document.getElementById("paleta").value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida").value;
    //alert("A" + a);
    var e = document.getElementById("correo").value;
    //alert("E" + e);

    var parametros = {"subasta":s, "contrato": c, "partida": a, "paleta": p, "radio": r, "correo": e};
    $.ajax({
                 data:  parametros, //datos que se envian a traves de ajax
                 url:   'ajax_proceso4A179.php', //archivo que recibe la peticion
                 type:  'post', //método de envio
                 beforeSend: function () {
                         $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
                 },
                 success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         $("#resultado4").html(response);
                }
    });

}

function cambia_direccionM(suma){
    var s = document.getElementById("subasta"). value;
    var c = document.getElementById("contrato").value;
    //alert("C" + c);
    var p = document.getElementById("paleta").value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida").value;
    //alert("A" + a);
    var e = document.getElementById("correo").value;
    //alert("E" + e);

    var parametros = {"subasta":s, "contrato": c, "partida": a, "paleta": p, "radio": r, "correo": e};
    $.ajax({
                 data:  parametros, //datos que se envian a traves de ajax
                 url:   'ajax_proceso4M.php', //archivo que recibe la peticion
                 type:  'post', //método de envio
                 beforeSend: function () {
                         $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
                 },
                 success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         $("#resultado4").html(response);
                }
    });

}

function cambia_direccionC(suma){
    var s = document.getElementById("subasta"). value;

    var c = document.getElementById("contrato").value;
    //alert("C" + c);
    var p = document.getElementById("paleta").value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;

    var a = document.getElementById("partida").value;
    //alert("A" + a);
    var e = document.getElementById("correo").value;
    //alert("E" + e);

    var parametros = { "subasta":s, "contrato": c, "partida": a, "paleta": p, "radio": r, "correo": e};
    $.ajax({
                 data:  parametros, //datos que se envian a traves de ajax
                 url:   'ajax_proceso4C.php', //archivo que recibe la peticion
                 type:  'post', //método de envio
                 beforeSend: function () {
                         $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
                 },
                 success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         $("#resultado4").html(response);
                }
    });

}

</script>
