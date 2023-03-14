<?php
class controladorMonedas{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlMonedas(){
		$respuesta = ModeloMonedas::c_Monedas();
		return $respuesta;
	}

	public static function ctrlUpdateMonedas($clave, $estatus){
		$respuesta = ModeloMonedas::mdl_Estatus($clave, $estatus);
		return $respuesta;
	}

	public static function ctrlMonedasActivas(){
		$respuesta = ModeloMonedas::mdl_MonedasActivas();
		return $respuesta;
	}

}

?>
