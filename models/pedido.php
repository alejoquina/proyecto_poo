<?php

	class Pedido extends Conexion{
		
		private $id;
		private $usuario_id;
		private $provincia;
		private $localidad;
		private $direccion;
		private $coste;
		private $estado;
		private $fecha;
		private $hora;
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

		public function setUsuarioId(int $usuario_id) { 
			$this->usuario_id = $usuario_id;
		} 
		
		public function getUsuarioId(){ 
			return $this->usuario_id; 
		} 

		public function setProvincia(string $provincia) { 
			$this->provincia = $provincia; 
		} 
		
		public function getProvincia(){ 
			return $this->provincia; 
		} 

		public function setLocalidad(string $localidad) { 
			$this->localidad = $localidad; 
		} 
		
		public function getLocalidad(){ 
			return $this->localidad; 
		}

		public function setDireccion(string $direccion) { 
			$this->direccion = $direccion; 
		} 
		
		public function getDireccion(){ 
			return $this->direccion;
		} 	

		public function setCoste(string $coste) { 
			$this->coste = $coste; 
		} 
		
		public function getCoste(){ 
			return $this->coste; 
		}

		public function setEstado(string $estado) { 
			$this->estado = $estado; 
		} 
		
		public function getEstado(){ 
			return $this->estado; 
		}

		public function setFecha(string $fecha) { 
			$this->fecha = $fecha; 
		} 
		
		public function getFecha(){ 
			return $this->fecha; 
		}

		public function setHora(string $hora) { 
			$this->hora = $hora; 
		} 
		
		public function getHora(){ 
			return $this->hora; 
		}
		
		public function save(){

			$this->usuario_id = $this->getUsuarioId();
			$this->provincia = $this->getProvincia();
			$this->localidad = $this->getLocalidad();
			$this->direccion = $this->getDireccion();
			$this->coste = $this->getCoste();
			$this->estado = 'confirmado';
			$this->fecha = $this-> getFecha();
			$this->hora = $this->getHora();

			$sql = "INSERT INTO pedidos(usuario_id,provincia,localidad,direccion,coste,estado,fecha,hora)VALUES(?,?,?,?,?,?,?,?)";
			$insert = $this->conexion->prepare($sql);
			$arrdata = array($this->usuario_id,$this->provincia,$this->localidad,$this->direccion,$this->coste,$this->estado,$this->fecha,$this->hora); 
			$insert->execute($arrdata);
			$insertid = $this->conexion->lastInsertid();
			return $insertid;


		}

		public function getAll(){
			$sql = "SELECT *FROM pedidos";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetchAll(PDO::FETCH_OBJ);
			return $resul;
		}

		public function getOne(){
			$id = $this->getId();
			$sql = "SELECT *FROM pedidos WHERE id = '$id' ";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetch(PDO::FETCH_OBJ);
			return $resul;
		}	

		public function getOneByUser(){
			$usuario_id = $this->getUsuarioId();
			$sql = "SELECT p.id, p.coste FROM pedidos p INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id WHERE p.usuario_id = '$usuario_id' ORDER BY id DESC LIMIT 1 ";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetch(PDO::FETCH_OBJ);
			return $resul;

		}

		public function getAllByUser(){
			$usuario_id = $this->getUsuarioId();
			$sql = "SELECT  p.*, lp.unidades FROM pedidos p INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id WHERE p.usuario_id = '$usuario_id' ORDER BY id DESC ";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetchAll(PDO::FETCH_OBJ);
			return $resul;

		}	
		
		public function save_linea($pedido_id){
			

			foreach ($_SESSION['carrito'] as  $carro) {
				
				$producto = $carro['producto'];
				$producto_id = $producto->id;
			
				$sql2 = "INSERT INTO lineas_pedido(pedido_id,producto_id,unidades)VALUES(?,?,?)";
				$insert = $this->conexion->prepare($sql2);
				$arrdata = array($pedido_id, $producto_id,$carro['unidades']);
				$insert->execute($arrdata);
				
				if (!$insert) {
					return false;
				}
				
			}

			return true;
		} 

		public function getProductosByPedidoId($id){
			
			$sql = "SELECT p.*,lp.unidades FROM productos p INNER JOIN lineas_pedido lp ON p.id = lp.producto_id WHERE lp.pedido_id = '$id' ";
			$consul = $this->conexion->prepare($sql);
			$consul->execute();
			$resul = $consul->fetchAll(PDO::FETCH_OBJ);
			return $resul;

			
		}


		public function updateEstado(){
			$id = $this->getId();
			$estado = $this->getEstado();
			$sql = "UPDATE pedidos set estado = ? WHERE id = '$id'  ";
			$update = $this->conexion->prepare($sql);
			$arrdata = array($estado);
			$result = $update->execute($arrdata);
			return $resul; 
		}
		





	}

?>