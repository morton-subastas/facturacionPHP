<?php
class ControladorEmail{


	public static function ctrlAll_Email(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloEmail::mdl_All_Email();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlSearchReceptor($receptor){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloReceptorPago::mdl_SearchReceptorPago($receptor);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlAdd_Email($nombre, $correo, $rol){
		//echo "<br>llega Controlador";
		$respuesta = ModeloEmail::mdl_AddEmail($nombre, $correo, $rol);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlDeleteReceptorPago($clave){
		$respuesta = ModeloReceptorPago::mdl_DeleteReceptorPago($clave);
		return $respuesta;
	}

	public static function ctrlUpdate_Email($clave, $nombre, $email){
		//echo "cla:".$clave."-descripcion:".$decr."-email:".$emai;

		$respuesta = ModeloEmail::mdl_UpdateEmail($clave, $nombre, $email);
		//return $respuesta;
		$respuesta = 1;
		return $respuesta;
	}

	public static function ctrlUpdateEmailStatus($clave, $status){
		//echo "cla:".$clave."-status:".$status;

		$respuesta = ModeloEmail::mdl_UpdateEmailStatus($clave, $status);
		//return $respuesta;
		//$respuesta = 1;
		return $respuesta;
	}


}

?>
