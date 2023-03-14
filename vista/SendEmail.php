<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
    $conn = new mysqli("localhost", "root", "h0rKm8dEwHZz", "timbrado");

    include "head.php";
    include "aside.php";

    ?>
    <div class="container">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header"><h1><strong style="color:#004D43 !important">Correos</strong> <strong>Enviados</strong></h1><br><br></legend>
                <form  class="col-lg-12"  action="SearchSellers" method="post" >
                  <div class="form-group">
                    <!--<div class="col-md-3  text-center"></div>-->
                    <div class="col-md-12  text-center">
                      <?php
                      $sql = "SELECT * FROM `emailenviados` WHERE `status`= 'ENVIADO' ORDER BY 'CORREO'" ;
                      //echo "SQL-<br>".$sql."<br>";
                      $result = $conn->query($sql);
                      //echo "RES".$result."<br>";
                      $trae = $result->num_rows;
                      //echo "TRAE".$trae;
                      if ($trae > 0){
                        ?>
                        Busqueda: <input id="searchTerm" type="text" onkeyup="doSearch()" />
                        <br>
                        <?php
                        echo "<table class='table table-bordered' width='100%' border='2' id='regTable'>
                        <tr>
                          <th style='background-color:#004D43'>CONTRATO</th>
                          <th style='background-color:#004D43'>PARTIDA</th>
                          <th style='background-color:#004D43'>LOTE</th>
                          <th style='background-color:#004D43'>OFRECIO</th>
                          <th style='background-color:#004D43'>CORREO</th>
                        </tr>";
                      }
                      while ($fila = $result->fetch_assoc()){
                        //echo "fila:".var_dump($fila)."<br><br>";
                        //echo $fila["correo"]."<br>";
                        echo "<tr>";
                          echo "<td>".$fila["contrato"]."</td>";
                          echo "<td>".$fila["partida"]."</td>";
                          echo "<td>".$fila["paleta"]."</td>";
                          echo "<td>".$fila["ofrece"]."</td>";
                          echo "<td>";
                            echo '<button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">'.$fila["correo"].'</button>';
                          echo "</td>";
                        echo "</tr>";
                      }

                      echo "</table>";
                        ?>

                    </div>
                    <div class="col-md-3  text-center"></div>
                  </div>
                </form>
          </fieldset>
        </div>
      </div>
    </div>

    <script language="javascript">
			function doSearch() {
				var tableReg = document.getElementById('regTable');
				var searchText = document.getElementById('searchTerm').value.toLowerCase();
				for (var i = 1; i < tableReg.rows.length; i++) {
					var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
					var found = false;
					for (var j = 0; j < cellsOfRow.length && !found; j++) {
						var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
						if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
							found = true;
						}
					}
					if (found) {
						tableReg.rows[i].style.display = '';
					} else {
						tableReg.rows[i].style.display = 'none';
					}
				}
			}
		</script>




<?php
}
?>
