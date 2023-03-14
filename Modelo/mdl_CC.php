<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloACuentaContable{

	public static function mdl_searchCC($clave, $concepto){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							//echo "<br><br>-entra modelo-<br>";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM `centrocostos` WHERE `departamento`='$clave'";
							//echo "<br>".$sql."<br>";
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							$regresa = $son[0][3];
							$regresa  = str_replace("-","", $regresa);
              //var_dump($son[0][3]);
							//echo "<br>---------------------<br>";
							//var_dump($son[3]);
							//echo "<br>--------------------<br>";
              //var_dump($son[0][1]);
              /*$var = $son[0][2];
              //echo "antes:".$var."<br>";
              $sql2 = "SELECT * FROM `cuentaclabe` WHERE `llega`='$var' and `descripcion`='$concepto' ";
							//echo "<br>".$sql2."<br>";
							$stmt2 = $pdo->prepare($sql2);
							$stmt2 -> execute();
							$son2= $stmt2 -> fetchAll();*/
              //echo "es:";
              //var_dump($son2[0]["cuenta_clabe"]);
              //echo "<br>";
              return $regresa;
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}
	public static function mdl_CCDepa($depa, $concepto){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							$concepto = strtoupper($concepto);
							$depa = strtoupper($depa);

							//echo "<br><br>-entra modelo-<br>";
							//echo "<br>------------modelo--------------<br>";
							$sql = "SELECT * FROM `departamento_cuentacontable` WHERE `departamento`='$depa' and `concepto`='$concepto'";
							//echo "<br>".$sql."<br>";
							$stmt = $pdo->prepare($sql);
							$stmt -> execute();
							$son= $stmt -> fetchAll();
							$regresa = $son[0][3];
							$regresa  = str_replace("-","", $regresa);
              //var_dump($son[0][3]);
							//echo "<br>---------------------<br>";
							//var_dump($son[3]);
							//echo "<br>--------------------<br>";
              //var_dump($son[0][1]);
              /*$var = $son[0][2];
              //echo "antes:".$var."<br>";
              $sql2 = "SELECT * FROM `cuentaclabe` WHERE `llega`='$var' and `descripcion`='$concepto' ";
							//echo "<br>".$sql2."<br>";
							$stmt2 = $pdo->prepare($sql2);
							$stmt2 -> execute();
							$son2= $stmt2 -> fetchAll();*/
              //echo "es:";
              //var_dump($son2[0]["cuenta_clabe"]);
              //echo "<br>";
              return $regresa;
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}

	public static function mdl_specificCC($clave){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
							$sql2 = "SELECT * FROM `cuentaclabe` WHERE `descripcion` like '".$clave."' ";
							//echo "<br>".$sql2."<br>";
							$stmt2 = $pdo->prepare($sql2);
							$stmt2 -> execute();
							$son2= $stmt2 -> fetchAll();
              //echo "es:";
              //var_dump($son2[0]["cuenta_clabe"]);
              //echo "<br>";
              return $son2[0]["cuenta_clabe"];
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}

	public static function mdl_specificEmploy($name, $concepto){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
						//$name = trim($name);
						//echo "name:".$name.":<br>";
						$name = "'$name'";
						$concepto = str_replace("é","E", $concepto);
						$concepto = str_replace("ó","O", $concepto);
						$concepto = str_replace("í","I", $concepto);
						$concepto = str_replace("á","A", $concepto);

						$concepto = strtoupper($concepto);
						$concepto = "'$concepto'";
						$sql = "SELECT * FROM `cuentaclabe` WHERE `agrupa`='EMPLEADO' and `descripcion`=$name and `concepto` = $concepto ";

							//echo "<br>+".$name."+".$concepto."+<br><br>".$sql."<br><br>";
							$stmt=$pdo->prepare(trim($sql));
							$stmt->execute();
							$son= $stmt->fetchAll();
            	//echo "modelo:<br>";
              //var_dump($son2[0]["cuenta_clabe"]);
							//var_dump($son);
              //echo "<br>";
              return $son[0]["cuenta_clabe"];
							$pdo->commit();
							$stmt -> close();
							//ANULAMOS EL OBJETO
							$stmt = null;

					}catch(PDOException $e){

							return 0;
							$pdo->rollBack();
					}

	}

	public static function mdl_get36($name){
		$pdo = Conexion::conectar();
		//echo "pdo".$pdo."<br>";
		$pdo->beginTransaction();
					try {
						//$name = trim($name);
						//echo "name:".$name.":<br>";
						$name = "'$name'";
						$sql = "SELECT * FROM `cuentaclabe` WHERE `agrupa`='EMPLEADO' and `descripcion`=$name ";

							//echo "<br>+".$name."+".$sql."<br><br>";
							$stmt=$pdo->prepare(trim($sql));
							$stmt->execute();
							$son= $stmt->fetchAll();
            	//echo "modelo:<br>";
              //var_dump($son2[0]["cuenta_clabe"]);
							//var_dump($son);
              //echo "<br>";
              return $son[0]["36"];
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
