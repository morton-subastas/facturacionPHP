<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloProductoIngresado{

	public static function c_ProductoIngresado($folio){
		//$usuario = pepe" . " OR = 1 ;

		$sql = "SELECT *
                        FROM cfdi_productos p, cfdi_detalle d
                              WHERE p.empid = d.empid
                              AND p.cfdiproid = d.cfdiproid
															AND d.cfdiid = $folio
                             ";
            //echo "asi".$sql;
            $stmt = Conexion::conectar()->prepare($sql);
            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");


            //EJECUTAMOS LA SENTENCIA
		    $stmt -> execute();
            //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		    return $stmt -> fetchAll();
            //CERRAMOS LA CONEXION
		    $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;

	}

	public static function c_ProductoEliminar($folio){
		//$usuario = pepe" . " OR = 1 ;
		//echo "MODELO<br>";
		//$folio = 1;
		$sql = "SELECT * FROM cfdi_detalle WHERE cfdiid = $folio";
    //echo "asi".$sql."<br>";
    $stmt = Conexion::conectar()->prepare($sql);
    //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

		//EJECUTAMOS LA SENTENCIA
		$stmt -> execute();
    //REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		$son = $stmt -> fetchAll();
		//echo "CONTADOR:".count($son)."<br>";
		/*var_dump($son);*/
		$cuenta = count($son);
		$cuenta = $cuenta - 1;
		while($cuenta >= 0){
			//echo "{	<br>";
			//echo "CuentaI:".$cuenta."<br>";
			//$son = $son[$cuenta]["cfdidetid"];
			$res = $son[$cuenta]["cfdidetid"];
							//var_dump($son[$cuenta]["cfdidetid"]);
			//echo "son<b>".$res."</b><br>";
			$sql2 = "SELECT * FROM `cfdi_productos` WHERE `cfdiproid`=$res";
			//echo "".$sql2."<br>";
			$stmt2 = Conexion::conectar()->prepare($sql2);
			$stmt2 -> execute();
			//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
			$son2 = $stmt2 -> fetchAll();
			//echo "CONTADOR:".count($son)."<br>";
			//echo "<br>--<br>";
			//var_dump($son2);
			//echo "<br>--<br>";
			$cuenta2 = count($son2);
			//echo "CUENTA".$cuenta2."<br>";
			$sql_delete = "DELETE FROM `cfdi_productos` WHERE `cfdiproid`=$res";
			//echo "".$sql_delete."";
			$stmt_delete = Conexion::conectar()->prepare($sql_delete);
			$stmt_delete -> execute();
			//$stmt_delete -> close();
			$cuenta = $cuenta - 1;
			//echo "CuentaF:".$cuenta."<br>";
			//echo "<br>}<br>";
			$bandera = 1;
		}

		if ($bandera == 1){
			$sql_delete = "DELETE FROM cfdi_detalle WHERE cfdiid = $folio ";
			//echo "".$sql_delete."";
			$stmt_delete = Conexion::conectar()->prepare($sql_delete);
			$stmt_delete -> execute();
			//$stmt_delete -> close();
		}

		return $cuenta;
    //CERRAMOS LA CONEXION
		$stmt -> close();

    //ANULAMOS EL OBJETO
    $stmt = null;
	}
}


?>
