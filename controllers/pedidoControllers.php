<?php

	class PedidoControllers{

		private $pedido;

		public function __construct(){
			require_once('models/pedido.php');
			$this->pedido = new Pedido();

		}

		public function hacer(){
			require_once('views/pedido/index.php');
		}

		public function add(){
			
			if (isset($_SESSION['identidad'])) {
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					
					$usuario_id = $_SESSION['identidad']->id;
					$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
					$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
					$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
					$stacts = utils::statscarrito();
					$coste = $stacts['total'];	
					$fecha = date('Y-m-d H:i:s');
					$hora = date("G:a");

					if ($provincia && $localidad && $direccion) {
						// code...
						$this->pedido->setUsuarioId($usuario_id);
						$this->pedido->setProvincia($provincia);
						$this->pedido->setLocalidad($localidad);
						$this->pedido->setDireccion($direccion);
						$this->pedido->setCoste($coste);
						$this->pedido->setFecha($fecha);
						$this->pedido->setHora($hora);
						$save = $this->pedido->save();
						$save_lineas = $this->pedido->save_linea($save);

						
						if ($save && $save_lineas) {
							$_SESSION['pedido'] = "complete"; 
						}else{
							$_SESSION['pedido'] = "failed";
						}
					
					}else{
						$_SESSION['pedido'] = "failed";
					}
					header('location:'.RUTA_BASE.'/pedido/confirmado');
				}
			
			}else{
				header('location:'.RUTA_BASE);
			}
			
		}

		public function confirmado(){
			if (isset($_SESSION['identidad'])) {
				$usuario_id = $_SESSION['identidad']->id;

				$this->pedido->setUsuarioId($usuario_id);
				$pedido = $this->pedido->getOneByUser();
				$id = $pedido->id;
				$productos = $this->pedido->getProductosByPedidoId($id);
				

					
			}

			require_once('views/pedido/confirmado.php');
			
		}

		public function mis_pedidos(){
			utils::isIdentidad();
			$usuario_id = $_SESSION['identidad']->id;
			
			//sacar los pedidos del usuario
			$this->pedido->setUsuarioId($usuario_id);
			$pedidos = $this->pedido->getAllByUser();
			require_once("views/pedido/mis_pedidos.php");
		}


		public function detalles(){
			utils::isIdentidad();
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				//saco pedido
				$this->pedido->setId($id);
				$pedido = $this->pedido->getOne();
				
				//saco los productos
				$productos = $this->pedido->getProductosByPedidoId($id);

				require_once('views/pedido/detalles.php');
				 
			}else{
				header('location:'.RUTA_BASE.'pedido/mis_pedidos');
			}
		}


		public function gestion(){
			utils::isAdmin();
			$gestion = true;
			$pedidos = $this->pedido->getAll();
			require_once('views/pedido/mis_pedidos.php');
		}

		public function estado(){
			utils::isAdmin();

			if (isset($_SERVER['REQUEST_METHOD']) == "POST" ) {
				if (isset($_POST['pedido_id']) && isset($_POST['estado']) ) {
					
					$id = $_POST['pedido_id'];
					$estado = $_POST['estado'];

					$this->pedido->setId($id);
					$this->pedido->setEstado($estado);
					$update =  $this->pedido->updateEstado();
					header('location:'.RUTA_BASE.'/pedido/detalles&id='.$id);

				}else{
					header('location'.RUTA_BASE);	
				}
				


			}else{
				header('location'.RUTA_BASE);
			}
		}



	}
?> 