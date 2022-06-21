<?php

	class Producto extends Conexion{

		private $id;
		private $categoria_id;
		private $strnombre;
		private $strdescripcion;
		private $doubleprecio;
		private $intstock;
		private $doubleoferta;
		private $strfecha;
		private $strimagen;
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

		public function setCategoriaId(int $categoria_id) { 
			$this->categoria_id = $categoria_id; 
		} 
		
		public function getCategoriaId(){ 
			return $this->categoria_id; 
		} 

		public function setNombre(string $nombre) { 
			$this->strnombre = $nombre; 
		} 
		
		public function getNombre(){ 
			return $this->strnombre; 
		}

		public function setDescripcion(string $descripcion) { 
			$this->strdescripcion = $descripcion; 
		} 
		
		public function getDescripcion(){ 
			return $this->strdescripcion; 
		}

		public function setPrecio($precio) { 
			$this->doubleprecio = $precio; 
		} 
		
		public function getPrecio(){ 
			return $this->doubleprecio; 
		}

		public function setStock(int $stock) { 
			$this->intstock = $stock; 
		} 
		
		public function getStock(){ 
			return $this->intstock; 
		}

		public function setOferta($oferta) { 
			$this->doubleoferta = $oferta; 
		} 
		
		public function getOferta(){ 
			return $this->doubleoferta; 
		}


		public function setFecha(string $fecha) { 
			$this->strfecha = $fecha; 
		} 
		
		public function getFecha(){ 
			return $this->strfecha; 
		}

		public function setImagen(string $imagen) { 
			$this->strimagen = $imagen; 
		} 
		
		public function getImagen(){ 
			return $this->strimagen; 
		}


		public function getAll(){
			$sql = "SELECT *FROM productos ORDER BY id DESC";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetchAll(PDO::FETCH_ASSOC);
			return $resul;

		}

		public function save(){
			$categoria_id = $this->getCategoriaId();
			$nombre = $this->getNombre();
			$descripcion = $this->getDescripcion();
			$precio = $this->getPrecio();
			$stock = $this->getStock();
			$oferta = $this->getOferta();
			$fecha = $this->getFecha();
			$imagen = $this->getImagen();

			$sql = "INSERT INTO productos(categoria_id,nombre,descripcion,precio,stock,oferta,fecha,imagen)VALUES(?,?,?,?,?,?,?,?)";
			$insert = $this->conexion->prepare($sql);
			$arrdata = array($categoria_id,$nombre,$descripcion,$precio,$stock,$oferta,$fecha,$imagen);
			$insert->execute($arrdata);
			return $insert;
		}

		public function eliminar(int $id){

			$sql = "DELETE FROM productos WHERE id = '$id' ";
			$delete = $this->conexion->prepare($sql);
			$resul = $delete->execute();
			return $resul;
		}
		public function getOne(){
			$id = $this->getId();
			$sql = "SELECT *FROM productos WHERE id = '$id' ";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetch(PDO::FETCH_OBJ);
			return $resul;


		}

		public function update_producto(){
			
			$id = $this->getId();
			$categoria_id = $this->getCategoriaId();
			$nombre = $this->getNombre();
			$descripcion = $this->getDescripcion();
			$precio = $this->getPrecio();
			$stock = $this->getStock();
			$oferta = $this->getOferta();
			$fecha = $this->getFecha();
			$imagen = $this->getImagen();			
			
			$sql = "UPDATE productos SET 
			categoria_id=?,nombre=?,descripcion=?,precio=?,stock=?,oferta=?,fecha=?,imagen=? WHERE id = $id ";
			$update = $this->conexion->prepare($sql);
			$arrdata = array($categoria_id,$nombre,$descripcion,$precio,$stock,$oferta,$fecha,$imagen);
			$update->execute($arrdata);
			return $update;
			
		}


		public function getRandom($limit){

			$sql = "SELECT *FROM productos ORDER BY RAND() LIMIT $limit";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$result = $consul->fetchAll(PDO::FETCH_ASSOC);
			return $result;

		}


		public function getAllCategory(){
			$id = $this->getCategoriaId();
			$sql = "SELECT p.*, c.nombre FROM productos as p INNER JOIN categorias as c on c.id = p.categoria_id where P.categoria_id = $id";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();	
			$resul = $consul->fetch(PDO::FETCH_OBJ);
			return $resul;		
		}
				


	

	}

?>