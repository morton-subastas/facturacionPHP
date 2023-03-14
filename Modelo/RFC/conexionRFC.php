<?php

class Conexion{

	public static function conectar(){
                echo "llega";
        $serverName = "rfcserver"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"auction", "UID"=>"auctuser", "PWD"=>"rfcsystems");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        return $conn;
	}


}