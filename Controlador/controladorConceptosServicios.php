<?php
class ControladorConceptosServicios{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlConceptosServicios(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloConceptoServicioM::c_ConceptoServicio();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrl_SerchServicio($clave){
		//echo "<br>-entra-<br>".$clave;
		$respuesta = ModeloConceptoServicioM::mdl_SearchServicio($clave);
		return $respuesta;
	}
}

?>
