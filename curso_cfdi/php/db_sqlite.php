<?php
// db_sqlite.php
class db{
	//public $base = "../bbdd/db_cfdi33";
	// public $bdms = "sqlite"; // sqlite // postgresql
	public $link;
	public function conectar(){
		try {
			//99HHxhdnhM6D
			$this->link = new PDO("mysql:host=localhost;dbname=timbrado",
							"root",
							"h0rKm8dEwHZz",
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
														PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
							);
							/*
			$this->link = new PDO("mysql:host=localhost;dbname=timbrado","root","99HHxhdnhM6D");
			$this->link->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
			$memory_db = new PDO('sqlite::memory:');
			$memory_db->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
			*/
		}catch(PDOException $e){
			die('<div>Error de Conexion a SQLITE: ('.$e->getMessage().')</div>');
		}
		// echo "<p> Conexion sqlite OK </p>";
		return $this->link;
	}

	public function ejecutar( $sql ){
		$resultado = $this->link->exec( $sql );
		return $resultado;
	}

	public function get( $sql ){
		foreach( $this->link->query( $sql ) as $row ) {
			return trim( $row[0] );
		}
		return "";
	}

	public function getM( $sql ){
		$resultado = array();
		foreach( $this->link->query( $sql ) as $row ) {
			array_push( $resultado, $row );
		}
		return $resultado;
	}

	//EJECUTA TODO O NADA
	public function transaccion_sql( $m_sql ){
		try {
			$this->link->beginTransaction();
			foreach( $m_sql as $sql ){
				$this->link->exec( $sql );
			}
			$this->link->commit();
		}catch ( Exception $e ){
			$this->link->rollBack();
			echo "<br> Fallo SQL: " . $e->getMessage(); exit;
			return false;
		}
		return true;
	}
}
?>
