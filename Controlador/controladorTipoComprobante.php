<?php
class controladorTipoComprobante{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlTipoComprobante(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		//echo "entra controladorTipoComprobante function ctrlTipoComprobante<br>";
		$respuesta = ModeloTipoComprobante::mdl_allTipoComprobantes();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

}

?>
