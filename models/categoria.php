<?php 

	class Categoria extends Conexion{

		private $id;
		private $strnombre;
		private $conexion;

		public function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->getConexion();
		}

		public function setId(int $id) { 
			$this->id = $id; 
		} 
		
		public function getId(){ 
			return $this->id; 
		} 

		public function setNombre(string $nombre) { 
			$this->strnombre = $nombre; 
		} 
		
		public function getNombre(){ 
			return $this->strnombre; 
		}

		public function getAll(){
			$sql = "SELECT id, nombre FROM categorias";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetchAll(PDO::FETCH_ASSOC);
			return $resul;
		} 

		public function getOne(){
			
			$id = $this->getId();
			$sql = "SELECT *FROM categorias WHERE id = $id";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetch(PDO::FETCH_OBJ);
			return $resul;
		}

		

		public function save(){
			
			$this->strnombre = $this->getNombre();
			$sql = "INSERT INTO categorias(nombre)VALUES(?)";
			$insert = $this->conexion->prepare($sql);
			$arrdata = array($this->strnombre);
			$insert->execute($arrdata);
			return $insert;
			
		}

	}
?>