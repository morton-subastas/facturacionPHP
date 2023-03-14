<?php


echo "Entra ControladorMultiPagos<br>";

require_once ("../Modelo/modeloMultiPagos.php");
class ControladorMultiPagos{


	/**
	 * METODO QUE LLAMA A LOS ESTILOS DINAMICOS DE LA PLANTILLA
	 */
	public static function ctrl_getAllPayments(){
    echo "ctrl ctrl_getAllPayments<br>";
		$respuesta = ModeloMultiPagos::mdl_getAllPayments();
		return $respuesta;
	}


}

?>
