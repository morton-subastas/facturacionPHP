<?php
class controladorRutaTimbres{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrl_AllRutas(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = modeloRutaTimbres::mdl_AllRutas();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrl_UpdateStatus($clave, $status_new){
		//echo "llega controlador";
		$respuesta = modeloRutaTimbres::mdl_UpdateStatus($clave, $status_new);
		return $respuesta;
	}

	public static function ctrlDeleteRuta($clave){
		$respuesta = modeloRutaTimbres::mdl_DeleteRow($clave);
		return $respuesta;
	}

}

?>
