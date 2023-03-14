<?php
class controladorLugarExpedicion{

	
	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlLugarExpedicion(){
		$respuesta = ModeloLugarExpedicion::mdl_allLugarExpedicion();
		return $respuesta;
	}

}

?>