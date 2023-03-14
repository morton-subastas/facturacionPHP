<?php
class ControladorReceptoresPago{


	public static function ctrlReceptorPago(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloReceptorPago::c_ReceptorPago();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlSearchReceptor($receptor){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloReceptorPago::mdl_SearchReceptorPago($receptor);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrladdReceptorPago($clave, $descripcion, $direccion){
		//echo "<br>llega Controlador";
		$respuesta = ModeloReceptorPago::mdl_AddReceptorPago($clave, $descripcion, $direccion);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlDeleteReceptorPago($clave){
		$respuesta = ModeloReceptorPago::mdl_DeleteReceptorPago($clave);
		return $respuesta;
	}

	public static function ctrlUpdateReceptorPago($clave, $decr, $emai, $direccion){
		//echo "cla:".$clave."-descripcion:".$decr."-email:".$emai;

		$respuesta = ModeloReceptorPago::mdl_UpdateReceptorPago($clave, $decr, $emai, $direccion);
		//return $respuesta;
		$respuesta = 1;
		return $respuesta;
	}

	public static function ctrlUpdateComisionesStatus($clave, $status){
		//echo "cla:".$clave."-status:".$status;

		$respuesta = ModeloReceptorPago::mdl_UpdateComisionesStatus($clave, $status);
		//return $respuesta;
		//$respuesta = 1;
		return $respuesta;
	}


}

?>
