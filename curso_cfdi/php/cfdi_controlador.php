<?php
// http://localhost/curso_cfdi/php/cfdi_controlador.php?modo=0&empid=1&cfdiserid=1&cfdiid=1
// http://localhost/curso_cfdi/php/cfdi_controlador.php?modo=1&empid=1&cfdiserid=1&cfdiid=1
// http://localhost/curso_cfdi/php/cfdi_controlador.php?modo=2&empid=1&cfdiserid=1&cfdiid=1
// http://localhost/curso_cfdi/php/cfdi_controlador.php?modo=3&empid=1&cfdiserid=1&cfdiid=1
// http://localhost/curso_cfdi/php/cfdi_controlador.php?modo=4&empid=1&cfdiserid=1&cfdiid=1
error_reporting(E_ALL); ini_set('display_errors', '1');
$modo = 0;
$empid = 0;
$cfdiserid = 0;
$cfdiid = 0;
if( isset( $_GET[ "modo" ] ) ) $modo = trim( $_GET[ "modo" ] );
if( isset( $_GET[ "empid" ] ) ) $empid = trim( $_GET[ "empid" ] );
if( isset( $_GET[ "cfdiserid" ] ) ) $cfdiserid = trim( $_GET[ "cfdiserid" ] );
if( isset( $_GET[ "cfdiid" ] ) ) $cfdiid = trim( $_GET[ "cfdiid" ] );
// Modo 1 = Mostrar Info
if( $modo == 1 ){
	echo "<h3 align='center'> CFDI 3.3 (Info) </h3>";
	echo "<h3 align='center'> ($empid)($cfdiserid)($cfdiid) </h3>";
}
// Conexion a la DB
include_once( "db_sqlite.php" );
$conexion1 = new db();
$conexion1->conectar();
// Info del CFDI
include_once( "cfdi_info.php" );
$cfdi_info1 = new cfdi_info();
$cfdi_info1->empid = $empid;
$cfdi_info1->cfdiserid = $cfdiserid;
$cfdi_info1->cfdiid = $cfdiid;
$cfdi_info1->obtener_info();
$m_info = $cfdi_info1->m_info;
// Modo 1 = Mostrar Info
if( $modo == 1 ){
	echo "<hr><br> <pre>"; print_r( $m_info ); echo "</pre>"; // exit;
}
// Modo 2 = JSON
if( $modo == 2 ){
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	echo json_encode( $m_info,JSON_UNESCAPED_UNICODE );
}
// Modo 3 = PDF
if( $modo == 3 ){
	include_once( "cfdi_pdf.php" );
	$cfdi_xml1 = new cfdi_xml();
	$cfdi_xml1->empid = $empid;
	$cfdi_xml1->cfdiserid = $cfdiserid;
	$cfdi_xml1->cfdiid = $cfdiid;
	$cfdi_xml1->m_info = $m_info;
}
// Modo 4 = Crear XML y Timbrar:
if( $modo == 4 ){
	//print_r( $m_info );

	include_once( "cfdi_xml.php" );
	$cfdi_xml1 = new cfdi_xml();

	//-MANE-numero de id
	$cfdi_xml1->empid = $empid;
	$cfdi_xml1->cfdiserid = $cfdiserid;
	$cfdi_xml1->cfdiid = $cfdiid;
	$cfdi_xml1->m_info = $m_info;
	//-MANE-
	//var_dump($m_info);

	require_once ("../../Controlador/controladorRutaTimbres.php");
	require_once ("../../Modelo/modeloRutaTimbres.php");

	$c_RutaTimbres =  controladorRutaTimbres::ctrl_AllRutas();
	//var_dump($c_RutaTimbres);
	$ruta_servidor = $c_RutaTimbres[0]["rutatimbre_desc"];

	$xml_carpeta = "../$ruta_servidor/".$empid."/xml/";
	$xml_carpeta_cfdi = "../$ruta_servidor/".$empid."/cfdi/";
	$xml_carpeta_pdf = "../$ruta_servidor/".$empid."/pdf/";

	echo "carpeta".$xml_carpeta_cfdi."<br>";
	//-MANE-creamos la carpeta de donde se generara el XML, CFDI y pdf
/*
	$xml_carpeta = "../files/".$empid."/xml/";
	$xml_carpeta_cfdi = "../files/".$empid."/cfdi/";
	$xml_carpeta_pdf = "../files/".$empid."/pdf/";
*/
	// Crear carpetas:
	if( !file_exists( $xml_carpeta ) ){
		if( !mkdir( $xml_carpeta, 0777, true ) ) die('<br> Error al crear: '. $xml_carpeta );
	}
	if( !file_exists( $xml_carpeta_cfdi ) ){
		if( !mkdir( $xml_carpeta_cfdi, 0777, true ) ) die('<br> Error al crear: '. $xml_carpeta_cfdi );
	}
	if( !file_exists( $xml_carpeta_pdf ) ){
		if( !mkdir( $xml_carpeta_pdf, 0777, true ) ) die('<br> Error al crear: '. $xml_carpeta_pdf );
	}
	$xml_archivo = $xml_carpeta."".$empid."_".$cfdiserid."_".$cfdiid.".xml";
	$xml_archivo_cfdi = $xml_carpeta_cfdi."".$empid."_".$cfdiserid."_".$cfdiid.".xml";
	if( file_exists( $xml_archivo ) ) unlink( $xml_archivo ); // Si el XML existe, eliminar
	if( file_exists( $xml_archivo_cfdi ) ){
		// Leer el XML y actualizar la tabla cfdi:
		$archivo_xml = trim(file_get_contents( $xml_archivo_cfdi ));
		// echo "<br><textarea cols='80' rows='10'> $archivo_xml </textarea>"; // exit;
		// Convertir a Matriz:
		$p = xml_parser_create();
		xml_parse_into_struct($p, $archivo_xml, $vals, $index);
		xml_parser_free($p);
		// echo "<br><div style='width:600px;height:300px;overflow:auto;'> "; echo "<br><pre>"; print_r( $vals ); echo "</pre><br>"; echo "</div>"; exit;
		error_reporting( 1 );
		$cfdiuuid = "";
		$cfditimbver = "";
		$cfditimbfecha = "";
		$cfdicerfec = "0001-01-01";
		$cfdicerhor = "00:00:00";
		$factimbnocer = "";
		$factimbsello = "";
		$cfdisatsta = "Vigente";
		$facsello = "";
		$facsatrfc = "";
		$cfdixml = $xml_archivo_cfdi;
		foreach( $vals as $valor ){
			//echo "<br><pre>"; print_r( $valor ); echo "</pre><br>"; exit;
			$tag = 	trim( $valor[ "tag" ] );
			// echo "<br>TAG: $tag";
			if( $tag == 'TFD:TIMBREFISCALDIGITAL' ){
				// echo "<br><pre>"; print_r( $valor ); echo "</pre><br>"; // exit;
				$cfdiuuid 		= trim( $valor[ "attributes" ][ "UUID" ] );
				$cfditimbfecha 	= trim( $valor[ "attributes" ][ "FECHATIMBRADO" ] );
				$cfditimbver		= trim( $valor[ "attributes" ][ "VERSION" ] );
				$cfditimbnocer 	= trim( $valor[ "attributes" ][ "NOCERTIFICADOSAT" ] );
				$cfdisello 		= trim( $valor[ "attributes" ][ "SELLOCFD" ] );
				$cfditimbsello 	= trim( $valor[ "attributes" ][ "SELLOSAT" ] );
				$cfdisatrfc 		= trim( $valor[ "attributes" ][ "RFCPROVCERTIF" ] );
			}
		}
		// Actualizo el CFDI:
		if( strlen($cfditimbfecha) == 19 ){
			$m_factimbfecha = explode( "T",$cfditimbfecha );
			// echo "<br><pre>"; print_r( $m_factimbfecha ); echo "</pre><br>"; // exit;
			$cfdicerfec = $m_factimbfecha[ 0 ];
			$cfdicerhor = $m_factimbfecha[ 1 ];
		}
		$sql = "
			UPDATE cfdi
			SET
				cfdiuuid='".$cfdiuuid."',
				cfdicerfec='".$cfdicerfec."',
				cfdicerhor='".$cfdicerhor."',
				cfdixml='".$cfdixml."',
				cfdisatsta='".$cfdisatsta."'
			WHERE empid=".$empid." AND cfdiserid=".$cfdiserid." AND cfdiid=".$cfdiid."
			;
		";
		echo "<p> $sql </p>"; // exit;
		$conexion1->ejecutar( $sql );
		die('<br> El CFDI ya existe 2: '. $xml_archivo_cfdi );
	}

	// echo "<br> Se crea el archivo en la ruta: $xml_archivo";
	$cfdi_xml1->xml_archivo = $xml_archivo;
	$cfdi_xml1->crear_xml();

	// Mostrar el XML en textarea y link:
	$texto = file_get_contents( $xml_archivo );
	echo "<p> <textarea style='width:98%;height:450px;'>".$texto."</textarea></p>";
	echo "
		<p align='center'>
			<a href='".$xml_archivo."' target='_blank' class='enlace1' style='color:blue;'> XML enviado </a>
		</p>
	";
	 //die( "<hr />" );
	// $xml_contenido = $cfdi_xml1->xml_contenido;

	// Certificar:
	// PAC:
	$pacnomcor = "PRUEBAS";
	$pacurl = "https://cfdi33-pruebas.buzoncfdi.mx:1443/Timbrado.asmx?wsdl";
	// $pacusu = "mvpNUXmQfK8=";
	// echo "<p> PAC Nombre: $pacnomcor </p>";
	// echo "<p> PAC URL: $pacurl </p>";
	// echo "<p> PAC Usuario: $pacusu </p>";

	// Webservice:
	// $texto = file_get_contents( $xml_archivo );
	// echo "<p> <textarea style='width:98%;height:150px;'>".$texto."</textarea></p>";
	$base64Comprobante = base64_encode($texto);
	// echo "<p> <textarea style='width:98%;height:150px;'>".$base64Comprobante."</textarea></p>";

	$response = '';
	try {
		$params = array();
		$params['xmlComprobanteBase64'] = $base64Comprobante;
		$params['usuarioIntegrador'] = 'mvpNUXmQfK8=';
		$params['idComprobante'] = rand(5, 999999);
		$context = stream_context_create(array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			),
			'http' => array(
				'user_agent' => 'PHPSoapClient'
			)
		));
		$options = array();
		$options['stream_context'] = $context;
		$options['cache_wsdl'] = WSDL_CACHE_MEMORY;
		$options['trace'] = true;
		//libxml_disable_entity_loader(false);
		//echo "<br><br>uno";
		//var_dump($params);
		//echo "<br><br>";
		$client = new \SoapClient($pacurl, $options);
		$response = $client->__soapCall('TimbraCFDI', array('parameters' => $params));

		//var_dump( $response);
		//echo "<br><br>dos";
		//var_dump($response->TimbraCFDIResult->anyType[4]);
	}catch (SoapFault $fault) {
		// var_dump($response);exit;
		// echo "<br> <pre>"; print_r( $response ); echo "</pre>"; exit;
		// echo "<br> <pre>"; print_r( $fault ); echo "</pre>"; exit;
		echo "<p>Error: " . $fault->faultcode . "-" . $fault->faultstring . " </p>";exit;
		exit;
	}
	if ($response->TimbraCFDIResult->anyType[4] == NULL) {
		// var_dump($response);exit;
		// echo "<br> TimbraCFDIResult: <pre>"; print_r( $response ); echo "</pre>"; // exit;
		// echo "<script>fn_sistemax_mensaje(0, 'Error: " . $response->TimbraCFDIResult->anyType[2] . "',2);</script>";exit;
		echo "
			<p align='center' class='etiqueta2c'> ERROR:  </p>
			<p align='center' class='campo_requerido'>".trim( $response->TimbraCFDIResult->anyType[2] )."</p>
		";
		echo "
			<br>
			<p align='center'>
				<a href='".$xml_archivo."' target='_blank' class='enlace1' style='color:blue;'> XML enviado </a>
			</p>
		";
		echo "<br><div align='left'> TimbraCFDIResult: <pre>"; print_r( $response ); echo "</pre></div>"; // exit;
	}
	// echo "<br> <pre>"; print_r( $response ); echo "</pre>"; // exit;
	// Obtenemos resultado del response
	// echo "resultado"; //echo $response;
	$tipoExcepcion = $response->TimbraCFDIResult->anyType[0];
	$numeroExcepcion = $response->TimbraCFDIResult->anyType[1];
	$descripcionResultado = $response->TimbraCFDIResult->anyType[2];
	$xmlTimbrado = $response->TimbraCFDIResult->anyType[3];
	$codigoQr = $response->TimbraCFDIResult->anyType[4];
	$cadenaOriginal = $response->TimbraCFDIResult->anyType[5];
	$errorInterno = $response->TimbraCFDIResult->anyType[6];
	$mensajeInterno = $response->TimbraCFDIResult->anyType[7];
	$m_uuid = $response->TimbraCFDIResult->anyType[8];
	$m_uuid2 = json_decode( $m_uuid );
	// echo "<br> <pre>"; print_r( $m_uuid ); echo "</pre>"; // exit;
	// echo "<br> <pre>"; print_r( $m_uuid2 ); echo "</pre>"; // exit;
	if($xmlTimbrado != ''){
		// El comprobante fue timbrado correctamente
		if( !file_put_contents( $xml_archivo_cfdi, $xmlTimbrado) ){
			echo "<p> Error al crear el archivo: ".$xml_archivo_cfdi." </p>";
		}
		echo "
			<p> CFDI creado correctamente: ".$xml_archivo_cfdi." </p>
			<p>
				<a href='".$xml_archivo_cfdi."' target='_blank'> Ver XML timbrado </a>
			</p>
		";
	}else{
		 echo "else";

		echo "<p> Error: [".$tipoExcepcion."  ".$numeroExcepcion." ".$descripcionResultado."  ei=".$errorInterno." mi=".$mensajeInterno."] </p>";
	}
	// FIN de certificar

	// Leer el XML y actualizar la tabla cfdi:
	$archivo_xml = trim(file_get_contents( $xml_archivo_cfdi ));
	// echo "<br><textarea cols='80' rows='10'> $archivo_xml </textarea>"; // exit;
	// Convertir a Matriz:
	$p = xml_parser_create();
	xml_parse_into_struct($p, $archivo_xml, $vals, $index);
	xml_parser_free($p);
	// echo "<br><div style='width:600px;height:300px;overflow:auto;'> "; echo "<br><pre>"; print_r( $vals ); echo "</pre><br>"; echo "</div>"; exit;
	error_reporting( 1 );
	$cfdiuuid = "";
	$cfditimbver = "";
	$cfditimbfecha = "";
	$cfdicerfec = "0001-01-01";
	$cfdicerhor = "00:00:00";
	$factimbnocer = "";
	$factimbsello = "";
	$cfdisatsta = "Vigente";
	$facsello = "";
	$facsatrfc = "";
	$cfdixml = $xml_archivo_cfdi;
	foreach( $vals as $valor ){
		//echo "<br><pre>"; print_r( $valor ); echo "</pre><br>"; exit;
		$tag = 	trim( $valor[ "tag" ] );
		// echo "<br>TAG: $tag";
		if( $tag == 'TFD:TIMBREFISCALDIGITAL' ){
			// echo "<br><pre>"; print_r( $valor ); echo "</pre><br>"; // exit;
			$cfdiuuid 		= trim( $valor[ "attributes" ][ "UUID" ] );
			$cfditimbfecha 	= trim( $valor[ "attributes" ][ "FECHATIMBRADO" ] );
			$cfditimbver		= trim( $valor[ "attributes" ][ "VERSION" ] );
			$cfditimbnocer 	= trim( $valor[ "attributes" ][ "NOCERTIFICADOSAT" ] );
			$cfdisello 		= trim( $valor[ "attributes" ][ "SELLOCFD" ] );
			$cfditimbsello 	= trim( $valor[ "attributes" ][ "SELLOSAT" ] );
			$cfdisatrfc 		= trim( $valor[ "attributes" ][ "RFCPROVCERTIF" ] );
		}
	}
	// Actualizo el CFDI:
	if( strlen($cfditimbfecha) == 19 ){
		$m_factimbfecha = explode( "T",$cfditimbfecha );
		// echo "<br><pre>"; print_r( $m_factimbfecha ); echo "</pre><br>"; // exit;
		$cfdicerfec = $m_factimbfecha[ 0 ];
		$cfdicerhor = $m_factimbfecha[ 1 ];
	}
	$sql = "
		UPDATE cfdi
		SET
			cfdiuuid='".$cfdiuuid."',
			cfdicerfec='".$cfdicerfec."',
			cfdicerhor='".$cfdicerhor."',
			cfdixml='".$cfdixml."',
			cfdisatsta='".$cfdisatsta."'
		WHERE empid=".$empid." AND cfdiserid=".$cfdiserid." AND cfdiid=".$cfdiid."
		;
	";
	// echo "<p> $sql </p>"; // exit;
	$conexion1->ejecutar( $sql );
}
?>
