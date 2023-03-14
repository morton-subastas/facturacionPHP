<?php
class ControladorMetodoPago{

	
	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlEstiloPlantilla(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloMetodoPago::c_MetodoPago();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

}

?>