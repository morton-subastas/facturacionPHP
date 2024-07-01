<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">

<?php
session_start();
$fac = $_SESSION['email'];

if (($fac != '')) {
  $conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");

  include "head.php";
  include "aside.php";
  include 'funciones_RFC.php';

  //echo "SearchSellers<br>";
  //echo "SUBASTA:".$_POST["subasta"]."<br>";
  //echo "ROL".$_POST["rol"]."<br>";
  $subasta = $_POST["subasta"];
  if ($subasta == '') {
    $subasta = $_GET["subasta"];
  }
  $rol_recibe = $_POST["rol"];
  if ($rol_recibe == '') {
    $rol_recibe = $_GET['rol'];
  }

  //echo "subasta*-".$subasta."-";
  $variable = getEmail($subasta);
  //echo "--------------"; var_dump($variable); echo "--------------";
  //echo "0)En proceso de construccion<br>";
  //echo "muestra".
  $cuantos  = count($variable);
  //echo "cuantos:-".$cuantos."-";

  $suma = 0;

  $temporal = 0;
  $formulario = 1;

  echo "<center>";
  echo "<div class='container'>";
  echo "<div class='row'>";
  echo "<div class='col-md-12'>";
  //$de = 0;

  echo "<table class='table table-bordered' width='92%' border='2'>";
  echo "<tr><th colspan='6' style='background-color:#004D43; color: #fff;'><center><b><h1>LOTES NO VENDIDOS DE LA SUBASTAS " . $subasta . " </h1></b></center></th></tr>";
  echo "<tr style='color:#fff; font-weight:normal; text-align:center; background: #004D43'>";
  //echo "<th style='font-weight:normal; text-align:center'>LOTE_</th>";
  echo "<td  bgcolor='#004D43' style='color:#ffffff' width='5%'>LOTE</th>";
  echo "<th style='font-weight:normal; text-align:center'>DESCRIPCION</th>";
  echo "<th style='font-weight:normal; text-align:center'>PRECIOS</th>";
  echo "<th style='font-weight:normal; text-align:center'>CLIENTE</th>";
  echo "<th style='font-weight:normal; text-align:center'>CORREO</th>";
  echo "<th style='font-weight:normal; text-align:center'>IMAGEN</th>";
  echo "</tr>";

  $suma2 = 0;
  $cuantos2 = $cuantos;
  $array_vacio = 0;
  $arreglo_cuantos = array();
  $disponible = 0;

  while ($suma2 < $cuantos2) {
    if ($conn->connect_error) {
      die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
      $resultado = "ERROR";
    } else {
      //echo "sum-".$suma."-cuantos".$cuantos."<br>";
      $comienza = 0; //0
      $tempo_suma = 0;
      //$suma = 20; $cuantos = 40;    //QUITAR
      $contador = $suma2 + 1;
      //var_dump($variable);

      $con_B = trim($variable[$suma2]["receipt"]);
      $par_B = trim($variable[$suma2]["item"]);
      $pal_B = substr($variable[$suma2]["salelot"], 5, 12);
      $pal_B = trim($pal_B);
      $cor_B = trim($variable[$suma2]["email"]);

      $Host = "localhost";
      $User = "root";
      $Password = "h0rKm8dEwHZz";
      $DataBase = "timbrado";
      $conexion = mysqli_connect($Host, $User, $Password, $DataBase) or die("No se pudo realizar la conexion con el servidor.");

      $sql = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $con_B . "' and `partida`='" . $par_B . "' and `paleta`='" . $pal_B . "' and `correo`='" . $cor_B . "' and `status`='ENVIADO'";
      //echo "SQL-<br>".$sql."<br>";
      //$result = $conn->query($sql);
      //echo "RES".$result."<br>";
      //$trae = $result->num_rows;
      //echo "antes".$trae;
      //$de = $de + $trae;

      $resultado = mysqli_query($conexion, $sql);
      $trae = mysqli_num_rows($resultado);
      //echo "numero".$numero_filas;
      $de = $de + $trae;
      //echo "s)".$suma."-c)".$cuantos."<br>";
      if ($trae == 0) {
        //*echo "c-------------------------INICIO-----------------------<br>";
        $temporal = 0;
        $evalua = 0;
        //*echo $suma2.")".$variable[$suma2]['email']."-->".$array_vacio."<br>";
        if (($array_vacio == 0) && ($variable[$suma2]['email'] <> $arreglo_cuantos[$disponible][0])) {
          $disponible = $disponible + 1;


          $arreglo_cuantos[$disponible][0] = $variable[$suma2]['email'];
          $arreglo_cuantos[$disponible][1] = $suma2;
          $arreglo_cuantos[$disponible][2] = $suma2;
          //echo "disponible <b><h3>".$disponible."</h3></b><br>";
          //*echo "*I.E:-".$arreglo_cuantos[$disponible][0]."-*<br>";
          //*echo "*I.C:-".$arreglo_cuantos[$disponible][1]."-*<br>";
          //echo "*I.FT-".$arreglo_cuantos[$disponible][2]."-*<br>";
          $array_vacio = 1;
          $temporal = 1;
          $evalua = 1;
        } else {
          //*echo "compara ".$variable[$suma2]['email']."vs".$arreglo_cuantos[$disponible][0]."<br>";
          if ($variable[$suma2]['email'] == $arreglo_cuantos[$disponible][0]) {

            //echo "*Trae-".$trae."-<br>";

            if ($trae == 0) {
              $evalua = 1;
              $arreglo_cuantos[$disponible][2] = $suma2;
              //*echo "*E-".$arreglo_cuantos[$disponible][0]."-*<br>";
              //*echo "*C-".$arreglo_cuantos[$disponible][1]."-*<br>";
              //]echo "*FT-".$arreglo_cuantos[$disponible][2]."-*<br>";
              $temporal = 1;
            } else {
              echo "ya en bd<br>";
            }
          } else {

            //*echo "<h4>Tem-".$temporal."</h4><br>";
            $array_vacio = 0;
            $disponible = $disponible + 1;

            $arreglo_cuantos[$disponible][0] = $variable[$suma2]['email'];
            $arreglo_cuantos[$disponible][1] = $suma2;
            $arreglo_cuantos[$disponible][2] = $suma2;
            //*echo $disponible."*TemporalE-".$arreglo_cuantos[$disponible][0]."-*<br>";

          }
        }

        //*echo "---------------------------------------------------------------------------FIN---------------------------------------------------------------------------<br>";
        //$array_vacio=0;
      } else {
        if ($fac == 'mramirez@mortonsubastas.com') {
          echo "<form  class='col-lg-12' id='ItemNotSells' name='ItemNotSells' action='Reenvio.php' method='post' >";
          echo "<tr><td COLSPAN=2><H3>RECONTRATACIÓN</H3></td><td COLSPAN=2>Contrato:" . $con_B . " Partida:" . $par_B . " Lote: " . $pal_B . "</td>";
          echo "<td>" . $cor_B . "</td>";
          echo "<td><button type='submit' id='btn_save' name='btn_save' class='btn-lg btn-2' value='1'>Regresa</button></td></tr>";
          echo "<input type=hidden name='subasta_r' value='" . $subasta . "'>";
          echo "<input type=hidden name='lote_r' value='" . $pal_B . "'>";
          echo "<input type=hidden name='correo_r' value='" . $cor_B . "'>";
          echo "</form>";
        }
        /*
                    if ($fac == 'mjimenez@mortonsubastas.com'){
                      //echo "-a-";
                      while($fila=mysqli_fetch_array($resultado)){
                          //echo $fila."<br>";
                          //var_dump($fila);
                          if ($fila['capturo40'] == 'mjimenez@mortonsubastas.com'){
                            $es_accion = 'RECONTRATACIÓN';
                          }
                          if ($fila['capturo40'] == 'mramirez@mortonsubastas.com'){
                            $es_accion = 'DEVOLUCCIÓN';
                          }
                      }
                      echo "<tr><td COLSPAN=2><H3>".$es_accion."</H3></td><td COLSPAN=4>Contrato:".$con_B." Partida:".$par_B." Paleta".$pal_B."</td></tr>";
                    }
                    */
      }
    }
    //echo "que hace<br>";
    //*echo "<b>RES</b>:".$disponible."-".$arreglo_cuantos[$disponible][0]."(i)".$arreglo_cuantos[$disponible][1]."(f)".$arreglo_cuantos[$disponible][2]."<br><br><br>";

    $suma2 = $suma2 + 1;
  }
  //echo "{".count($arreglo_cuantos)."}<br>";
  $busca_entre = count($arreglo_cuantos);
  //*echo "<br>+++++++++++++++++++++++++++".$busca_entre."++++++++++++++++++++++++++++++++++++<br>";
  $star = 0;
  while ($star <= $busca_entre) {
    //*echo "(".$star.")".$arreglo_cuantos[$star][0]."-inicio)".$arreglo_cuantos[$star][1]."-fin)".$arreglo_cuantos[$star][2]."<br>";
    $star = $star + 1;
  }
  //*echo "<br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";
  $arranca = 1;

  while ($suma < $cuantos) {
    $mas = $suma + 1;
    if ($conn->connect_error) {
      die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
      $resultado = "ERROR";
    } else {
      //var_dump($variable[$suma]); echo "<br><br>";
      $con_B = trim($variable[$suma]["receipt"]);
      $par_B = trim($variable[$suma]["item"]);
      $pal_B = substr($variable[$suma]["salelot"], 5, 12);
      $pal_B = trim($pal_B);
      $cor_B = trim($variable[$suma]["email"]);
      //echo $con_B."<br>";
      $sql2 = "SELECT * FROM `emailenviados` WHERE `contrato`='" . $con_B . "' and `partida`='" . $par_B . "' and `paleta`='" . $pal_B . "' and `correo`='" . $cor_B . "' and `status` in ('ENVIADO')";
      //echo $suma."SQL:".$sql2."<br>";
      $result2 = $conn->query($sql2);
      //echo "RES".$result."<br>";
      $trae2 = $result2->num_rows;
      //echo $trae2."<br>";
      if ($trae2 == 0) {
        $inactivar = 0;
        if ($formulario == 1) {
          if ($rol_recibe == 'EMAIL') {
            echo "<form  class='col-lg-12' id='ItemNotSells' name='ItemNotSells' action='EmailSending.php' method='post' >";
            echo "<form id='ItemNotSells' name='ItemNotSells' method='post'>";
            //echo "(A)<br>";
          }
          if ($rol_recibe == 'DEVOLVER') {
            echo "<form  class='col-lg-12' id='ItemNotSells' name='BackItemUser' action='BackItemUser.php' method='post' >";
            //echo "(*B*)<br>";
          }
        }
        echo "<input type='hidden' name='suma' id=suma='suma' value='" . $suma . "'>";
        echo "<tr>";
        echo "<td>";
        echo "<h5>Contrato:<b>" . $variable[$suma]["receipt"] . "</b><h5><br><br>";
        echo "<input type='hidden'  id='contrato" . $suma . "' name='contrato" . $suma . "' value=" . $variable[$suma]["receipt"] . ">";
        echo "<h5>Partida:<b>" . $variable[$suma]["item"] . "</b></h5><br><br>";
        echo "<input type='hidden' size='10' id='partida" . $suma . "' name='partida" . $suma . "' value=" . number_format($variable[$suma]["item"]) . ">";

        $pos = strpos($variable[$suma]["salelot"], " ");
        //echo "**".$pos."**<br>";
        //echo $suma."-".$variable[$suma]["salelot"]."-<br><br>";
        echo "<h5>Lote:<b>" . substr($variable[$suma]["salelot"], 5, 12) . "</b></h5><br>";
        echo "<input type='hidden' id='paleta" . $suma . "' name='paleta" . $suma . "' value='" . substr($variable[$suma]["salelot"], 5, 12) . "'>";
        echo "</td>";
        echo "<td>";
        //echo $suma."_2)".$variable[$suma]["descript"]."<br>";
        echo "<h5>" . $variable[$suma]["descript"] . "</h5><br>";
        echo "<input type='hidden' id='descripcion' name='descripcion' value='" . $variable[$suma]["descript"] . "''>";
        echo "</td>";
        echo "<td>";
        echo "<b>RESERVA:</b><input type='text' id='' name='' value='" . number_format($variable[$suma]["reserve"]) . "' disabled><br><br>";
        echo "<input type='hidden' id='reserva' name='reserva' value='" . $variable[$suma]["reserve"] . "'>";

        if ($comienza == 0) {
          $tempo_suma = $suma;
          //echo "Comienza:<input type='hidden' id='comienza_num' name='comienza_num' value='".$suma."'>";
          $comienza = 1;
        } else {
          echo "<input type='hidden' id='comienza_num' name='comienza_num' value='" . $tempo_suma . "'>";
          //echo "Fin:<input type='text' id='fin' name='fin' value='".$suma."'>";
        }
        if (($rol_recibe == 'EMAIL') || ($rol_recibe == 'SUPERADMIN')) {
          echo "SE OFRECE-:<input type='text' class='noofrece' size='10' id='ofrece" . $suma . "' name='ofrece" . $suma . "' onblur='quecapturo(" . $suma . ")' onKeypress='if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;' onchange={MASK(this,this.value,'-$##,###,##0.00',1)} ><br>";
        }
        echo "<div id='resultado' name='resultado'></div><br>";
        echo "<h4>$" . number_format($variable[$suma]["low"]) . "-$" . number_format($variable[$suma]["high"]) . "</h4><br>";
        //echo "suma".$suma."<br>";
        echo "</td>";
        echo "<td>";
        $nombre = $variable[$suma]["firstname"] . " " . $variable[$suma]["lastname"];
        echo $nombre;
        echo "<input type='hidden' id='nombre' name='nombre' value=" . $nombre . ">";
        echo "</td>";
        echo "<td>";
        echo "<br><br>";
        if (($rol_recibe == 'DEVOLVER') || ($rol_recibe == 'SUPERADMIN')) {
          echo "<div class='form-check form-switch'>";
          //echo "<input class='form-check-input' type='checkbox' id='return".$suma."' name='return".$suma."' onclick='devolver($suma)'>";
          //echo "<label class='form-check-label' for='flexSwitchCheckChecked'>*Devolver*</label>";
          echo "</div>";
        }
        echo "<div id='resultado3' name='resultado3'></div>";
        if (trim($variable[$suma]["email"]) == '') {
          echo "<input class='form-control form-control-lg concolor' style='width:200px' type='text' value='" . $variable[$suma]["email"] . "' id='correo" . $suma . "' name='correo" . $suma . "' size='30'><br><br>";
        } else {
          echo "<input class='form-control form-control-lg' style='width:200px' type='text' value='" . $variable[$suma]["email"] . "' id='correo" . $suma . "' name='correo" . $suma . "' size='30'><br><br>";
        }
        if (($rol_recibe == 'EMAIL') || ($rol_recibe == 'SUPERADMIN')) {
          echo "Comentarios:<br><textarea id='observaciones" . $suma . "' name='observaciones" . $suma . "' rows='4' cols='23'  class='noofrece' onblur='agrega_texto($suma)'></textarea>";
        }
        echo "<div id='resultado2' name='resultado2'></div>";
        if ($rol_recibe == 'DEVOLVER') {
          echo "<label class='miro-radiobutton'>";
          echo "<input type='radio' name='radio" . $suma . "' id='radio" . $suma . "' value='Athos175' onchange='cambia_direccionA175($suma)'>";
          echo "<span>Monte Athos 175</span>";
          echo "</label><br>";
          echo "<label class='miro-radiobutton'>";
          echo "<input type='radio' name='radio" . $suma . "' id='radio" . $suma . "' value='Athos179' onchange='cambia_direccionA179($suma)'>";
          echo "<span>Monte Athos 179</span>";
          echo "</label><br>";
          echo "<label class='miro-radiobutton'>";
          echo "<input type='radio' name='radio" . $suma . "' id='radio" . $suma . "' value='Mayka' onchange='cambia_direccionM($suma)'>";
          echo "<span>Cerro Mayka</span>";
          echo "</label><br>";
          echo "<label class='miro-radiobutton'>";
          echo "<input type='radio' name='radio" . $suma . "' id='radio" . $suma . "' value='Constituyentes' onchange='cambia_direccionC($suma)'>";
          echo "<span>Constituyentes</span>";
          echo "</label><br>";
          echo "<div id='resultado4' name='resultado4'></div>";
        }
        echo "</td>";
        echo "<td>";
        $valor = "/";
        $este = "\ ";
        $este = trim($este);
        //echo $suma."_9)".$cambio."<br>";
        $img = $variable[$suma]["pictpath"];
        $cambio = str_replace($este, $valor, $img);
        $cambio = str_replace("p:/", "", $cambio);
        //echo $cambio;
        echo "<img src='https://mimorton.com/imglink/$cambio' width='100%' heigth='100%'> ";
        echo "<br>";
        $actual = $variable[$suma]["receipt"];
        $after = $variable[$contador]["receipt"];

        //echo "*".$suma."Actual-".$actual."-  ".$contador."Despues_".$after."_";
        if ((trim($actual) !== trim($after))) {
          $cambia_contrato = 1;
        }
        echo "</td>";
        echo "</tr>";
        $formulario = 0;
        echo "<tr>";
        echo "<td colspan=6>";
        if ($temporal == 0) {
          $suma_temporal = $suma;
          $temporal = 1;
          //echo "ENTRA TEMPORAL<br>";
        }
        //echo "arranca_:".$arranca."-vs-".$suma."<br>";
        //echo "c<b>".$variable[$suma]['email']."</b>--e".$arreglo_cuantos[$arranca][0]."<br>";
        //echo "c<b>".$suma."</b>-e(".$arranca.")".$arreglo_cuantos[$arranca][2]."<br>";
        if (($variable[$suma]['email'] == $arreglo_cuantos[$arranca][0])  && ($suma == $arreglo_cuantos[$arranca][2])) {
          $cambia_contrato = 0;
          if ($suma_temporal == '') {
            $suma_temporal = 0;
          }
          echo "<center>";
          echo "<input type='hidden' id='subasta' name='subasta' value='" . $subasta . "'>";
          echo "<input type='hidden' id='empieza' name='empieza' value='" . $suma_temporal . "'>";
          echo "<input type='hidden' id='finaliza' name='finaliza' value='" . $suma . "'>";
          echo "<button type='submit' id='btn_save' name='btn_save' class='btn-lg btn-2' value='1'>Enviar Correo 0</button>";
          echo "</center>";
          $suma_temporal = '';
          $temporal = 2;
          $formulario = 1;
          echo "</form>";
          //echo "{}";
          $arranca = $arranca + 1;
        }
        echo "</td>";
        echo "</tr>";
        //echo "suma".$suma."cuantos".$cuantos."<br>";
        //echo "T:".$temporal."<br>";
        $resta = $cuantos - $suma;
        //echo "resta-".$resta."-<br><br>";

        //echo "E <b>".$variable[$suma]['email']."</b>-t<b>".$temporal."</b>-r<b>".$resta."</b><br>";
        if (($temporal == 2)) { //} AND ($resta > 1)){
          //echo "entra<br>";
          echo "<tr><td colspan=6 style='background-color:#FFFFFF'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

          echo "</td></tr>";
          echo "<tr style='color:#fff'>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>LOTE-</th>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>DESCRIPCION</th>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>PRECIOS</th>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>CLIENTE</th>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>CORREO</th>";
          echo "<th style='background-color:#004D43; font-weight: normal; text-align:center'>IMAGEN</th>";
          echo "</tr>";
          $temporal = 0;
          $comienza = 0;
        }
      } else {
        //echo "<tr><td colspan=6><b>SALTAR</b><br>".$suma."</td></tr>";
        $inactivar = 1;
        $suma_temporal = '';
        //$temporal = 2;
        $formulario = 1;
        //$arranca = $arranca + 1;
        //echo "<tr><td>ARRANCA".$arranca."</td></tr>";
      }
    }
    //echo "s{".$suma."}<br>";
    $suma = $suma + 1;
    $contador = $suma + 1;
  }

  echo "<tr><td colspan=4></td><td colspan=2>Enviados <b>" . $de . " </b> de <b>" . $cuantos . "</b></td></tr>";

  echo "</table>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
  echo "<center>";
}
?>
<script>
  function MASK(form, n, mask, format) {
    if (format == "undefined") format = false;
    if (format || NUM(n)) {
      dec = 0, point = 0;
      x = mask.indexOf(".") + 1;
      if (x) {
        dec = mask.length - x;
      }

      if (dec) {
        n = NUM(n, dec) + "";
        x = n.indexOf(".") + 1;
        if (x) {
          point = n.length - x;
        } else {
          n += ".";
        }
      } else {
        n = NUM(n, 0) + "";
      }
      for (var x = point; x < dec; x++) {
        n += "0";
      }
      x = n.length, y = mask.length, XMASK = "";
      while (x || y) {
        if (x) {
          while (y && "#0.".indexOf(mask.charAt(y - 1)) == -1) {
            if (n.charAt(x - 1) != "-")
              XMASK = mask.charAt(y - 1) + XMASK;
            y--;
          }
          XMASK = n.charAt(x - 1) + XMASK, x--;
        } else if (y && "$0".indexOf(mask.charAt(y - 1)) + 1) {
          XMASK = mask.charAt(y - 1) + XMASK;
        }
        if (y) {
          y--
        }
      }
    } else {
      XMASK = "";
    }
    if (form) {
      form.value = XMASK;
      if (NUM(n) < 0) {
        form.style.color = "#FF0000";
      } else {
        form.style.color = "#000000";
      }
    }
    return XMASK;
  }

  function cambia_direccionA175(suma) {
    var s = document.getElementById("subasta").value;
    //alert ("S" + s);
    var c = document.getElementById("contrato" + suma).value;
    //alert("C" + c);
    var p = document.getElementById("paleta" + suma).value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida" + suma).value;
    //alert("A" + a);
    var e = document.getElementById("correo" + suma).value;
    //alert("E" + e);

    var parametros = {
      "subasta": s,
      "contrato": c,
      "partida": a,
      "paleta": p,
      "radio": r,
      "correo": e
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso4A175.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado4").html(response);
      }
    });

  }

  function cambia_direccionA179(suma) {
    var s = document.getElementById("subasta").value;
    var c = document.getElementById("contrato" + suma).value;
    //alert("C" + c);
    var p = document.getElementById("paleta" + suma).value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida" + suma).value;
    //alert("A" + a);
    var e = document.getElementById("correo" + suma).value;
    //alert("E" + e);

    var parametros = {
      "subasta": s,
      "contrato": c,
      "partida": a,
      "paleta": p,
      "radio": r,
      "correo": e
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso4A179.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado4").html(response);
      }
    });

  }

  function cambia_direccionM(suma) {
    var s = document.getElementById("subasta").value;
    var c = document.getElementById("contrato" + suma).value;
    //alert("C" + c);
    var p = document.getElementById("paleta" + suma).value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;
    //alert("R" + r);
    var a = document.getElementById("partida" + suma).value;
    //alert("A" + a);
    var e = document.getElementById("correo" + suma).value;
    //alert("E" + e);

    var parametros = {
      "subasta": s,
      "contrato": c,
      "partida": a,
      "paleta": p,
      "radio": r,
      "correo": e
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso4M.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado4").html(response);
      }
    });

  }

  function cambia_direccionC(suma) {
    var s = document.getElementById("subasta").value;

    var c = document.getElementById("contrato" + suma).value;
    //alert("C" + c);
    var p = document.getElementById("paleta" + suma).value;
    //alert("P" + p);
    var r = document.getElementById("radio" + suma).value;

    var a = document.getElementById("partida" + suma).value;
    //alert("A" + a);
    var e = document.getElementById("correo" + suma).value;
    //alert("E" + e);

    var parametros = {
      "subasta": s,
      "contrato": c,
      "partida": a,
      "paleta": p,
      "radio": r,
      "correo": e
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso4C.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado4").html("<p style='color:green';>Agregado, con éxito...</p>");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado4").html(response);
      }
    });

  }

  function agrega_texto(suma) {
    var c = document.getElementById("contrato" + suma).value;
    var p = document.getElementById("paleta" + suma).value;
    var o = document.getElementById("observaciones" + suma).value;
    //alert(c); alert(p); alert(o);
    var parametros = {
      "contrato": c,
      "paleta": p,
      "observaciones": o
    };
    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso2.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado2").html("<p style='color:green';>Agregado, con éxito...</p>");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado2").html(response);
      }
    });
  }

  function quecapturo(suma) {
    //alert("##Comienza##");

    //document.getElementById("ofrece" + suma).style.border="1px solid #f00";
    document.getElementById("ofrece" + suma).style.backgroundColor = "#82E0AA";
    //alert(z);
    var s = document.getElementById("subasta").value;
    var c = document.getElementById("contrato" + suma).value;
    var p = document.getElementById("partida" + suma).value;
    var a = document.getElementById("paleta" + suma).value;
    var x = document.getElementById("ofrece" + suma).value;
    var e = document.getElementById("correo" + suma).value;
    //  alert(s);alert(c);alert("par" + p);alert("paleta" +a);alert(x);alert(e);

    var parametros = {
      "subasta": s,
      "contrato": c,
      "partida": p,
      "ofrece": x,
      "paleta": a,
      "correo": e
    };

    $.ajax({
      data: parametros, //datos que se envian a traves de ajax
      url: 'ajax_proceso.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function() {
        $("#resultado").html("<p style='color:green';>Agregado, con éxito...</p>");
        //alert("regresa");
      },
      success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        $("#resultado").html(response);
        //alert("insertado");
      }
    });

  }
  /*
  function devolver(numero){
    //alert("entra__" + numero);
    var c1 = document.getElementById("contrato" + numero).value;
    //alert(c);
    var p1 = document.getElementById("partida" + numero).value;
    //alert(p);
    var a1 = document.getElementById("paleta" + numero).value;
    //alert(a);
    var e1 = document.getElementById("correo"+ numero).value;
    //alert(e);
    //alert(x);
    //alert(e);
    var parametros2 = { "contrato": c1, "partida": p1, "paleta": a1,  "correo": e1};
    $.ajax({
                 data:  parametros2, //datos que se envian a traves de ajax
                 url:   'ajax_proceso3.php', //archivo que recibe la peticion
                 type:  'post', //método de envio
                beforeSend: function () {
                         $("#resultado3").html("<p style='color:green';>Agregado, con éxito...</p>");
                 },
                 success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         $("#resultado3").html(response);
                 }
         });
         .done(function(response){
           alert (response);
            $("#resultado3").html(response);
         });
    //alert("Ac");
  }
  */
</script>