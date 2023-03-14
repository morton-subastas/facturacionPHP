<?php
class ControladorFormaPago{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlFormaPago(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloFormaPago::c_FormaPago();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlFormaPago_f(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloFormaPago::c_FormaPago_activos();
		//REGRESAR RESPUESTA
		return $respuesta;
	}


	public static function ctrlUpdateFormaPago($clave, $estatus){
		$respuesta = ModeloFormaPago::mdl_Estatus($clave, $estatus);
		return $respuesta;
	}

}

?>
