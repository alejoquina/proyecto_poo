<?php
	require_once('config/config.php');
	require_once('libraries/Conexion.php');
	
	spl_autoload_register(function($clase){
		require_once('controllers/'.$clase.'.php');

	});

	spl_autoload_register(function($clase){
		require_once('libraries/'.$clase.'.php');
		
	});

?>