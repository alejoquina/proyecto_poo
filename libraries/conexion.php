<?php

	class Conexion{
		private $conexion;

		public function __construct(){

			$conn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHAR.";
			
			try{
				
				$this->conexion = new PDO($conn, DB_USER, DB_PASS);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}catch(PDOException $e){
				$this->conexion = "error de conexion";
				echo "falla de conexion".$e->getMessage();
			}
		}


		public function getConexion(){
			return $this->conexion;
		}

	}

?>