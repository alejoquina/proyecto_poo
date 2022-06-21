<?php
 	class CategoriaControllers{

 		private $modelo;
 		private $producto;

 		public function __construct(){
 			require_once('models/categoria.php');
 			require_once('models/producto.php');
 			$this->modelo = new Categoria();
 			$this->producto = new Producto();
 		}


 		public function index(){
 			utils::isAdmin();
 			$categorias = $this->modelo->getAll();
 			require_once('views/categorias/index.php');

 		}

 		public function ver(){
 			if (isset($_GET['id'])) {
 				//conseguir categorias
 				$id = $_GET['id'];
 				$this->modelo->setId($id);
 				$categorias = $this->modelo->getOne();

 				//conseguir producto  
 				$this->producto->setCategoriaId($id);
 				$producto = $this->producto->getAllCategory();

 			}
 			require_once('views/categorias/ver.php');
 		}

 		public function crear_categoria(){
 			utils::isAdmin();
 			require_once('views/categorias/crear.php');
 		}

 		public function save(){
 			utils::isAdmin();
 			if ($_SERVER['REQUEST_METHOD'] == "POST") {
 				
 				$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

 				$this->modelo->setNombre($nombre);
 				
 				$save = $this->modelo->save();
 				header('location:'.RUTA_BASE.'/categoria/index');	
			}
			
 		}


 	}


?>