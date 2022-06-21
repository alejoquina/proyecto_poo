<?php

	class Usuario extends Conexion{

		private $id;
		private $strnombres;
		private $strapellidos;
		private $stremail;
		private $strclave;
		private $strrol;
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

		public function setNombres(string $nombres) { 
			$this->strnombres = $nombres; 
		} 
		
		public function getNombres(){ 
			return $this->strnombres; 
		} 

		public function setApellidos(string $apellidos) { 
			$this->strapellidos = $apellidos; 
		} 
		
		public function getApellidos(){ 
			return $this->strapellidos; 
		} 

		public function setEmail(string $email) { 
			$this->stremail = $email; 
		} 
		
		public function getEmail(){ 
			return $this->stremail; 
		} 

		public function setClave(string $clave) { 
			$this->strclave = $clave; 
		} 
		
		public function getClave(){ 
			return password_hash($this->strclave, PASSWORD_DEFAULT); 
		} 

		public function setRol(string $rol) { 
			$this->strrol = $rol; 
		} 
		
		public function getRol(){ 
			return $this->strrol; 
		} 

		public function setImagen(string $imagen) { 
			$this->strimagen = $imagen; 
		} 
		
		public function getImagen(){ 
			return $this->strimagen; 
		} 

		public function save(){

			$this->strnombres = $this->getNombres();
			$this->strapellidos = $this->getApellidos();
			$this->stremail = $this->getEmail();
			$this->strclave = $this->getClave();
			$this->strrol = 'usuario';
			$this->strimagen = null;

			$sql = "INSERT INTO usuarios(nombre,apellidos,email,password,rol,imagen)VALUES(?,?,?,?,?,?)";
			$insert = $this->conexion->prepare($sql);
			$arrdata = array($this->strnombres,$this->strapellidos,$this->stremail,$this->strclave,$this->strrol,$this->strimagen);
			$insert->execute($arrdata);

			if ($insert) {
				return true;
			}else{
				return false;
			}

		}


		public function login(){
			
			$resulta = false;
			$email = $this->stremail;  
			$clave = $this->strclave;  

			$sql = "SELECT *FROM usuarios WHERE email = '$this->stremail' ";
			$consult = $this->conexion->query($sql);
			$consult->execute();
			$resul = $consult->fetch(PDO::FETCH_OBJ);
			
			if ($resul) {
				$verify = password_verify($this->strclave, $resul->password);

				if ($verify) {
					return $resul;
				}else{
					return $resulta; 
				}
			}
			
		}

	

	}

?>