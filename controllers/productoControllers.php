<?php

	class ProductoControllers{

		private $modelo;

		public function __construct(){
			require_once('models/producto.php');
			$this->modelo = new Producto();
		}


		public function index(){

			$productos = $this->modelo->getRandom(6);

			require_once('views/productos/destacados.php');
		}

		public function gestion(){
			utils::isAdmin();
			$productos = $this->modelo->getAll();
			require_once('views/productos/gestion.php');
		}

		public function ver(){
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$this->modelo->setId($id);
				$producto = $this->modelo->getOne();
				
			}

			require_once('views/productos/ver.php');
		}

		public function crear(){
			utils::isAdmin();
			require_once('views/productos/crear.php');
		}

		public function save(){
			utils::isAdmin();
			if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES)) {
				$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
				$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
				$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
				$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
				$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
				$oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
				$fecha = date('Y-m-d H:i:s');
				//rutatemp
				$file_temp = $_FILES['imagen']['tmp_name'];
				$file_name = $_FILES['imagen']['name'];
				$file_type = pathinfo($file_name);
				$extension = $file_type['extension'];
				if ($extension == "PNG" || $extension == "jpg" || $extension == "jpeg" || $extension == "gif" ) {
					$name_imagen = $_SESSION['admin'].'-'.rand(00000,99999);
					move_uploaded_file($file_temp,RUTA_IMG.'/assets/img/'.$name_imagen.'.'.$extension);
					
					$ruta = $name_imagen.'.'.$extension;	
				}
				
				
				if ($categoria && $nombre && $descripcion && $precio && $stock ) {
					
					$this->modelo->setCategoriaId($categoria);
					$this->modelo->setNombre($nombre);
					$this->modelo->setDescripcion($descripcion);
					$this->modelo->setPrecio($precio);
					$this->modelo->setStock($stock);
					$this->modelo->setOferta($oferta);
					$this->modelo->setFecha($fecha);
					$this->modelo->setImagen($ruta);
					$save = $this->modelo->save();
					if ($save) {
						$_SESSION['producto'] == 'complete';
					}else{
						$_SESSION['producto'] == 'failed';
					}
				}else{
					$_SESSION['producto'] == 'failed';
				}
				
				

			}

			header('location:'.RUTA_BASE.'/producto/gestion');

			
		}


		public function actualizar(){
			utils::isAdmin();
			if(isset($_GET['id'])){
				$edit = true;
				$id = $_GET['id']; 
				$this->modelo->setId($id);
				$producto = $this->modelo->getOne();
				require_once('views/productos/crear.php');

			}else{
				header('location:'.RUTA_BASE.'/producto/gestion');		
			}

		}

		public function update(){
			utils::isAdmin();
			if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
					
					$id = $_GET['id'];
					$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
					$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
					$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
					$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
					$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
					$fecha = date('Y-m-d H:i:s');
					$archivo = $_FILES['imagen']['tmp_name'];
					if ($archivo == "") {
					 	$ruta = $_POST['ruta'];
					 	
					 }else{
					 	$imagen_ruta = $_POST['ruta'];
					 	$elimina_imagen = RUTA_IMG.'/assets/img/'.$imagen_ruta;
					 	unlink($elimina_imagen);
					 	$file_name = $_FILES['imagen']['name'];
						$file_type = pathinfo($file_name);
						$extension = $file_type['extension'];
						$name_imagen = $_SESSION['admin'].'-'.rand(00000,99999);
						move_uploaded_file($file_temp,RUTA_IMG.'/assets/img/'.$name_imagen.'.'.$extension);
						$ruta = $name_imagen.'.'.$extension; 
					 }

					 $this->modelo->setId($id);
					 $this->modelo->setCategoriaId($categoria);
					 $this->modelo->setNombre($nombre);
					 $this->modelo->setDescripcion($descripcion);
					 $this->modelo->setPrecio($precio);
					 $this->modelo->setStock($stock);
					 $this->modelo->setFecha($fecha);
					 $this->modelo->setImagen($ruta);
					 $this->modelo->update_producto();

						
			}

								
			header('location:'.RUTA_BASE.'/producto/gestion');			
		
		} 

		public function eliminar(){
			
			utils::isAdmin();
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$delete = $this->modelo->eliminar($id);
				if ($delete) {
					$_SESSION['eliminar'] = "complete";
				}else{
					$_SESSION['elminar'] = "failed";
				}

				
			}else{
				$_SESSION['elminar'] = "failed";
			}			
			 header('location:'.RUTA_BASE.'/producto/gestion');			
		}
	
	}


?>

