<?php
class cfdi_xml{
	public $empid = 0; // ID de empresa
	public $cfdiserid = 0; // ID Serie
	public $cfdiid = 0; // ID o Folio del COmrpobante

	public $m_info = [];
	public $xml_archivo = "";

	public function crear_xml(){

		$xmlWriter = new XMLWriter();
		$xmlWriter->openMemory();
		$xmlWriter->startDocument('1.0', 'UTF-8');

		// Nodo principal: Comprobante
		//--MANE--startElemento
		$xmlWriter->startElement('cfdi:Comprobante');

		// Encabezados del CFDI:
		$xmlWriter->startAttribute('xmlns:xsi');
			$xmlWriter->text( "http://www.w3.org/2001/XMLSchema-instance" );
		$xmlWriter->endAttribute();

		$xmlWriter->startAttribute('xmlns:cfdi');
			$xmlWriter->text( "http://www.sat.gob.mx/cfd/3" );
		$xmlWriter->endAttribute();

		$xmlWriter->startAttribute('xsi:schemaLocation');
			$xmlWriter->text( "http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" );
		$xmlWriter->endAttribute();

		$xmlWriter->startAttribute('LugarExpedicion');
			$xmlWriter->text( $this->m_info["m_comprobante"]["cfdilugexp"] );
		$xmlWriter->endAttribute();

		if( $this->m_info["m_comprobante"]["cfditpocom"] == "T" || $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
			// Si es Traslado / Pago se omite el M de Pago:
		}else{
			$xmlWriter->startAttribute('MetodoPago');
				$xmlWriter->text( $this->m_info["m_comprobante"]["cfdimetpag"] );
			$xmlWriter->endAttribute();
		}

		$xmlWriter->startAttribute('TipoDeComprobante');
			$xmlWriter->text( $this->m_info["m_comprobante"]["cfditpocom"] );
		$xmlWriter->endAttribute();

		if( $this->m_info["m_comprobante"]["cfdides"] > 0 ){
			$xmlWriter->startAttribute('Descuento');
				$xmlWriter->text( number_format( $this->m_info["m_comprobante"]["cfdides"],2,".","" ) );
			$xmlWriter->endAttribute();
		}

		if( $this->m_info["m_comprobante"]["cfdisub"] > 0 ){
			$xmlWriter->startAttribute('SubTotal');
				$xmlWriter->text( number_format( $this->m_info["m_comprobante"]["cfdisub"],2,".","" ) );
			$xmlWriter->endAttribute();
		}

		$xmlWriter->startAttribute('Total');
			$xmlWriter->text( number_format( $this->m_info["m_comprobante"]["cfditot"],2,".","" ) );
		$xmlWriter->endAttribute();

		$xmlWriter->startAttribute('Moneda');
			$xmlWriter->text( $this->m_info["m_comprobante"]["cfdimon"] );
		$xmlWriter->endAttribute();

		if( $this->m_info["m_comprobante"]["cfditc"] > 1 ){
			$xmlWriter->startAttribute('TipoCambio');
				$xmlWriter->text( $this->m_info["m_comprobante"]["cfditc"] );
			$xmlWriter->endAttribute();
		}

		if( $this->m_info["m_comprobante"]["Certificado"] != "" ){
			$xmlWriter->startAttribute('Certificado');
				$xmlWriter->text( $this->m_info["m_comprobante"]["Certificado"] );
			$xmlWriter->endAttribute();
		}else{
			$xmlWriter->startAttribute('Certificado');
				$xmlWriter->text( $this->m_info["m_comprobante"]["Certificado"] );
			$xmlWriter->endAttribute();
		}

		if( $this->m_info["m_comprobante"]["cfdiconpag"] != "" ){
			$xmlWriter->startAttribute('CondicionesDePago');
				$xmlWriter->text( $this->m_info["m_comprobante"]["cfdiconpag"] );
			$xmlWriter->endAttribute();
		}

		$xmlWriter->startAttribute('NoCertificado');
			$xmlWriter->text( $this->m_info["m_comprobante"]["NoCertificado"] );
		$xmlWriter->endAttribute();

		if( $this->m_info["m_comprobante"]["cfditpocom"] == "T" || $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
			// Si es Traslado / Pago se omite la forma Pago
		}else{
			$xmlWriter->startAttribute('FormaPago');
				$xmlWriter->text( $this->m_info["m_comprobante"]["cfdiforpag"] );
			$xmlWriter->endAttribute();
		}

		$xmlWriter->startAttribute('Fecha');
			$xmlWriter->text( $this->m_info["m_comprobante"]["cfdifec"]."T".$this->m_info["m_comprobante"]["cfdihor"] );
		$xmlWriter->endAttribute();
		$xmlWriter->startAttribute('Serie');
			$xmlWriter->text( $this->m_info["m_comprobante"]["Serie"] );
		$xmlWriter->endAttribute();
		$xmlWriter->startAttribute('Folio');
			$xmlWriter->text( $this->m_info["m_comprobante"]["cfdiid"] );
		$xmlWriter->endAttribute();
		$xmlWriter->startAttribute('Version');
			$xmlWriter->text( "3.3" );
		$xmlWriter->endAttribute();

		// CFDI Relacionados:
		// echo "<br> <pre>"; print_r( $this->m_info["m_relacionados"] ); echo "</pre>"; exit;
		if( count( $this->m_info["m_relacionados"] )>0 ){
			foreach( $this->m_info[ "m_relacionados" ] as $registro ){
				$cfdirelcla = trim( $registro[ "cfdirelcla" ] );
				$cfdirelcon = trim( $registro[ "cfdirelcon" ] );
				$m_items = $registro[ "m_items" ];

				$xmlWriter->text( "\n\t" );
				$xmlWriter->startElement('cfdi:CfdiRelacionados');
					// Atributos:
					$xmlWriter->startAttribute('TipoRelacion');
						$xmlWriter->text( $cfdirelcla );
					$xmlWriter->endAttribute();
					// UUID:
					foreach( $m_items as $uuid ){
						$xmlWriter->text( "\n\t\t" );
						$xmlWriter->startElement('cfdi:CfdiRelacionado');
							// Atributos:
							$xmlWriter->startAttribute('UUID');
								$xmlWriter->text( $uuid );
							$xmlWriter->endAttribute();
						$xmlWriter->endElement();
					}
				$xmlWriter->text( "\n\t" );
				//--MANE--endElement CERRAR ELEMENTO
				$xmlWriter->endElement();
			}
		}

		// Emisor:
		$xmlWriter->text( "\n\t" );
		$xmlWriter->startElement('cfdi:Emisor');
			// Atributos:
			$xmlWriter->startAttribute('Rfc');
				$xmlWriter->text( $this->m_info["m_emisor"]["emprfc"] );
			$xmlWriter->endAttribute();
			$xmlWriter->startAttribute('Nombre');
				$xmlWriter->text( $this->m_info["m_emisor"]["empnom"] );
			$xmlWriter->endAttribute();
			$xmlWriter->startAttribute('RegimenFiscal');
				$xmlWriter->text( $this->m_info["m_emisor"]["empreg"] );
			$xmlWriter->endAttribute();
		$xmlWriter->endElement();

		// Receptor:
		$xmlWriter->text( "\n\t" );
		$xmlWriter->startElement('cfdi:Receptor');
			// Atributos:
			$xmlWriter->startAttribute('Rfc');
				$xmlWriter->text( $this->m_info["m_receptor"]["cfdiclirfc"] );
			$xmlWriter->endAttribute();
			if( $this->m_info["m_receptor"]["cfdiclinom"] != "" ){
			$xmlWriter->startAttribute('Nombre');
				$xmlWriter->text( $this->m_info["m_receptor"]["cfdiclinom"] );
			$xmlWriter->endAttribute();
			}
			$xmlWriter->startAttribute('UsoCFDI');
				$xmlWriter->text( $this->m_info["m_comprobante"]["cfdiuso"] );
			$xmlWriter->endAttribute();
		$xmlWriter->endElement();

		// Conceptos:
		$xmlWriter->text( "\n\t" );
		$xmlWriter->startElement('cfdi:Conceptos');
		// TMP: $this->m_info[ "m_items" ] = [];
		//echo "<hr><br>aqui <pre>"; print_r( $this->m_info[ "m_items" ] );
		 // echo "</pre>"; exit;
		foreach( $this->m_info[ "m_items" ] as $producto ){
			if( empty($producto["cfdipronom"]) ) continue; // Concepto vacio, saltar
			$xmlWriter->text( "\n\t\t" );
			$xmlWriter->startElement('cfdi:Concepto');
				// Atributos:
				$xmlWriter->startAttribute('ClaveProdServ');
					$xmlWriter->text( $producto["cfdiprosat"] );
				$xmlWriter->endAttribute();

				if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ||  $this->m_info["m_comprobante"]["cfditpocom"] == "N" ){
					$producto["cfdidetcan"] = number_format( $producto["cfdidetcan"],0,".","" );
				}else{
					$xmlWriter->startAttribute('NoIdentificacion');
						$xmlWriter->text( $producto["cfdiprosku"] );
					$xmlWriter->endAttribute();
				}

				$xmlWriter->startAttribute('Cantidad');
					$xmlWriter->text( $producto["cfdidetcan"] );
				$xmlWriter->endAttribute();

				$xmlWriter->startAttribute('ClaveUnidad');
					$xmlWriter->text( $producto["cfdiprosatuni"] );
				$xmlWriter->endAttribute();

				if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ||  $this->m_info["m_comprobante"]["cfditpocom"] == "N" ){
					// Se omite la Unidad
				}else{
					$xmlWriter->startAttribute('Unidad');
						$xmlWriter->text( $producto["cfdiprouni"] );
					$xmlWriter->endAttribute();
				}

				$xmlWriter->startAttribute('Descripcion');
					$xmlWriter->text( $producto["cfdipronom"] );
				$xmlWriter->endAttribute();

				$xmlWriter->startAttribute('ValorUnitario');
					if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
						$xmlWriter->text( "0" );
					}else{
						$xmlWriter->text( number_format( $producto["cfdidetval"],4,".","" ) );
					}
				$xmlWriter->endAttribute();

				$xmlWriter->startAttribute('Importe');
				if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
					$xmlWriter->text( "0" );
				}else{
					$xmlWriter->text( number_format( $producto["cfdidetsub"],2,".","" ) );
				}
				$xmlWriter->endAttribute();

				if( $producto["cfdidetdes"] > 0 ){
					$xmlWriter->startAttribute('Descuento');
						$xmlWriter->text( number_format( $producto["cfdidetdes"],2,".","" ) );
					$xmlWriter->endAttribute();
				}
				// Impuestos:
				if( $producto["cfdiproivacla"] != "" ){
					$xmlWriter->text( "\n\t\t\t" );
					$xmlWriter->startElement('cfdi:Impuestos');
					// Traslados:
					if( $producto["cfdiproivacla"] == "002" ){
						$xmlWriter->text( "\n\t\t\t\t" );
						$xmlWriter->startElement('cfdi:Traslados');
							// Detalle del Traslado:
							$xmlWriter->text( "\n\t\t\t\t\t" );
							$xmlWriter->startElement('cfdi:Traslado');
								// Atributos:
								$xmlWriter->startAttribute('Base');
									$xmlWriter->text( number_format( $producto["cfdidetsub"],2,".","" ) );
								$xmlWriter->endAttribute();

								$xmlWriter->startAttribute('Impuesto');
									$xmlWriter->text( $producto["cfdiproivacla"] );
								$xmlWriter->endAttribute();
								$xmlWriter->startAttribute('TipoFactor');
									$xmlWriter->text( $producto["cfdiproivafac"] );
								$xmlWriter->endAttribute();
								$xmlWriter->startAttribute('TasaOCuota');
									$xmlWriter->text( $producto["cfdiproivatas"] );
								$xmlWriter->endAttribute();
								$xmlWriter->startAttribute('Importe');
									$xmlWriter->text( $producto["cfdidetiva"] );
								$xmlWriter->endAttribute();
							$xmlWriter->endElement();

						$xmlWriter->text( "\n\t\t\t\t" );
						$xmlWriter->endElement();
					}
					$xmlWriter->text( "\n\t\t\t" );
					$xmlWriter->endElement();
				}
			$xmlWriter->text( "\n\t\t" );
			$xmlWriter->endElement();
		}
		$xmlWriter->text( "\n\t" );
		$xmlWriter->endElement();

		// Impuestos Totales:
		// echo "<br> Impuestos Totales: <pre>"; print_r( $this->m_impuestos_importes ); echo "</pre>"; exit;
		if( $this->m_info["m_impuestos"]["TotalImpuestosRetenidos"] > 0 || $this->m_info["m_impuestos"]["TotalImpuestosTrasladados"] > 0 ){
			$xmlWriter->text( "\n\t" );
			$xmlWriter->startElement('cfdi:Impuestos');

			// Atributos:
			if( $this->m_info["m_impuestos"]["TotalImpuestosTrasladados"] > 0 ){
			  $xmlWriter->startAttribute('TotalImpuestosTrasladados');
				  $xmlWriter->text( number_format( $this->m_info["m_impuestos"]["TotalImpuestosTrasladados"],2,".","" ) );
			  $xmlWriter->endAttribute();
			}
			if( $this->m_info["m_impuestos"]["TotalImpuestosRetenidos"] > 0 ){
				$xmlWriter->startAttribute('TotalImpuestosRetenidos');
					$xmlWriter->text( number_format( $this->m_info["m_impuestos"]["TotalImpuestosRetenidos"],2,".","" ) );
				$xmlWriter->endAttribute();
			}

			// Retenciones:
			// Traslados:
			if( $this->m_info["m_impuestos"]["TotalImpuestosTrasladados"] > 0 || count( $this->m_info["m_impuestos"]["m_trasladados"] ) > 0 ){
				$xmlWriter->text( "\n\t\t" );
				$xmlWriter->startElement('cfdi:Traslados');
				foreach( $this->m_info["m_impuestos"]["m_trasladados"] as $indice => $valor ){
					// echo "<br> [$indice](".count($valor).") <pre>"; print_r( $valor ); echo "</pre>"; exit;

					$xmlWriter->text( "\n\t\t\t" );
					$xmlWriter->startElement('cfdi:Traslado');
						// Atributos:
						$xmlWriter->startAttribute('Impuesto');
							$xmlWriter->text( $valor["Impuesto"] );
						$xmlWriter->endAttribute();

						$xmlWriter->startAttribute('TipoFactor');
							$xmlWriter->text( $valor["TipoFactor"] );
						$xmlWriter->endAttribute();

						$xmlWriter->startAttribute('TasaOCuota');
							$xmlWriter->text( $valor["TasaOCuota"] );
						$xmlWriter->endAttribute();

						$xmlWriter->startAttribute('Importe');
							$xmlWriter->text( number_format( $valor["Importe"],2,".","" ) );
						$xmlWriter->endAttribute();

					$xmlWriter->endAttribute();
					$xmlWriter->endElement();
				}
			  $xmlWriter->text( "\n\t\t" );
			  $xmlWriter->endElement();
			}

			$xmlWriter->text( "\n\t" );
			$xmlWriter->endElement();
		}

		$xmlWriter->text( "\n" );
		$xmlWriter->endElement(); // Fin del elemento <cfdi:Comprobante
		$xmlWriter->endDocument();

		//--MANE--CREAR XML
		file_put_contents( $this->xml_archivo, $xmlWriter->flush(true), FILE_APPEND );
	}
}
?>
