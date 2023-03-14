<?php
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
  include "head.php";
  include "aside.php";


  //echo "SearchSellers<br>";
  //echo "SUBASTA:".$_POST["pre_subasta"]."<br>";
  //$subasta = trim($_POST['pre_subasta']);
  $subasta = trim($_POST['subasta']);
  	//list($sub, $fecha_s, $nom_subasta_es) = explode("&", $subasta);
  echo "*_".$subasta;
    //echo "-".$sub."<br>";
    //echo "-".$fecha_s."<br>";
    //echo "-".$nom_subasta_es."<br>";
  //$subasta = $_POST["subasta"];
  echo "<form  class='col-lg-12 id='ItemNotSells' name='ItemNotSells' method='post' action='SearchSellers'>";
  echo "<center>";
  echo "<table border='1' width='70%'>";
    echo "<tr>";
      echo "<td><b>ACCIÓN</b></td>";
      echo "<td>";
        echo "<select name='rol'>";
          echo "<option value='DEVOLVER'>DEVOLVER</option>";
          echo "<option value='EMAIL'>RECONTRATACIONES</option>";
        echo "</select>";
      echo "</td>";
    echo "</tr>";
    echo "<tr><td colspan=2><hr><input type='hidden' name='subasta' id='subasta' value='$subasta'></td></tr>";
    echo "<tr>";
      echo "<td>";
      echo '<button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Seguir</button>';
      echo "</td>";
    echo "<tr>";
  echo "</table>";
  echo "</form>";
  echo "<br>";
  echo "<form  class='col-lg-12 id='ItemNotSells' name='ItemNotSells' method='post' action='AuctionDoes'>";
      echo "<tr><td colspan=2><hr><input type='hidden' name='pre_subasta' id='pre_subasta' value='".$subasta."'></td></tr>";
      echo '<button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Resultados Subasta</button>';
  echo "</form>";
  echo "<form  class='col-lg-12 id='ItemNotSells' name='ItemNotSells' method='post' action='NotificationPreview'>";
      echo "<tr><td colspan=2><hr><input type='hidden' name='pre_subasta' id='pre_subasta' value='$subasta'></td></tr>";
      echo '<button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Notificacion Previa</button>';
  echo "</form>";
}
?>
