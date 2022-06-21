<?php session_start();

	require_once('autoload.php');
	require_once('config/config.php');
	require_once('helpers/utils.php');
	require_once('views/layout/header.php');
	require_once('views/layout/sidebar.php');

	function Error(){
		$error = new errorControllers();
		$error->index();
	}

	if (isset($_GET['controllers'])) {
		$name_controller = $_GET['controllers'].'Controllers';
		

	}else if(!isset($_GET['controllers']) && !isset($_GET['action'])){
		$name_controller = CONTROLLER_DEFAULT;
	}else{
		Error();
		exit();
	}

	
	if (class_exists($name_controller)) {
		$controlador = new $name_controller();

		if (isset($_GET['action']) && method_exists($controlador, $_GET['action']) ) {
				$action = $_GET['action'];
				$controlador->$action(); 
		}else if(!isset($_GET['controllers']) && !isset($_GET['action'])){
			$action_default = ACTION_DEFAULT;
			$controlador->$action_default();
		}else{
			Error();	
		}	

	}else{
		Error();
	}
	
	require_once('views/layout/footer.php');


?>