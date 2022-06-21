<?php 

	class utils{

		

		public static function deletesesion($name){

			if (isset($_SESSION[$name])) {
				$_SESSION[$name] = null;
				unset($_SESSION[$name]);
			}

			return $name;
		}

		public static function isAdmin(){
			if (!isset($_SESSION['admin'])) {
				header('location:'.RUTA_BASE);
			}else{
				true;
			}
		}

		public static function isIdentidad(){
			if (!isset($_SESSION['identidad'])) {
				header('location:'.RUTA_BASE);
			}else{
				true;
			}
		}


		public static function showCategorias(){
			
			require_once('models/categoria.php');
			$categorias = new Categoria();
			$categoria = $categorias->getAll();
			return $categoria;
				

		}


		public static function redirect($pagina){
			header('location:'.RUTA_BASE.'/'.$pagina);
		}


		public static function statscarrito(){
			$stacts = [
				'count' => 0,
				'total' => 0
			];

			if (isset($_SESSION['carrito'])) {
				$stacts['count'] = count($_SESSION['carrito']);

				foreach ($_SESSION['carrito'] as $producto) {
					$stacts['total'] += $producto['precio']*$producto['unidades'];
				}
			}

			return $stacts;
		
		}

		public static function showStatus($status){
			$value = "pendiente";
			
			if ($status == 'pendiente') {
				$value;
			}elseif($status == 'preparation'){
				$value = "en preparacion";
			}elseif($status == 'ready'){
				$value = "preparado para enviar";
			}elseif($status == 'sended'){
				$value = "enviado";
			}

			return $value;

		}


	}

?>