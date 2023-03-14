<?php
class controladorUso{

	
	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlUso(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloUso::mdl_allUso();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

}

?>