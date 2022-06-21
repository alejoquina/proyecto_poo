<?php
	class CarritoControllers{

		private $producto;

		public function __construct(){
			require_once('models/producto.php');
			$this->producto = new Producto();

		}


		public function index(){
			if (isset($_SESSION['carrito'])) {
				$carro = $_SESSION['carrito'];
				
			}else{
				$carro = array();
			}

			require_once('views/carrito/index.php');
			
		}


		public function add(){
			
			if (isset($_GET['id'])) {
				$producto_id = $_GET['id'];
			}else{
				header('location:'.RUTA_BASE);
			}

			if (isset($_SESSION['carrito'])) {
				
				$contador = 0;
				foreach ($_SESSION['carrito'] as $indice => $elemento) {

					if ($elemento['id_producto'] == $producto_id ) {
						$_SESSION['carrito'][$indice]['unidades']++;
						$contador++;
					}
				}

			}
				
				if (!isset($contador) || $contador == 0) {
				
					//conseguir producto 
					$this->producto->setId($producto_id);
					$producto = $this->producto->getOne();
					
					if (is_object($producto)) {
						$_SESSION['carrito'][] = array(
						'id_producto' => $producto->id,
						'precio' => $producto->precio,
						'unidades' => 1,
						'producto' => $producto
						);
					}

				}	
			
			header('location:'.RUTA_BASE.'/carrito/index');
		}

		public function up(){
			if (isset($_GET['index'])) {
				$index = $_GET['index'];

				$_SESSION['carrito'][$index]['unidades']++;

			}
			header('location:'.RUTA_BASE.'/carrito/index');
		}

		public function down(){
			if (isset($_GET['index'])) {
				$index = $_GET['index'];

				$_SESSION['carrito'][$index]['unidades']--;

				if ($_SESSION['carrito'][$index]['unidades'] == 0) {
					unset($_SESSION['carrito'][$index]);					
				}

			}
			header('location:'.RUTA_BASE.'/carrito/index');
		}

		public function remove(){
			if (isset($_GET['index'])) {
				$index = $_GET['index'];

				unset($_SESSION['carrito'][$index]);

			}
			header('location:'.RUTA_BASE.'/carrito/index');
		}


		public function delete_all(){
			unset($_SESSION['carrito']);
			session_destroy();
			header('location:'.RUTA_BASE.'/carrito/index');
		}


	}


?>
