<?php
class controladorProductosIngresados{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrlProductosIngresados($folio){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloProductoIngresado::c_ProductoIngresado($folio);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlProductosEliminados($folio){
		//echo "controlador".$folio."<br>";
		$respuesta =	ModeloProductoIngresado::c_ProductoEliminar($folio);
		/*
		if ($respuesta > 0){
			echo "<br>ELIMINAR".$respuesta;
		}else{
			echo "nada";
		}
		*/
		//return $respuesta;
	}

}

?>
