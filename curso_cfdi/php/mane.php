<?php
require('../fpdf/fpdf.php');
if( isset( $_GET[ "modo" ] ) ){ $modo = trim( $_GET[ "modo" ] );}
if( isset( $_GET[ "empid" ] ) ) $empid = trim( $_GET[ "empid" ] );
if( isset( $_GET[ "cfdiserid" ] ) ) $cfdiserid = trim( $_GET[ "cfdiserid" ] );
if( isset( $_GET[ "cfdiid" ] ) ) $cfdiid = trim( $_GET[ "cfdiid" ] );


include_once( "cfdi_info.php" );

$cfdi_info1 = new cfdi_info();
$cfdi_info1->empid = $empid;
$cfdi_info1->cfdiserid = $cfdiserid;
$cfdi_info1->cfdiid = $cfdiid;
$cfdi_info1->obtener_info();

$m_info = $cfdi_info1->m_info;
//var_dump($m_info);

class aFPDF extends FPDF {
  private $m_tipos = [
		"" => "*",
		"I" => "Ingreso",
		"E" => "Egreso",
		"T" => "Traslado",
		"N" => "Nómina",
		"P" => "Pago",
	];
	// Paginacion y Bordes:
	private $reporte_contador = 0;
	private $registros_x_pagina = 42;
	private $aumento_y = 6;
	private $m_coordenadas = array(
			array ( 1,18,150,18 ),
			array ( 18,44,150,44 ),
	);
	private $style = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'solid' => 2, 'color' => array(0, 0, 0));
	private $style001 = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'solid' => 2, 'color' => array(0, 0, 0));
	function coordenadas_reinicio(){
			$this->m_coordenadas = array(array ( 1,18,150,18 ),array ( 18,44,150,44 ),);
			$this->AddPage();
			$this->SetY( 5 );
			$this->reporte_contador = 0;
	}
	public function Header(){}
	public function Footer(){}
	public function definir_info( $empid,$cfdiserid,$cfdiid,$m_info ){
			$this->empid = $empid;
			$this->cfdiserid = $cfdiserid;
			$this->cfdiid = $cfdiid;
			$this->m_info = $m_info;
	}
  public function imprimir(){
			$this->SetFont('helvetica', '', 8 );
			$this->AddPage();
			$this->SetY( 5 );

			$moneda0 = "Moneda";
			$tc0 = "T. Cambio";
			$tc = $this->m_info["m_comprobante"]["cfdiidtc"];
			//var_dump($tc);
			$moneda = $this->m_info["m_comprobante"]["cfdimon"];
			$forma_pago0 = "Forma de Pago:";
			$metodo_pago0 = "Método de Pago:";
			$forma_pago = $this->m_info["m_comprobante"]["cfdiforpag"];
			$metodo_pago = $this->m_info["m_comprobante"]["cfdimetpag"];

			if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
					$moneda0 = "";
					$moneda = "";
					$forma_pago0 = "";
					$forma_pago = "";
					$metodo_pago0 = "";
					$metodo_pago = "";
					$tc0 = "";
					$tc = "";
			}

			if( $this->m_info["m_comprobante"]["cfdimon"] == "MXN" ){
					$tc0 = "";
					$tc = "";
				}

			// Emisor:

			$this->SetFont('helvetica', 'B', 13 );
      		if( strlen($this->m_info[ "m_encabezado" ][ "empresa" ])>45 ) $this->SetFont('helvetica', 'B', 11 );
							$this->MultiCell(200,10,$this->m_info[ "m_emisor" ][ "empnom" ],0,'C');
							$this->SetFont('helvetica', 'B', 9 );

							$this->MultiCell(200,10,$this->m_info[ "m_emisor" ][ "emprfc" ],0,'C');
							$this->MultiCell(200,10,$this->m_info[ "m_emisor" ][ "empdom" ],0,'C');

							if( $this->m_info["m_comprobante"]["cfditpocom"] == "N" ){
        					$this->imprime_encanezado_cliente_cfdi( 1,1,"Empleado:","Fecha","NÓMINA" );
							}else{
									$this->imprime_linea1( "" );
									//$this->Image('../vista/imagenes/imagotipo.png',10,10,45, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
									$this->Image('../../vista/imagenes/imagotipo.jpeg',10,10,45, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

									//$this->imprime_encanezado_cliente_cfdi( 1,1,"Cliente:","Fecha",strtoupper( $this->m_tipos[$this->m_info["m_comprobante"]["cfditpocom"]] ) );
									//$this->imprime_encanezado_cliente_cfdi( 1,1,"Cliente:","Fecha","");
									$this->imprime_encanezado_cliente_cfdi( 0,0,"","Folio: ". number_format($this->m_info["m_comprobante"]["cfdiid"],0,".",",")   ,"" );
									$this->imprime_encanezado_cliente_cfdi( 0,0,"","Fecha: ".$this->m_info["m_comprobante"]["cfdifec"],"" );

							}

							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Regimen Fiscal: 601 General de Ley Personas Morales","");
							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Tipo de Comprobante: ".substr( $this->m_info["m_comprobante"]["cfditpocom"],0,150) ,"");
							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Lugar de Expedición: ".$this->m_info["m_comprobante"]["cfdilugexp"],"");
							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Moneda: ".$this->m_info["m_comprobante"]["cfdimon"],"");
							$this->SetFont('helvetica', 'B', 10 );
							//$this->imprime_encanezado_cliente_cfdi( 0,0,substr( $this->m_info["m_receptor"]["cfdiclinom"],0,150),$this->m_info["m_comprobante"]["cfdifec"]." ".$this->m_info["m_comprobante"]["cfdihor"],$this->m_info["m_comprobante"]["Serie"]." - ".$this->m_info["m_comprobante"]["cfdiid"] );
							$this->imprime_linea1( "" );
							$this->imprime_encanezado_cliente_cfdi( 1,1,"Cliente:","Metodo de Pago:","");
							$this->imprime_encanezado_cliente_cfdi( 0,0,substr( $this->m_info["m_receptor"]["cfdiclinom"],0,150),substr( $this->m_info["m_comprobante"]["cfdimetpag"],0,150),"" );
							$this->imprime_encanezado_cliente_cfdi( 1,1,"RFC:","Forma de Pago:","");
							$this->imprime_encanezado_cliente_cfdi( 0,0,$this->m_info["m_receptor"]["cfdiclirfc"],substr( $this->m_info["m_comprobante"]["cfdiforpag"],0,150),"" );
							$this->imprime_encanezado_cliente_cfdi( 1,1,"Domicilio:","Uso de CFDI:","");
							$this->imprime_encanezado_cliente_cfdi( 0,0,substr( $this->m_info["m_receptor"]["cfdiclidir"],0,150),$this->m_info["m_comprobante"]["cfdiuso"],"" );
							$this->imprime_linea1( "" );

							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Subasta: ".$this->m_info["m_comprobante"]["subasta"],"");
							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Fecha: ".$this->m_info["m_comprobante"]["cfdifec"],"");
							$this->imprime_encanezado_cliente_cfdi2( 0,0,"Paleta: ".$this->m_info["m_comprobante"]["paleta"],"");
							$this->imprime_linea1( "" );

							 $this->m_info[ "m_emisor" ][ "emplogo" ] = "../img/tcpdf_signature.png";
							//if( file_exists( $this->m_info[ "m_emisor" ][ "emplogo" ] ) ) $this->Image( $this->m_info[ "m_emisor" ][ "emplogo" ], 148, 10, 45, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


							if( $this->m_info["m_comprobante"]["cfditpocom"] != "N" ){
									$this->SetFont('helvetica', 'B', 8 );

									//$this->imprime_encanezado_cliente_cfdi2( 0,0,"d) ","");
									//1----------------TITULOS DE TABLA
									$this->Ln( $this->aumento_y );
									$relleno = 0;
									$borde = 0;
									if( $mostrar_linea == 0 ) $relleno = 1;
									$this->SetFillColor(220,220,220);
									$this->MultiCell( 15,$this->aumento_y-1, "Cantidad", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 18,$this->aumento_y-1, "Clave SAT", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 15,$this->aumento_y-1, "Lote", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 40,$this->aumento_y-1, "Clave Prod/Serv", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 45,$this->aumento_y-1, "Descripción", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 20,$this->aumento_y-1, "$ Martillo", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 16,$this->aumento_y-1, "$ Unitario", $borde, 'C', $relleno, 0, '', '', true );
									$this->MultiCell( 17,$this->aumento_y-1, "Impuestos", $borde, 'C', $relleno, 0, '', '', true );
									//$this->MultiCell( 15,$this->aumento_y-1, "Importe", $borde, 'C', $relleno, 0, '', '', true );
									//1---------------FIN TITULOS DE TABLA

									//$this->imprime_linea8( 0,"Cve. Prod.","Clave SAT","Cantidad","Unidad","Descripción","Precio","IVA","Importe","Descuento", "Lote", "Clave Prod/Serv");

									if( count($this->m_info[ "m_items" ])>0 ){
										$this->SetFont('helvetica', '', 8 );
										foreach( $this->m_info[ "m_items" ] as $producto ){		// echo "<br> <pre>"; print_r( $producto ); echo "</pre>"; exit;
											//------1
											$producto_SAT = "".$producto["cfdiprosat"]."  ".$producto["ProdServ_descripcion"];
											if ($producto["unidad_nombre"] == "Unidad de servicio"){
												$unidad_SAT = "E48  ".$producto["unidad_nombre"];
											}else{
												$unidad_SAT = "H87  ".$producto["unidad_nombre"];
											}
											$this->Ln( $this->aumento_y );
											$this->MultiCell( 15, $this->aumento_y*$altox,number_format($producto["cfdidetcan"],0,".",",") , 0, 'C', 0, 0, '', '', true );				//CANTIDAD
											$this->MultiCell( 18, $this->aumento_y*$altox, $unidad_SAT, 0, 'L', 0, 0, '', '', true );				//CLAVE_SAT
											$this->MultiCell( 15, $this->aumento_y*$altox, number_format($producto["lote"],0,"",""), 0, 'L', 0, 0, '', '', true );				//LOTE
											$this->MultiCell( 40, $this->aumento_y*$altox, $producto_SAT, 0, 'L', 0, 0, '', '', true );				//PROD/SERV

											$nombre_producto = str_replace("<br>","",$producto["cfdipronom"]);
											$nombre_producto = str_replace("<center>","",$nombre_producto);
											$nombre_producto = str_replace("</center>","",$nombre_producto);
											$nombre_producto = str_replace("<b>","",$nombre_producto);
											$nombre_producto = str_replace("</b>","",$nombre_producto);

											$this->MultiCell( 45, $this->aumento_y*$altox, $nombre_producto, 0, 'L', 0, 0, '', '', true );				//DESCRIPCION
											//$this->MultiCell( 15, $this->aumento_y*$altox, $texto4, 0, 'L', 0, 0, '', '', true );
											//$marti = $producto["cfdidetval"] * 20;
											//$marti = $producto["cfdidetval"] * 5;
											$marti = $producto["martillo"];
											$marti_acm = $marti_acm + $marti;
											//$marti = 999;
											$this->MultiCell( 20, $this->aumento_y*$altox, number_format($marti,2,".",","),0, 'R', 0, 0, '', '', true );												//VALOR_MARTILLO
											$this->MultiCell( 16, $this->aumento_y*$altox, number_format($producto["cfdidetval"],0,".",","),0, 'R', 0, 0, '', '', true );				//VALOR_UNITARIO

											$this->MultiCell( 17, $this->aumento_y*$altox, number_format($producto["cfdidetiva"],2,".",","),0, 'R', 0, 0, '', '', true );												//IMPUESTO
											//$this->MultiCell( 15, $this->aumento_y*$altox, number_format($producto["cfdidetval"],2,".",","),0, 'R', 0, 0, '', '', true );											//IMPORTE

											++$this->reporte_contador;
											$this->m_coordenadas[0][1] += $this->aumento_y*$altox;
											$this->m_coordenadas[0][3] += $this->aumento_y*$altox;
											if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
											//------2


											if( strlen($producto["cfdipronom"])>200 ) $this->imprime_linea1( "" );$this->imprime_linea1( "" );
											//$this->Line( $this->m_coordenadas[0][0]+5, $this->m_coordenadas[0][1]+$this->aumento_y-14, $this->m_coordenadas[0][2]+54, $this->m_coordenadas[0][3]+$this->aumento_y-14, $this->style );
										}
									}else{
										$this->imprime_linea1( "" );
										$this->imprime_linea1( "" );
										$this->imprime_linea1( "" );
										$this->imprime_linea1( "" );
										$this->imprime_linea1( "" );
									}
							}


							if( $this->m_info["m_comprobante"]["cfditpocom"] != "N" ){
									if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
									}
                  else{
											if( $this->m_info["m_comprobante"]["cfdisub"] > 0 ){

                          $this->SetFont('helvetica', 'B', 8 );

                        	$this->imprime_encanezado_cliente_cfdi( 1,1,"","","");

                          $total_letra_s = $this->m_info["m_comprobante"]["cfditot"];

                          //MANE $total_letra_s = $this->num2letras($total_letra_s);

                          $this->imprime_encanezado_cliente_cfdi( 0,0,$total_letra_s,"","" );
													$this->imprime_linea4_01( 0,"","","Martillo-",number_format($marti_acm,2,".",",") );
													$this->imprime_linea4_01( 0,"","","Subtotal:",number_format($this->m_info["m_comprobante"]["cfdisub"],2,".",",") );
                          /**/
											}
									}
									// Si es TRASLADO se oculta la forma y tipo de Pago:
                  if( $this->m_info["m_comprobante"]["cfditpocom"] == "T" ){
											if( $this->m_info["m_comprobante"]["cfdiidretiva"] > 0 ){

													$this->imprime_linea4_01( 0,"","","IVA:",number_format($this->m_info["m_comprobante"]["cfdiiva"],2,".",",") );
											}
									}elseif( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
									}else{
											if( $this->m_info["m_comprobante"]["cfdides"] > 0 ){
													$this->imprime_linea4_01( 0,"","","Descuento:",number_format($this->m_info["m_comprobante"]["cfdides"],2,".",",") );
											}
											if( $this->m_info["m_comprobante"]["cfdiiva"] > 0 ){
													$this->imprime_linea4_01( 0,"","","IVA:",number_format($this->m_info["m_comprobante"]["cfdiiva"],2,".",",") );
											}
											if( $this->m_info["m_comprobante"]["cfdiidish"] > 0 ){
													$this->imprime_linea4_01( 0,"","","ISH:",number_format($this->m_info["m_comprobante"]["cfdiidish"],2,".",",") );
											}
									}

              }


              if( $this->m_info["m_comprobante"]["cfditpocom"] == "P" ){
							}else{
									$this->SetFont('helvetica', 'B', 8 );
									$this->imprime_linea4_01( 0,"","","Total:",number_format($this->m_info["m_comprobante"]["cfditot"],2,".",",") );
									//include '../vista/funciones.php';
									//$resultado = num2letras(number_format($total_global,2,'.',''));
									//$this->imprime_linea4_01( 0,"","","Total:",$resultado,2,".",",") );
									//$this->MultiCell( 45,50, $resultado, 0, 'L', 0, 0, '', '', true );				//DESCRIPCION
									//$this->SetFont('helvetica', 'N', 8 );
							}

							// CFDI Relacionados:
							if( count( $this->m_info["m_relacionados"] )>0 ){

                  $this->imprime_linea1( "" );
									$this->SetFont('helvetica', 'B', 8 );
									$this->imprime_linea1( "CFDI RELACIONADOS:" );
									$this->SetFont('helvetica', 'N', 8 );

									foreach( $this->m_info[ "m_relacionados" ] as $registro ){
											$cfdirelsatcla = trim( $registro[ "cfdirelcla" ] );
											$cfdirelsatcon = trim( $registro[ "cfdirelcon" ] );
											$m_items = $registro[ "m_items" ];
											$this->imprime_linea1( $cfdirelsatcla." - ".$cfdirelsatcon.":" );
											foreach( $m_items as $uuid ){
													$this->imprime_linea1( "          ".strtoupper( $uuid ) );
											}
									}

							}


							if( !empty( $this->m_info["m_comprobante"]["cfdiobs"] ) ){
									$this->imprime_linea1( "" );
									$this->imprime_linea4_02( 0,"Observaciones:",$this->m_info["m_comprobante"]["cfdiobs"] );
							}

						//	$this->SetFont('helvetica', 'N', 8 );
						//	$this->imprime_linea1( "" );
						//	$this->imprime_linea1( "" );

							if( strlen( $this->m_info["m_comprobante"]["cfdiuuid"] ) == 36 ){
									// Leer la Info del Timbre Fiscal:
									$cfditimbver = "";
									$cfditimbnocer = "";
									$cfdisello = "";
									$cfditimbsello = "";
									$cfdisatrfc = "";
									if( $this->m_info["m_comprobante"]["cfdixml"] != "" && file_exists( $this->m_info["m_comprobante"]["cfdixml"] ) ){
											$archivo_xml = trim(file_get_contents( $this->m_info["m_comprobante"]["cfdixml"] ));
				 							echo "<br><textarea cols='80' rows='10'> $archivo_xml </textarea>"; exit;
											// Convertir a Matriz:
											$p = xml_parser_create();
											xml_parse_into_struct($p, $archivo_xml, $vals, $index);
											xml_parser_free($p);
											// echo "<br><div style='width:600px;height:300px;overflow:auto;'> "; echo "<br><pre>"; print_r( $vals ); echo "</pre><br>"; echo "</div>"; exit;
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
									}
									$this->cadena_qr = "https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx?&id=".$this->m_info["m_comprobante"]["cfdiuuid"]."&re=".$this->m_info["m_emisor"]["emprfc"]."&rr=".$this->m_info["m_receptor"]["cfdiclirfc"]."&tt=".number_format($this->m_info["m_comprobante"]["cfditot"],2,'.','')."&fe=".strrev(substr(strrev( $cfditimbsello ),0,8));
									$cadenaOriginal = "||".$this->m_info["m_comprobante"]["cfdiidtimbver"]."|".$this->m_info["m_comprobante"]["cfdiuuid"]."|".$this->m_info["m_comprobante"]["cfdicerfec"]."T".$this->m_info["m_comprobante"]["cfdicerhor"]."|".$cfdisatrfc."|".$cfdisello."|".$cfditimbnocer."||";
									$this->imprime_timbre( $this->cadena_qr,$cfdisello,$cfditimbsello,$cadenaOriginal,$this->m_info["m_comprobante"]["cfdiuuid"],$this->m_info["m_comprobante"]["cfdiidtimbnocer"],$this->m_info["m_comprobante"]["cfdicerfec"]." ".$this->m_info["m_comprobante"]["cfdicerhor"],$cfdisatrfc );
									// $this->imprime_linea1( "" );
									$this->imprime_linea1C( "ESTE DOCUMENTO ES UNA REPRESENTACIÓN IMPRESA DE UN CFDI" );
							}else{
									// $this->imprime_linea1( "" );
									$this->imprime_linea1C( "ESTE DOCUMENTO NO TIENE VALOR FISCAL" );
							}
/**/
	}
	private function num2letras($numero) {
    //$numero = 11213.89;
    //$numero = 11213;

    $es_flotante = strpos($numero, '.');
    //echo "flota:-".$es_flotante."-<br>";
    if($es_flotante > 1){
      $inicia = strlen($numero);
      $menos = $inicia - 2;
      $flota = substr($numero, -2, 2);

    }else{
      $flota = "00";
    }
    //$numf = $numero;
		$numero = milmillon($numero);

    return $numero." PESOS ".$flota."/100 M.N.";

		//return $numero;
  }
	private function coordenadas(){
			// Paginacion:
			++$this->reporte_contador;
			$this->m_coordenadas[0][1] += $this->aumento_y;
			$this->m_coordenadas[0][3] += $this->aumento_y;
			if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
	}
	private function imprime_encanezado_cliente_cfdi( $relleno0,$relleno1,$A,$B,$C ){
		$this->Ln( $this->aumento_y );

		$alto_celda0 = $this->aumento_y;
		$alto_celda1 = $this->aumento_y;
		if( $relleno0 ){
			$this->SetFont('helvetica', 'B', 10 );
        	$this->SetFillColor(220,220,220); // Gris suave
			$alto_celda0 = $this->aumento_y - 1;
		}else{
			$this->SetFont('helvetica', 'B', 9 );
			$this->SetTextColor(0,0,0); // Negro
		}
		$this->MultiCell( 129, $alto_celda0, $A, 0, 'L', $relleno0, 0, '', '', true );
		$this->MultiCell( 1, $this->aumento_y, "", 0, 'L', 0, 0, '', '', true );

		if( $relleno1 ){
			$this->SetFont('helvetica', 'B', 9 );
			$this->SetFillColor(220,220,220); // Gris suave
			$alto_celda1 = $this->aumento_y - 1;
		}else{
			$this->SetFont('helvetica', 'B', 9 );
			$this->SetTextColor(0,0,0); // Negro
		}
		$this->MultiCell( 40, $alto_celda1, $B, 0, 'C', $relleno1, 0, '', '', true );
		$this->MultiCell( 30, $alto_celda1, $C, 0, 'C', $relleno1, 0, '', '', true );
		$this->SetTextColor(0,0,0); // Negro
		$this->coordenadas();

	}
	private function imprime_encanezado_cliente_cfdi2( $relleno0,$relleno1,$A,$B ){
			$this->Ln( $this->aumento_y );
			$alto_celda0 = $this->aumento_y;
			$alto_celda1 = $this->aumento_y;
			if( $relleno0 ){
					$this->SetFillColor(50,50,50); // Gris Fuerte
					$this->SetTextColor(255,255,255); // Blanco
					$alto_celda0 = $this->aumento_y - 1;
			}else{
					$this->SetTextColor(0,0,0); // Negro
			}

			$this->MultiCell( 129, $alto_celda0, $A,0, 'C', $relleno0, 0, '', '', true );
			$this->MultiCell( 1, $alto_celda0, "", 0, 'C', 0, 0, '', '', true );

			if( $relleno1 ){
					$this->SetFillColor(220,220,220);
					$alto_celda1 = $this->aumento_y - 1;
			}else{
					$this->SetTextColor(0,0,0); // Negro
			}

			$this->MultiCell( 70, $alto_celda1, $B,0, 'C', $relleno1, 0, '', '', true );
			$this->SetTextColor(0,0,0); // Negro
			$this->coordenadas();
	}
	private function imprime_linea1( $texto1 ){
		$this->Ln( $this->aumento_y );
		$this->MultiCell( 195, $this->aumento_y, $texto1, 0, 'L', 0, 0, '', '', true );
		// Paginacion:
		++$this->reporte_contador;
		$this->m_coordenadas[0][1] += $this->aumento_y;
		$this->m_coordenadas[0][3] += $this->aumento_y;
		if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
	}
	private function imprime_linea1C( $texto1 ){
		$this->Ln( $this->aumento_y );
		$this->MultiCell( 7, $this->aumento_y, "", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 195, $this->aumento_y, $texto1, 0, 'C', 0, 0, '', '', true );
		// Paginacion:
		++$this->reporte_contador;
		$this->m_coordenadas[0][1] += $this->aumento_y;
		$this->m_coordenadas[0][3] += $this->aumento_y;
		if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
	}
	private function imprime_linea4_01( $mostrar_linea,$texto1,$texto2,$texto3,$texto4 ){
		$this->Ln( $this->aumento_y );
		$relleno = 1;
		$this->SetFillColor(220,220,220); // Gris Fuerte
		$this->MultiCell( 30, $this->aumento_y, $texto1, 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 110, $this->aumento_y, $texto2, 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 30, $this->aumento_y, $texto3, 0, 'R', $relleno, 0, '', '', true );
		$this->SetFillColor(242,242,242);
		$this->SetTextColor(0,0,0); // Negro
		$this->MultiCell( 30, $this->aumento_y, $texto4, 0, 'R', $relleno, 0, '', '', true );
		// Linea
		if( $mostrar_linea ){
			$this->Line( $this->m_coordenadas[0][0]+35, $this->m_coordenadas[0][1]+$this->aumento_y*4+2, $this->m_coordenadas[0][2]-45, $this->m_coordenadas[0][3]+$this->aumento_y*4+2, $this->style001 );
			$this->Line( $this->m_coordenadas[0][0]+205, $this->m_coordenadas[0][1]+$this->aumento_y*4+2, $this->m_coordenadas[0][2]-15, $this->m_coordenadas[0][3]+$this->aumento_y*4+2, $this->style001 );
		}
		// Paginacion:
		++$this->reporte_contador;
		$this->m_coordenadas[0][1] += $this->aumento_y;
		$this->m_coordenadas[0][3] += $this->aumento_y;
		if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
	}
	private function imprime_linea4_02( $mostrar_linea,$texto1,$texto2){
		$this->Ln( $this->aumento_y );
		$this->MultiCell( 30, $this->aumento_y, $texto1, 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 170, $this->aumento_y, $texto2, 0, 'L', 0, 0, '', '', true );
		// Linea
		if( $mostrar_linea ){
			$this->Line( $this->m_coordenadas[0][0]+35, $this->m_coordenadas[0][1]+$this->aumento_y*4+2, $this->m_coordenadas[0][2]-45, $this->m_coordenadas[0][3]+$this->aumento_y*4+2, $this->style001 );
			$this->Line( $this->m_coordenadas[0][0]+205, $this->m_coordenadas[0][1]+$this->aumento_y*4+2, $this->m_coordenadas[0][2]-15, $this->m_coordenadas[0][3]+$this->aumento_y*4+2, $this->style001 );
		}
		// Paginacion:
		++$this->reporte_contador;
		$this->m_coordenadas[0][1] += $this->aumento_y;
		$this->m_coordenadas[0][3] += $this->aumento_y;
		if( $this->reporte_contador >= $this->registros_x_pagina ) $this->coordenadas_reinicio();
	}
	private function imprime_timbre( $QR,$selloCFDI,$selloSAT,$cadenaOriginal,$UUID,$noCertificadoSAT,$fecha,$facsatrfc ){
		$this->imprime_linea1C( "QR ... (".$this->reporte_contador.")" );

		if( $this->reporte_contador > 35 ){
			// Ya no cabe, saltar de Hoja:
			$this->reporte_contador = $this->registros_x_pagina;
			$this->coordenadas();
			$this->imprime_linea1( "" );
		}
		$altox = 2;
		$this->write2DBarcode( $QR, 'QRCODE,H', 5, $this->m_coordenadas[0][3] + 6, 35, 35, $style, 'N' );
		$this->SetY( $this->m_coordenadas[0][3] + 0 );
		$this->Ln( $this->aumento_y );
		$this->MultiCell( 35, $this->aumento_y, "", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 30, $this->aumento_y, "Fecha Certificación:", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 135, $this->aumento_y, $fecha, 0, 'L', 0, 0, '', '', true );
		$this->coordenadas();
		$this->Ln( 5 );
		$this->MultiCell( 35, $this->aumento_y*$altox, "", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 30, $this->aumento_y*$altox, "Sello digital del CFDI:", 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 5 );
		$this->MultiCell( 135, $this->aumento_y*$altox, $selloCFDI, 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 8 );
			$this->Ln( $this->aumento_y );
		$this->coordenadas();
		$this->coordenadas();
		$this->Ln( 3 );
		$this->MultiCell( 35, $this->aumento_y*( $altox + 0 ), "", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 30, $this->aumento_y*( $altox + 0 ), "Sello digital del SAT:", 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 5 );
		$this->MultiCell( 135, $this->aumento_y*( $altox + 0 ), $selloSAT, 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 8 );
			$this->Ln( $this->aumento_y );
		$this->coordenadas();
		$this->coordenadas();
		$this->Ln( 3 );
		$this->MultiCell( 35, $this->aumento_y*( $altox + 0 ), "", 0, 'L', 0, 0, '', '', true );
		$this->MultiCell( 30, $this->aumento_y*($altox+0), "Cadena Original:", 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 5 );
		$this->MultiCell( 135, $this->aumento_y*($altox+0), $cadenaOriginal, 0, 'L', 0, 0, '', '', true );
		$this->SetFont('helvetica', 'N', 8 );
			$this->Ln( $this->aumento_y );
		$this->coordenadas();
	}

}

$pdf=new aFPDF();
$pdf->AddPage();
$pdf->definir_info( $empid,$cfdiserid,$cfdiid,$m_info ); // Variables

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
/*
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(5 , 5, 5);
$pdf->SetHeaderMargin( PDF_MARGIN_HEADER );
$pdf->SetFooterMargin( PDF_MARGIN_FOOTER );
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
*/
//$pdf->SetFont('helvetica', 'BI', 12);
$pdf->imprimir();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'FPDF-3');
$pdf->Output();
?>
