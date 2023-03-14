<?php


    $ServerName = "130.82.1.75\RFCSERVER";
    $connectionInfo = array("Database"=>"prueba_usuarios", "UUID"=>"auctuser", "PWD"=>"rfcsystems", "CharacterSet"=>"UTF-8");

    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        echo "Conexión establecida.<br />";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
