<?php
class ControladorServProMORTON{

	
	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlServProdMORTON(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloConceptoServicios::c_ConceptoServicio();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

}

?>