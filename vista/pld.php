
<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	
	<style>
	
	.outer-container {
		border: #e0dfdf 1px solid;
		padding: 30px 30px 10px 30px;
		border-radius: 15px;
		text-align: center;
		margin: 10px auto;
		width: 350px;
	}
	
	.tutorial-table {
		margin-top: 40px;
		font-size: 14px;
		border-collapse: collapse;
		width: 100%;
	}
	
	.tutorial-table th {
		background: #f0f0f0;
		border-bottom: 2px solid #dddddd;
		padding: 10px;
		text-align: left;
	}
	
	.tutorial-table td {
		background: #FFF;
		border-bottom: 1px solid #dddddd;
		padding: 10px;
		text-align: left;
	}
	
	#response {
		padding: 10px;
		margin-top: 10px;
		border-radius: 2px;
		display: none;
	}
	
	.success {
		background: #c7efd9;
		border: #bbe2cd 1px solid;
	}
	
	.error {
		background: #fbcfcf;
		border: #f3c6c7 1px solid;
	}
	
	div#response.display-block {
		display: block;
	}
	
	.input-row {
		margin-top: 0px;
		margin-bottom: 20px;
		padding: 20px;
	}
	
	.btn-submit {
		background: #efefef;
		border: #d3d3d3 1px solid;
		width: 100%;
		border-radius: 20px;
		cursor: pointer;
		padding: 12px;
	}
	
	label {
		margin-bottom: 5px;
		display: inline-block;
		font-weight: normal;
	}
	
	.file {
		border: 1px solid #cfcdcd;
		padding: 12px;
		border-radius: 20px;
		color: #171919;
		width: 93%;
		margin-bottom: 20px;
	}
	</style>
	</head>
<?php

  session_start();
  use Phppot\DataSource;

  require_once 'DataSource.php';
  $db = new DataSource();
  $conn = $db->getConnection();
  $fac = $_SESSION['email'];

  if($fac != '' && $fac == 'ksantander@mortonsubastas.com' || $fac == 'vmartinez@mortonsubastas.com' ){
      include "head.php";
      include "aside.php";

      $sqlSelect = "SELECT * FROM pld ORDER BY id desc";
      $result = $db->select($sqlSelect);
      if (! empty($result)) {
      ?>
      <h2 style="text-align:center;">Envio de Correos PLD</h2>
      <div class="table-responsive">
      <table class='tutorial-table' >
        <thead>
          <tr>
            <th>Participacion</th>
            <th>No. Cliente</th>
            <th>Paleta</th>
            <th>Nombre</th>
            <th>Martillo</th>
            <th>Comision</th>
            <th>IVA</th>
            <th>Total</th>
            <th>No. subasta</th>
            <th>Documentación</th>
			<th>Correo Cliente</th>
            <th>Estatus</th>
            <th></th>
          </tr>
        </thead>
    <?php
      foreach ($result as $row) { 
        ?>
        <tbody>
          <tr>
            <td><?php  echo $row['participacion']; ?></td>
            <td><?php  echo $row['no_cliente']; ?></td>
            <td><?php  echo $row['paleta']; ?></td>
            <td><?php  echo $row['nombre']; ?></td>
            <td><?php  echo $row['martillo']; ?></td>
            <td><?php  echo $row['comision']; ?></td>
            <td><?php  echo $row['iva']; ?></td>
            <td><?php  echo $row['total']; ?></td>
            <td><?php  echo $row['no_subasta']; ?></td>
            <td><?php  echo $row['documentacion']; ?></td>
			<td><?php echo $row['cliente']; ?></td>
            <td><?php  
                    if($row['status']=='No enviado'){
                      echo "<form action='enviar_pld' method='POST'>";
                      echo "<input type='hidden' name='documentacion' value='".$row['documentacion']."'>";
					  echo "<input type='hidden' name='id' value='".$row['id']."'>"; 
					  echo "<input type='hidden' name='correo' value='".$row['cliente']."'>";
                      echo "<input type='hidden' name='subasta' value='".$row['no_subasta']."'>";
                      echo "<button type='submit' class='btn btn-primary'>Enviar Correo</td>";
                      echo "</form>";
                    }else{
                      echo "<label>ENVIADO</label>";
                    }
                  ?>
            </td>
          </tr>
    <?php
      }
      ?>
        </tbody>
      </table>
    </div>
    <?php
    }
  }
	?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>