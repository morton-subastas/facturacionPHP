<?php

//require_once "conexionRFC.php";

class ModeloRecibo{
	public static function mdl_searchRecibos($recibo){

/*
		$sock = socket_create_listen(1433);
		$cliente = stream_socket_client("tcp://www.desarrollomorton.com:1433", $errno, $errorMessage);

		// Dominio a comprobar
		$sitio = "www.desarrollomorton.com";
		// Puerto a comprobar, el web es el 80
		$puerto = 1433;
		$fp = fsockopen($sitio,$puerto,$errno,$errstr,10);
		if(!$fp){
			echo "No ha sido posible la conexionses";
			// El modo de tratamiento del error puede ser el que se quiera, por ejemplo enviar un email.
		}else{
			echo "<br>Conexion realizada con exitoses";
			fclose($fp);
		}
*/

         /*$pdo->beginTransaction();*/
				 echo "<br>llega modelo....".$recibo."<br><br>";

				$serverName = "130.82.1.75\rfcserver"; //serverName\instanceName
				//$serverName = "rfcserver"; //serverName\instanceName

				echo "<br>2";
				$connectionInfo = array( "Database"=>"auction", "UID"=>"auctuser", "PWD"=>"rfcsystems");
				echo "antes";
	 			$conn = sqlsrv_connect( $serverName, $connectionInfo);
	 			echo "conexion".$conn;

	 			if( $conn ) {
 					echo "Conexión establecida.<br />";
				}else{
 					echo "Conexión no se pudo establecer.<br />";
 					die( print_r( sqlsrv_errors(), true));
				}

				 return 7;
			 }

			 public static function nada(){
				 return 0;
				 echo "llega";
			 }
		 }

?>
