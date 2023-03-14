<?php
echo "Class <b>ConexionMP</b><br>";
Class ConexionMP{


	public static function conectarMP(){
        //h0rKm8dEwHZz
				echo "llegafunction_conectarMP<br>";
		$link = new PDO("mysql:host='https://www.mortonsubastas.com';dbname=mortonsu_web_panel",
						"mortonsu_allan",
						"Arr1lat3$25",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		echo "regresa ".$link;
		return $link;

	}


}
