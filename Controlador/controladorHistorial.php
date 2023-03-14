<?php
//echo "llega controladorHistorial<br>";
class controladorHistorial{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlHistorial(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloHistorial::mdl_AllCFDI();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlSpecificHistorial($folio){
		$respuesta = ModeloHistorial::mdl_SpecificCFDI($folio);
		return $respuesta;
	}
}

?>
