
<?php

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
session_start();
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('../vendor/autoload.php');
$fac = $_SESSION['email'];

if($fac != '' && $fac == 'sgomez@mortonsubastas.com'){
	include "head.php";
	include "aside.php";
	if (isset($_POST["import"])) {

		$allowedFileType = [
			'application/vnd.ms-excel',
			'text/xls',
			'text/xlsx',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		];
	
		if (in_array($_FILES["file"]["type"], $allowedFileType)) {
	
	
			$targetPath = 'uploads/' . $_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
	
			$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	
			$spreadSheet = $Reader->load($targetPath);
			$excelSheet = $spreadSheet->getActiveSheet();
			$spreadSheetAry = $excelSheet->toArray();
			$sheetCount = count($spreadSheetAry);
	
			for ($i = 1; $i <= $sheetCount; $i ++) {
				$participacion = "";
				if (isset($spreadSheetAry[$i][0])) {
					$participacion = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
				}
				$nocliente = "";
				if (isset($spreadSheetAry[$i][1])) {
					$nocliente = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
				}
				$paleta = "";
				if (isset($spreadSheetAry[$i][2])) {
					$paleta = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
				}
				$nombre = "";
				if (isset($spreadSheetAry[$i][3])) {
					$nombre = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
				}
				$martillo = "";
				if (isset($spreadSheetAry[$i][4])) {
					$martillo = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
				}
				$comision = "";
				if (isset($spreadSheetAry[$i][5])) {
					$comision = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
				}
				$iva = "";
				if (isset($spreadSheetAry[$i][6])) {
					$iva = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
				}
				$total = "";
				if (isset($spreadSheetAry[$i][7])) {
					$total = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
				}
				$nosubasta = "";
				if (isset($spreadSheetAry[$i][8])) {
					$nosubasta = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
				}
				$documentacion = "";
				if (isset($spreadSheetAry[$i][9])) {
					$documentacion = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
				}
				$status = "";
				if (isset($spreadSheetAry[$i][10])) {
					$status = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
				}
				$usuario = "";
				if (isset($spreadSheetAry[$i][11])) {
					$usuario = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
				}
				$cliente = "";
				if (isset($spreadSheetAry[$i][12])) {
					$cliente = mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
				}
	
				if (! empty($participacion) || ! empty($nocliente) || !empty($paleta) || !empty($nombre) || !empty($martillo) || !empty($comision) || !empty($iva) || !empty($total) || !empty($nosubasta) || !empty($documentacion) || !empty($status) || !empty($usuario) || !empty($cliente)) {
					$query = "insert into pld(participacion,no_cliente,paleta,nombre,martillo,comision,iva,total,no_subasta,documentacion,status,usuario,cliente) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
					$paramType = "sssssssssssss";
					$paramArray = array(
						$participacion,
						$nocliente,
						$paleta,
						$nombre,
						$martillo,
						$comision,
						$iva,
						$total,
						$nosubasta,
						$documentacion,
						$status,
						$usuario,
						$cliente
					);
					$insertId = $db->insert($query, $paramType, $paramArray);
					// $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
					// $result = mysqli_query($conn, $query);
	
					if (! empty($insertId)) {
						$type = "success";
						$message = "Excel Data Imported into the Database";
						$insertId = "";
						$participacion = "";
					} else {
						$type = "error";
						$message = "Problem in Importing Excel Data";
					}
				}
			}
		} else {
			$type = "error";
			$message = "Invalid File Type. Upload Excel File.";
		}
	}
	?>
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
	<body>
		<h2>Importar archivo excel PLD</h2>
	
		<div class="outer-container">
			<div class="row">
				<form class="form-horizontal" action="" method="post"
					name="frmExcelImport" id="frmExcelImport"
					enctype="multipart/form-data" onsubmit="return validateFile()">
					<div Class="input-row">
						<label>Seleccionar archivo. <a href="uploads/plantilla.xlsx"
							download>Descargar Plantilla</a></label>
						<div>
							<input type="file" name="file" id="file" class="file"
								accept=".xls,.xlsx">
						</div>
						<div class="import">
							<button type="submit" id="submit" name="import" class="btn-submit">Importar y guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="response"
			class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
	<?php
		$sqlSelect = "SELECT * FROM pld";
		$result = $db->select($sqlSelect);
		if (! empty($result)) {
		?>
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
					<th>Estatus</th>
					<th>Usuario</th>
					<th>Correo Cliente</th>
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
					<td><?php  echo $row['status']; ?></td>
					<td><?php  echo $row['usuario']; ?></td>
					<td><?php  echo $row['cliente']; ?></td>
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