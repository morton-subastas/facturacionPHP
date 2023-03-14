<?php

//require_once("conexion.php");
echo "llega modeloMP<br>";
//require_once "conexion_MP.php";


Class ModeloMultiPagos{

	public static function mdl_getAllPayments(){
    echo "function: mdl_getAllPayments()<br>";
    $mysqli = new mysqli("https://www.mortonsubastas.com", "mortonsu_allan", "Arr1lat3$25", "mortonsu_web_panel");
    echo "si";
    if (mysqli_connect_errno()) {
        //printf("Falló la conexión: %s\n", mysqli_connect_error());
        echo "fallo";
        exit();
    }else
    {
        $consulta = " SELECT * FROM pago  ";
        echo "SQL".$consulta;
        /*
        if ($resultado = $mysqli->query($consulta)) {

            $row_cnt = mysqli_num_rows($resultado);

            if($row_cnt > 0){
                while ($fila = $resultado->fetch_row()) {
                  eho "fila".$fila;
                }
            }
          }
          */
        }



  return 0;
  }
}


/*
  	$sql = "SELECT * FROM `pago`";
		echo "asi".$sql."<br>";

    $stmt = ConexionMP::conectarMP()->prepare($sql);
		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '".$valor."'");

		//EJECUTAMOS LA SENTENCIA
		$stmt -> execute();
		//REGRESAMOS LOS VALORES, CUANDO ES UNA LINEA fecth CUANDO SON VARIAS fetchAll
		return $stmt -> fetchAll();
					//CERRAMOS LA CONEXION
		$stmt -> close();

		//ANULAMOS EL OBJETO
		$stmt = null;
    */
    //return 0;

?>
