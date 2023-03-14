<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloAgregarConceptos{

	public static function c_AgregarConceptos($desc, $cptoSAT, $uni, $cant, $val, $folio){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
		try {
			$sub = null;
			$iva = null;
			$tot = null;
			$sub0 = null;
			$sub1 = null;
			//echo "modelo";
			//echo "<br>------------modelo--------------<br>";
			$sql = "SELECT * FROM cfdi_productos ORDER BY cfdiproid ASC";
			//echo "asi".$sql;
			  $stmt = $pdo->prepare($sql);
			$stmt -> execute();
			$son= $stmt -> fetchAll();
			  //echo "son".var_dump($son)."<br>";
			$contador = count($son);
			if ($contador	 > 0){
				  $contador = $contador - 1;
				$max = $son[$contador]['cfdiproid'];
				//echo "contador".$contador."<br>";
			}else{
				$max = 0;
			}
			//echo "max".$max."<br>";
			  $contador= $max + 1;
			//echo "<br>total".$contador;

			$sql = "SELECT * FROM c_unidad";
			//echo "asi".$sql;
			  $stmt = $pdo->prepare($sql);
			$stmt -> execute();
			$son= $stmt -> fetchAll();
			//$contador = count($son);
			  $unidad = $son[0]['unidad_nombre'];
			//echo "<br><br>***";
			$desc = str_replace("<center>","", $desc); $desc = str_replace("</center>","", $desc);
			$desc = str_replace("<b>","", $desc); $desc = str_replace("</b>","", $desc);


			$sql_insproducto = "INSERT INTO `cfdi_productos`(`empid`, `cfdiproid`, `cfdiprosta`, `cfdiprosku`, `cfdipronom`, `cfdiprosat`, `cfdiprosatuni`, `cfdiprouni`, `cfdipropre1`, `cfdiproivacla`, `cfdiproivafac`, `cfdiproivatas`)
						VALUES ('1','$contador','A','4','$desc','$cptoSAT','$uni','$unidad','0.0','002','Tasa','16.0');";

			  //echo "asi<br>".$sql_insproducto."<br><br>";
			$stmt_insproducto =  Conexion::conectar()->prepare($sql_insproducto);

			//EJECUTAMOS LA SENTENCIA
			$stmt_insproducto -> execute();
			$sub = str_replace("$","", $sub); $sub = str_replace(",","", $sub);
			$iva = str_replace("$","", $iva); $iva = str_replace(",","", $iva);
			$tot = str_replace("$","", $tot); $tot = str_replace(",","", $tot);

			//PREMIUM
			$sub= $val * 0.20;
			//MARTILLO
			//$sub1 = $cant * $val;
			//$sub = $sub0 + $sub1;

			$iva =  $sub * 0.16;
			$tot = $sub + $iva;


			$sql2_insdetalle = "INSERT INTO `cfdi_detalle`(`empid`, `cfdiserid`, `cfdiid`, `cfdidetid`, `cfdiproid`, `cfdidetcan`, `cfdidetval`, `cfdidetcon`, `cfdidetdes`, `cfdidetsub`, `cfdidetiva`, `cfdidettot`)
						VALUES ('1','1',$folio,'$contador','$contador','$cant','$sub','','0.00','$sub','$iva','$tot');";

			//echo "dos<br><br>".$sql2_insdetalle;

			$stmt_insdetalle =  Conexion::conectar()->prepare($sql2_insdetalle);

			//EJECUTAMOS LA SENTENCIA
			$stmt_insdetalle -> execute();

			return true;
			$pdo->commit();
			$stmt -> close();
			//ANULAMOS EL OBJETO
			$stmt = null;

		}catch(PDOException $e){
			return false;
			$pdo->rollBack();
		}
	}

	public static function c_AgregarConceptos_N($desc, $cptoSAT, $uni, $cant, $val, $folio, $aplica_20_porcent, $cambia, $martillo, $lote, $iva_colocar){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
		try {
			$sub = null;
			$iva = null;
			$tot = null;
			$sub0 = null;
			$sub1 = null;
			//echo "modelo";
			//echo "<br>------------modelo--------------<br>";
			//echo "MARTILLO".$martillo."<br>";
			$sql = "SELECT * FROM `cfdi_productos` ORDER BY `cfdiproid` ASC";
			//echo "asi".$sql;
			  $stmt = $pdo->prepare($sql);
			$stmt -> execute();
			$son= $stmt -> fetchAll();
			  //echo "son".var_dump($son)."<br>";
			$contador = count($son);
			if ($contador	 > 0){
				  $contador = $contador - 1;
				$max = $son[$contador]['cfdiproid'];
				//echo "contador".$contador."<br>";
			}else{
				$max = 0;
			}
			//echo "max".$max."<br>";
			  $contador= $max + 1;
			//echo "<br>total".$contador;

			$sql = "SELECT * FROM `c_unidad`";
			//echo "asi".$sql;
			  $stmt = $pdo->prepare($sql);
			$stmt -> execute();
			$son= $stmt -> fetchAll();
			//$contador = count($son);
			  $unidad = $son[0]['unidad_nombre'];
			//echo "<br><br>***";
			$desc = str_replace("<center>","", $desc); $desc = str_replace("</center>","", $desc);
			$desc = str_replace("<b>","", $desc); $desc = str_replace("</b>","", $desc);
			$desc = str_replace("<br>","", $desc); 

			$sql_insproducto = "INSERT INTO `cfdi_productos`(`empid`, `cfdiproid`, `cfdiprosta`, `cfdiprosku`, `cfdipronom`, `cfdiprosat`, `cfdiprosatuni`, `cfdiprouni`, `cfdipropre1`, `cfdiproivacla`, `cfdiproivafac`, `cfdiproivatas`, `lote`)
						VALUES ('1','$contador','A','4','$desc','$cptoSAT','$uni','$unidad','0.0','002','Tasa','16.0','$lote');";

			//echo "asi<br>".$sql_insproducto."<br><br>";
			$stmt_insproducto =  Conexion::conectar()->prepare($sql_insproducto);

			//EJECUTAMOS LA SENTENCIA
			$stmt_insproducto -> execute();
			//echo "antes".$sub."<br>";
			$sub = str_replace("$","", $sub); $sub = str_replace(",","", $sub);
			$iva = str_replace("$","", $iva); $iva = str_replace(",","", $iva);
			$tot = str_replace("$","", $tot); $tot = str_replace(",","", $tot);
			$martillo = str_replace("$","", $martillo);
			$martillo = str_replace(",","", $martillo);

			//echo "trae martillo:".$martillo."<br>";
			if ($martillo > 0){		//INDICA QUE SI SE APLICO UN PORCENTAJE Y HAY QUE APLICARLE EL MARTILLO
				//echo "SI entro para formatear martillo<br>";
				if ($aplica_20_porcent == "SI"){
						$val = $martillo * 0.20;
				}
			}else{//SI NO ENTRA DIRECTO EL PRECIO
				//echo "NO entro a formatear";
				$martillo = 0.0;
				$val = $val;
			}
			//PREMIUM
			//echo "val.".$val."<br>";
			//echo "cant.".$cant."<br>";
			$sub= $val * $cant;
			//echo "sub.".$sub;
			//MARTILLO
			//$sub1 = $cant * $val;
			//$sub = $sub0 + $sub1;

			if ($iva_colocar == ""){
				$iva =  $sub * 0.16;
			}else{
				if($iva_colocar == "COMISION_6-6"){
					$iva = $sub * 0.066;
					$iva = $iva * 0.16;
				}else{
					$iva = 0.0;
				}
			}
			$tot = $sub + $iva;


			//echo "<br>iva".$iva_colocar."<br>";
			//echo "martillo: ".$martillo."<br>";
			$sql2_insdetalle = "INSERT INTO `cfdi_detalle`(`empid`, `cfdiserid`, `cfdiid`, `cfdidetid`, `cfdiproid`, `cfdidetcan`,`martillo`, `cfdidetval`, `cfdidetcon`, `cfdidetdes`, `cfdidetsub`, `cfdidetiva`, `cfdidettot`)
						VALUES (1,1,".$folio.",".$contador.",".$contador.",'".$cant."','".$martillo."','".$val."','$cambia','0.00','".$sub."','".$iva."','".$tot."');";

			//echo "dos<br><br>".$sql2_insdetalle;

			$stmt_insdetalle =  Conexion::conectar()->prepare($sql2_insdetalle);

			//EJECUTAMOS LA SENTENCIA
			$stmt_insdetalle -> execute();

			return true;
			$pdo->commit();
			$stmt -> close();
			//ANULAMOS EL OBJETO
			$stmt = null;

		}catch(PDOException $e){
			return false;
			$pdo->rollBack();
		}
	}


	public static function mdl_AllConceptos($folio){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							//echo "<br><br>entra modelo";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM cfdi_detalle WHERE cfdiid=$folio";
							//echo "<br>asi".$sql;
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							$receptor_desc = $son[0]['empid'];

							//echo "<br>son".$receptor_desc;
							if ($receptor_desc != ''){
								return 1;
							}else{
								return 0;
							}
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}
}


?>
