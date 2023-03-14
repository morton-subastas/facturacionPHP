<?php
class controladorUnidades{

	public static function ctrlUnidades(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloUnidades::c_Unidades();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function setUnidad(){
		$cla = $_POST['clave'];
        $des = $_POST['descripcion'];

		$respuesta = ModeloUnidades::mdl_AddUnidades($cla, $des);
		//REGRESAR RESPUESTA
		//echo "res".$respuesta;
		return $respuesta;
	}

	public static function deleteUnidad(){
		$cla = $_POST['id'];

		$respuesta = ModeloUnidades::mdl_DeleteUnidades($cla);
		//REGRESAR RESPUESTA
		//echo "res".$respuesta;
		return $respuesta;
	}

	public static function ctrl_SearchUnique_Unidad($clave){
		//echo "controlador".$clave;
		$respuesta = ModeloUnidades::mdl_SearchUnique_Unidad($clave);
		//REGRESAR RESPUESTA
		//echo "res".$respuesta;
		return $respuesta;
	}

}

?>
