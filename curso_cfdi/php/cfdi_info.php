<?php
class cfdi_info{
	public $empid = 0; //EMPRESA
	public $cfdiserid = 0; // /SERIE
	public $cfdiid = 0;	//FOLIOS

	public $m_info = [];
	public $m_encabezado = [];
	public $m_comprobante = [];
	public $m_emisor = [];
	public $m_receptor = [];
	public $m_items = [];
	public $m_impuestos = [
		"TotalImpuestosRetenidos" => 0,
		"TotalImpuestosTrasladados" => 0,
		"m_trasladados" => [],
		"m_retenidos" => [],
	];
	public $m_timbre = [];
	public $m_relacionados = [];
	public function obtener_info(){
		include_once( "db_sqlite.php" );
		$conexion1 = new db();
		$conexion1->conectar();

		//echo "-----------1)---------------";
		//echo "antes".$this->empid."".$this->cfdiserid;
		// Emisor:
		$sql = "SELECT * FROM `ma_empresas` WHERE `empid`=".$this->empid.";";
		//PDF echo "MANE: 1)<b>Emisor</b><br>".$sql."<br><br>";
		$m_datos = $conexion1->getM( $sql );
		// echo "<br>(".count($m_datos).") $sql<pre>"; print_r( $m_datos ); echo "</pre>"; // exit;
		foreach( $m_datos as $reg ){
				$empreg = trim( $reg[ "empreg" ] );
				$regimen = "";
				//$m_regimenes = json_decode( file_get_contents( "../anexo20/c_RegimenFiscal.json" ),1 );
				//echo "<br> <pre>"; print_r($m_regimenes); echo "</pre>"; // exit;

				$sql_reg = "SELECT * FROM `c_regimenfiscal` ";
				//PDF echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1-1.<b>Emisor</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sql."<br><br>";
				$m_regimenes = $conexion1->getM( $sql_reg );

				$regimen_clave_emisor = "";
				foreach( $m_regimenes as $fila ){
					$regimen_clave = trim( $fila["regimen_clave"] );
					$regimen_concepto = trim( $fila["regimen_concepto"] );
					if( $empreg == $regimen_clave ) $regimen = $regimen_concepto;
				}
			if( empty( $regimen ) ) die( "R&eacute;gimen del Emisor NO encontrado ($empreg)." );
			$this->m_emisor = [
				"empid" => intval( $reg[ "empid" ] ),
				"empnom" => trim( $reg[ "empnom" ] ),
				"emprfc" => trim( $reg[ "emprfc" ] ),
				"empdom" => trim( $reg[ "empdom" ] ),
				"empdom2" => trim( $reg[ "empdom2" ] ),
				"emplogo" => trim( $reg[ "emplogo" ] ),
				"empcp" => trim( $reg[ "empcp" ] ),
				"empreg" => trim( $reg[ "empreg" ] ),
				"regimen" => $regimen,
			];
		}
		// CFDI encabezado:

		//PDF echo "----------------------------------------------------------------------------------------------------------------------AAA-----------------------------------------------------------------------------------------------------------------------<BR>";
		$sql2 = "SELECT * FROM cfdi c, c_metodopago m, c_formapago f, c_uso u
				WHERE c.empid=".$this->empid." AND  c.cfdimetpag = m.metodopago_clave AND c.cfdiforpag = f.formapago_clave AND c.cfdiuso = u.uso_clave
				AND c.cfdiserid=".$this->cfdiserid." AND c.cfdiid=".$this->cfdiid.";";
		//PDF echo "<br>MANE: 2)<b>Encabezado</b><br>".$sql2;
		$m_datos = $conexion1->getM( $sql2 );
		//echo "<br>(".count($m_datos).") $sql<pre>"; print_r( $m_datos ); echo "</pre>"; exit;
		foreach( $m_datos as $reg ){
			$cfdicliid = intval( $reg[ "cfdicliid" ] );
			//echo "<br><b>dos</b><br>".$cfdicliid."<br>";
			$cfdiuso = trim( $reg[ "cfdiuso" ] );

			$uso_descripcion = "";
			//$m_usos = json_decode( file_get_contents( "../anexo20/c_UsoCFDI.json" ),1 );
			// echo "<br> <pre>"; print_r($m_usos); echo "</pre>"; exit;
			$sql_uso = "SELECT * FROM `c_UsoCFDI` ";
			//PDF echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-1<b>Emisor</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sql."<br><br>";
			$m_usos = $conexion1->getM( $sql_uso );

			foreach( $m_usos as $fila ){
				$uso_clave = trim( $fila["uso_clave"] );
				$uso_concepto = trim( $fila["uso_concepto"] );
				if( $cfdiuso == $uso_clave ) $uso_descripcion = $uso_concepto;
			}
			if( empty( $uso_descripcion ) ) die( "Uso NO encontrado ($cfdiuso)." );

			// Series y CSD:
			$NoCertificado = "";
			$Certificado = "";
			$Serie = "";
			$pacnomcor = "";
			$pacurl = "";
			$pacusu = "";
			// $sql2 = "SELECT * FROM cfdi_csd WHERE empid=".$this->empid." AND cfdicliid=$cfdicliid;";
			$sql3 = "SELECT * FROM `cfdi_series` WHERE `empid`=".$this->empid." AND `cfdiserid`=".$this->cfdiserid."";
			//PDF echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-1-1<b>SERIES</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sql3."<br><br>";
			$m_datos2 = $conexion1->getM($sql3);
			// echo "<br>(".count($m_datos2).") $sql2 <pre>"; print_r( $m_datos2 ); echo "</pre>"; exit;
			foreach( $m_datos2 as $reg2 ){
				$cfdisertpo = trim( $reg2[ "cfdisertpo" ] );
				$Serie = trim( $reg2[ "cfdiserdes" ] );
				$cfdiserini = trim( $reg2[ "cfdiserini" ] );
				$cfdiserfin = trim( $reg2[ "cfdiserfin" ] );
				$csdid = trim( $reg2[ "csdid" ] );
				$pacid = trim( $reg2[ "pacid" ] );
				// CSD:
				$sql4 = "SELECT `csdnocer`,`csdcertxt` FROM `cfdi_csd` WHERE `empid`=".$this->empid." AND `csdid`=".$csdid.";";
				//PDF echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-1-1-1<b>CSD</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sql4."<br><br>";
				$m_datos3 = $conexion1->getM($sql4);
				// echo "<br>(".count($m_datos3).") $sql3 <pre>"; print_r( $m_datos3 ); echo "</pre>"; exit;
				foreach( $m_datos3 as $reg3 ){

					$NoCertificado = trim( $reg3[ "csdnocer" ] );
					$Certificado = trim( $reg3[ "csdcertxt" ] );
				}
				// PAC:
				$sql5 = "SELECT `pacnomcor`,`pacurl`,`pacusu` FROM `cfdi_pac` WHERE `empid`=".$this->empid." AND `pacid`=".$pacid.";";
				//PDF echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-1-1-2<b>PAC</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$sql5."<br><br>";
				$m_datos3 = $conexion1->getM($sql5);
				// echo "<br>(".count($m_datos3).") $sql3 <pre>"; print_r( $m_datos3 ); echo "</pre>"; exit;
				foreach( $m_datos3 as $reg3 ){
					$pacnomcor = trim( $reg3[ "pacnomcor" ] );
					$pacurl = trim( $reg3[ "pacurl" ] );
					$pacusu = trim( $reg3[ "pacusu" ] );
				}
			}
			//$des_metpag = $reg[ "cfdimetpag" ] + $reg[ "metodopago_descripcion" ];
			//cfdilugexp CP
			$this->m_comprobante = [
				// "empid" => intval( $reg[ "empid" ] ),
				"cfdiserid" => intval( $reg[ "cfdiserid" ] ),
				"cfdiid" => intval( $reg[ "cfdiid" ] ),
				"cfdicliid" => intval( $reg[ "cfdicliid" ] ),
				"cfdista" => trim( $reg[ "cfdista" ] ),
				"cfdifec" => trim( $reg[ "cfdifec" ] ),
				"cfdihor" => trim( $reg[ "cfdihor" ] ),
				"cfdimon" => trim( $reg[ "cfdimon" ] ),
				"cfditc" => number_format( trim( $reg[ "cfditc" ] ),4,".","" ),
				"cfditpocom" => trim( $reg[ "cfditpocom" ] ),
				"cfdiconpag" => trim( $reg[ "cfdiconpag" ] ),
				"cfdinocer" => trim( $reg[ "cfdinocer" ] ),
				"cfdimetpag" => trim($reg[ "cfdimetpag" ]),
				"cfdimetpagd" => trim($reg[ "metodopago_descripcion" ]),
				"cfdiforpag" => trim( $reg[ "cfdiforpag" ] ),
				"cfdiforpagd" => trim( $reg[ "formapago_descripcion" ] ),
				"cfdiuso" => trim( $reg[ "cfdiuso" ] ),
				"cfdiusod" => trim( $reg[ "uso_descripcion" ] ),
				"uso_descripcion" => $uso_descripcion,
				"cfdilugexp" => trim( $reg[ "cfdilugexp" ] ),
				"cfdisub" => number_format( trim( $reg[ "cfdisub" ] ),2,".","" ),
				"cfdiiva" => number_format( trim( $reg[ "cfdiiva" ] ),2,".","" ),
				"cfdiieps" => number_format( trim( $reg[ "cfdiieps" ] ),2,".","" ),
				"cfdiretiva" => number_format( trim( $reg[ "cfdiretiva" ] ),2,".","" ),
				"cfdides" => number_format( trim( $reg[ "cfdides" ] ),2,".","" ),
				"cfditotret" => number_format( trim( $reg[ "cfditotret" ] ),2,".","" ),
				"cfditottra" => number_format( trim( $reg[ "cfditottra" ] ),2,".","" ),
				"cfditot" => number_format( trim( $reg[ "cfditot" ] ),2,".","" ),
				"cfdiuuid" => trim( $reg[ "cfdiuuid" ] ),
				"cfdicerfec" => trim( $reg[ "cfdicerfec" ] ),
				"cfdicerhor" => trim( $reg[ "cfdicerhor" ] ),
				"cfdisatsta" => trim( $reg[ "cfdisatsta" ] ),
				"cfdixml" => trim( $reg[ "cfdixml" ] ),
				"cfdipdf" => trim( $reg[ "cfdipdf" ] ),
				"cfdiobs" => trim( $reg[ "cfdiobs" ] ),
				"paleta" => trim($reg["paleta"]),
				"subasta" => trim($reg["subasta"]),
				"NoCertificado" => $NoCertificado,
				"Certificado" => $Certificado,
				"Serie" => $Serie,
				"pacnomcor" => $pacnomcor,
				"pacurl" => $pacurl,
				"pacusu" => $pacusu,
			];
		}
		// Receptor:
		//PDF echo "----------------------------------------------------------------------------------------------------------------------BBB-----------------------------------------------------------------------------------------------------------------------<BR>";
		$sql6 = "SELECT * FROM `cfdi_clientes` WHERE `empid`=".$this->empid." AND `cfdicliid`=".$cfdicliid." ";
		//echo "<br>".$sql6;
		//PDF echo "MANE: 3)<b>Receptor</b><br>".$sql6."<br><br>";

		$m_datos2 = $conexion1->getM($sql6);
		// echo "<br>(".count($m_datos2).") $sql2 <pre>"; print_r( $m_datos2 ); echo "</pre>"; exit;
		foreach( $m_datos2 as $reg2 ){
			$this->m_receptor = [
				"cfdicliid" => intval( $reg2[ "cfdicliid" ] ),
				"cfdiclinom" => trim( $reg2[ "cfdiclinom" ] ),
				"cfdiclirfc" => trim( $reg2[ "cfdiclirfc" ] ),
				"cfdiclidir" => trim( $reg2[ "cfdiclidir" ] ),
				"cfdiclitel" => trim( $reg2[ "cfdiclitel" ] ),
				"cfdiclicor" => trim( $reg2[ "cfdiclicor" ] ),
				"cfdiclicontacto" => trim( $reg2[ "cfdiclicontacto" ] ),
			];
		}
		// // CFDI detalle / Conceptos:
		/*
		$sql7 = "
			SELECT * FROM cfdi_detalle d INNER JOIN cfdi_productos p
			ON p.empid=d.empid AND d.cfdiproid=p.cfdiproid
			WHERE d.empid=".$this->empid." AND cfdiserid=".$this->cfdiserid." AND cfdiid=".$this->cfdiid."
			ORDER BY cfdidetid;
		";
		*/
		$sql7 = "SELECT * FROM cfdi_detalle d INNER JOIN cfdi_productos p
		ON p.empid=d.empid AND d.cfdiproid=p.cfdiproid
		JOIN  c_claveprodserv  c ON p.cfdiprosat = c.ProdServ_clave
		JOIN c_unidad u ON p.cfdiprosatuni = u.unidad_clave
		WHERE d.empid=".$this->empid." AND cfdiserid=".$this->cfdiserid." AND cfdiid=".$this->cfdiid."
		ORDER BY cfdidetid;";

		//PDF echo "----------------------------------------------------------------------------------------------------------------------CCC-----------------------------------------------------------------------------------------------------------------------<BR>";
		//echo "Consulta:<br>".$sql7."<br>";
		//PDF
		//echo "MANE: 4)<b>Conceptos</b><br>".$sql7."<br><br>";
		$m_datos = $conexion1->getM($sql7);
		 //echo "<br>(".count($m_datos).") $sql7<pre>"; print_r( $m_datos ); echo "</pre>"; exit;
		foreach( $m_datos as $reg ){
			//echo "<br>".$reg[ "cfdidetid" ];
			$cfdiproivacla = trim( $reg[ "cfdiproivacla" ] );
			$cfdiproivatas = trim( $reg[ "cfdiproivatas" ] );
			$cfdiproivafac = trim( $reg[ "cfdiproivafac" ] );
			$cfdidetiva = trim( $reg[ "cfdidetiva" ] );
			$this->m_items[] = [
				"cfdidetid" => intval( $reg[ "cfdidetid" ] ),
				"cfdiproid" => intval( $reg[ "cfdiproid" ] ),
				"cfdidetcan" => number_format( floatval( $reg[ "cfdidetcan" ] ) ,4,".","" ),
				"cfdidetval" => number_format( floatval( $reg[ "cfdidetval" ] ) ,4,".","" ),
				"martillo" => number_format( floatval( $reg[ "martillo" ] ) ,4,".","" ),
				"cfdidetcon" => trim( $reg[ "cfdidetcon" ] ),

				"cfdidetdes" => number_format( floatval( $reg[ "cfdidetdes" ] ) ,2,".","" ),
				"cfdidetsub" => number_format( floatval( $reg[ "cfdidetsub" ] ) ,2,".","" ),
				"cfdidetiva" => number_format( floatval( $reg[ "cfdidetiva" ] ) ,2,".","" ),
				"cfdidettot" => number_format( floatval( $reg[ "cfdidettot" ] ) ,2,".","" ),

				"cfdiprosku" => trim( $reg[ "cfdiprosku" ] ),
				"cfdipronom" => trim( $reg[ "cfdipronom" ] ),
				"cfdiprosat" => trim( $reg[ "cfdiprosat" ] ),
				"ProdServ_descripcion" => trim( $reg[ "ProdServ_descripcion" ] ),
				"lote" => trim( $reg[ "lote" ] ),
				"unidad_nombre" => trim( $reg[ "unidad_nombre" ] ),
				"cfdiprosatuni" => trim( $reg[ "cfdiprosatuni" ] ),
				"cfdiprouni" => trim( $reg[ "cfdiprouni" ] ),
				"cfdipropre1" => number_format( floatval( $reg[ "cfdipropre1" ] ) ,4,".","" ),
				"cfdiproivacla" => trim( $reg[ "cfdiproivacla" ] ),
				"cfdiproivafac" => trim( $reg[ "cfdiproivafac" ] ),
				"cfdiproivatas" => number_format( floatval( $reg[ "cfdiproivatas" ]/100 ) ,6,".","" ),
			];
			//$var = $this->m_items["cfdidetid"];
			//echo "item".$var;
			$this->m_impuestos[ "TotalImpuestosTrasladados" ] += floatval( $reg[ "cfdidetiva" ] );
			// Traslados:
			if( isset( $this->m_impuestos[ "m_trasladados" ][$cfdiproivacla."_".$cfdiproivatas] ) ){
				$this->m_impuestos[ "m_trasladados" ][$cfdiproivacla."_".$cfdiproivatas]["Importe"] += $cfdidetiva;
			}else{
				// Crear el Registro:
				$this->m_impuestos[ "m_trasladados" ][$cfdiproivacla."_".$cfdiproivatas] = [
					"Impuesto" => $cfdiproivacla,
					"TipoFactor" => $cfdiproivafac,
					"TasaOCuota" => number_format( $cfdiproivatas/100,6,".","" ),
					"Importe" => $cfdidetiva
				];
			}
		}

		// CFDI Relacionados:
		$sql8 = "
			SELECT cfdirelcla,cfdirelcon
			FROM cfdi_relacion
			WHERE empid=".$this->empid." AND cfdiserid=".$this->cfdiserid." AND cfdiid=".$this->cfdiid."
			GROUP BY cfdirelcla,cfdirelcon
			ORDER BY cfdirelcla,cfdirelcon;
		";
		echo "";


		//PDF echo "----------------------------------------------------------------------------------------------------------------------DDD-----------------------------------------------------------------------------------------------------------------------<BR>";
		//PDF echo "MANE: 5)<b>CFDI Relacionados</b><br>".$sql8."<br><br>";
		$m_datos = $conexion1->getM( $sql8 );
		//echo "<br>(".count($m_datos).") $sql <pre>"; print_r( $m_datos ); echo "</pre>"; // exit;
		foreach( $m_datos as $reg ){
			$cfdirelcla = trim( $reg["cfdirelcla"] );
			$cfdirelcon = trim( $reg["cfdirelcon"] );
			$this->m_relacionados[ $cfdirelcla ] = [
				"cfdirelcla" => $cfdirelcla,
				"cfdirelcon" => $cfdirelcon,
				"m_items" => [],
			];
			$sql9 = "SELECT `cfdireluuid` FROM `cfdi_relacion` WHERE `empid`=".$this->empid." AND `cfdiserid`=".$this->cfdiserid." AND `cfdiid`=".$this->cfdiid." AND `cfdirelcla`='".$cfdirelcla."' ORDER BY cfdirelid;";
			echo "<br><br>SQL9<br>".$sql9;
			$m_datos2 = $conexion1->getM( $sql9 );
			// echo "<br>(".count($m_datos2).") $sql2 <pre>"; print_r( $m_datos2 ); echo "</pre>";  exit;
			foreach( $m_datos2 as $reg2 ){
				$cfdireluuid = trim( $reg2["cfdireluuid"] );
				$this->m_relacionados[ $cfdirelcla ]["m_items"][] = $cfdireluuid;
			}
		}

		//echo "<br>?????????????????????????????????????????????????<br>";
		// Todo:
		$this->m_info[ "m_comprobante" ] = $this->m_comprobante;
		$this->m_info[ "m_emisor" ] = $this->m_emisor;
		$this->m_info[ "m_receptor" ] = $this->m_receptor;
		$this->m_info[ "m_items" ] = $this->m_items;
		//$vari= $this->m_info[ "m_items" ];
		//var_dump($vari);
		$this->m_info[ "m_relacionados" ] = $this->m_relacionados;
		$this->m_info[ "m_impuestos" ] = $this->m_impuestos;
		//var_dump($this->m_comprobante);
		//echo "<br>?????????????????????????????????????????????????<br>";

	}
}
?>
