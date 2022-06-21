<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TIENDA CAMISAS</title>
	<link rel="stylesheet" type="text/css" href="<?=RUTA_BASE;?>/assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?=RUTA_BASE;?>/assets/css/registro.css">
</head>
<body>
	<!--CABECERA -->
<div class="container">	
	
	<header class="header">
		
		<div class="logo">
			<img src="<?=RUTA_BASE;?>/assets/img/imagen.jfif">
			<h1 class="titulo">TIENDA DE CAMISETAS</h1>
		</div>
		
		
		
	</header>
	<!--MENU -->
	<?php $categoria = utils::showCategorias(); ?>
	<nav class="menu">
			<li>
				<a href="<?=RUTA_BASE; ?>/producto/index">inicio</a>
				<?php foreach($categoria as $categorias): ?>
					<a href="<?=RUTA_BASE;?>/categoria/ver&id=<?=$categorias['id']; ?>"><?php echo $categorias['nombre']; ?></a>
				<?php endforeach; ?>	
					
			</li>		
	</nav>
	<div class="principal">