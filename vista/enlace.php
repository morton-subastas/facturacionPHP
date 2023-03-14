<?php
echo "llega";
/*
$serverName = "rfcserver"; //serverName\instanceName
$connectionInfo = array( "Database"=>"auction", "UID"=>"auctuser", "PWD"=>"rfcsystems");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM catlist";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['catno']."-".$row['refno']."-".$row['catcode']."<br />";
}

sqlsrv_free_stmt( $stmt);
*/
?>
