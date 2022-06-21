<?php
	class UsuarioControllers{

		private $modelo;

		public function __construct(){
			require_once('models/usuario.php');
			$this->modelo = new Usuario();

		}

		public function index(){
			require_once('index.php');
		}

		public function registro(){
			require_once('views/usuarios/registro.php');
		}

		public function save(){
			if (isset($_SERVER['REQUEST_METHOD']) == "POST" ) {
				
				$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
				$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
				$email = isset($_POST['email']) ? $_POST['email'] : false;
				$clave = isset($_POST['clave']) ? $_POST['clave'] : false;

				if ($nombres && $apellidos && $email && $clave) {

					$this->modelo->setNombres($nombres);
					$this->modelo->setApellidos($apellidos);
					$this->modelo->setEmail($email);	
					$this->modelo->setClave($clave);
					$save = $this->modelo->save();
					
					if ($save) {
						$_SESSION['register'] = "complete";
					}else{
						$_SESSION['register'] =  "failed";
					}
				}else{
					$_SESSION['register'] =  "failed";
				}				
			
			}else{
				$_SESSION['register'] = "failed";
			}
			header('location:'.RUTA_BASE.'/usuario/registro');
		}

		
		public function login(){
			if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
					
				$email = isset($_POST['email']) ? $_POST['email'] : false;
				$clave = isset($_POST['clave']) ? $_POST['clave'] : false;

				
					
					$this->modelo->setEmail($email);
					$this->modelo->setClave($clave);
					//obejto identidad
					$identidad = $this->modelo->login();
					
					if ($identidad && is_object($identidad)) {
						$_SESSION['identidad'] = $identidad;

						if ($identidad->rol == 'admin') {
							$_SESSION['admin'] = true;
						}else{
							$_SESSION['error_login'] = "indetificacion fallida";
						}
					}else{
						header('location:'.RUTA_BASE);		
					}
			
			}else{
				header('location:'.RUTA_BASE);
			}

			header('location:'.RUTA_BASE);
		} 



		public function logout(){
			if (isset($_SESSION['identidad'])) {
				unset($_SESSION['identidad']);
				session_destroy();
					
			}

			if(isset($_SESSION['admin'])) {
				unset($_SESSION['admin']);
					
			}

			header('location:'.RUTA_BASE);

			
		} 

	





	}
?>