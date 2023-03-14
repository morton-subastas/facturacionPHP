<?php
class ControladorEmisoresPago{

	public static function ctrlAddEmisor($clave, $desc){
		//echo "controlador".$clave."-".$desc;
		$respuesta = ModeloEmisorPago::mdl_AddEmisor($clave, $desc);

		return $respuesta;
	}

  public static function ctrlDeleteEmisor($clave){
 		$respuesta = ModeloEmisorPago::mdl_DeleteEmisor($clave);

 		return $respuesta;
 	}

	public static function ctrlEmisorPago(){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloEmisorPago::c_EmisorPago();
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlSearchEmisor($emisor){
		//RESPUESTA AL MODELO->CON NOMBRE DE FUNCTIO NmdlEstiloPlantilla
		$respuesta = ModeloEmisorPago::m_SearchEmisor($emisor);
		//REGRESAR RESPUESTA
		return $respuesta;
	}

	public static function ctrlUpdateEmisor($clave, $desc){
		//echo "controlador".$clave."-".$desc;
		$respuesta = ModeloEmisorPago::mdl_UpdateEmisor($clave, $desc);
		return $respuesta;
	}

	public static function ctrlUpdateEmisorStatus($clave, $status){
			//echo "CONTROLADOR: ".$clave."-".$status."<br>";
			$respuesta = ModeloEmisorPago::mdl_UpdateEmisorStatus($clave, $status);
			return $respuesta;
	}

}

?>
