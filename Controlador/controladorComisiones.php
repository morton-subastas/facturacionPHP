<?php
class ControladorComisiones{

	public static function ctrlAddComisiones( $descripcion, $porcentaje){
			//echo "LLEGA CONTROLADOR";
			$respuesta = ModeloComisiones::mdl_AddComisiones($descripcion,$porcentaje);
			//REGRESAR RESPUESTA
			//echo "<br>REGRESA RESPUESTA CONTROLADOR".$respuesta;
			return $respuesta;
	}

	public static function ctrlDeleteComisiones($clave){
			//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
			$respuesta = ModeloComisiones::mdl_DeleteComisiones($clave);
			//REGRESAR RESPUESTA
			return $respuesta;
	}

	public static function ctrlUpdateComisiones($clave, $descripcion, $porcentaje){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloComisiones::mdl_UpdateComisiones($clave, $descripcion, $porcentaje);
		//REGRESAR RESPUESTA
		//echo "<br>RES".$respuesta."<br>";
		return $respuesta;
	}

	public static function ctrlUpdateComisionesStatus($clave, $estatus){
		//echo "<br>ENTRA CONTROLADOR".$clave."-".$estatus;
		$respuesta = ModeloComisiones::mdl_UpdateComisionesStatus($clave, $estatus);
		//REGRESAR RESPUESTA
		//echo "<br>RES".$respuesta."<br>";
		return $respuesta;
	}

	public static function ctrlSearchPorcent($descripcion){
			//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
			$respuesta = ModeloComisiones::mdl_SearchPorcent($descripcion);
			//REGRESAR RESPUESTA
			return $respuesta;
	}

	public static function ctrlSearchPorcentWhere($bidder){
				//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
				$respuesta = ModeloComisiones::mdl_SearchPorcentWhere($bidder);
				//REGRESAR RESPUESTA
				return $respuesta;
	}

	public static function ctrlSearchAllComisiones(){
			$respuesta = ModeloComisiones::mdl_SearchAllComisiones();
			//REGRESAR RESPUESTA
			return $respuesta;
	}

	public static function ctrlSearchDepartamento($departamento){
			$respuesta = ModeloComisiones::mdl_SearchDepartamento($departamento);
			//REGRESAR RESPUESTA
			return $respuesta;
	}


}

?>
