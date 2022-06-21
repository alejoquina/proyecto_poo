<h1 class="main-title">Gestion de Productos</h1>
	
	<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete' ): ?>
		<strong class="alert-green">el producto se creo correctamente</strong>
	<?php endif;?>
	<?php utils::deletesesion('producto'); ?>	

	<?php if(isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 'complete' ): ?>
		<strong class="alert-green">producto eliminado</strong>
	<?php endif;?>	
	<?php utils::deletesesion('eliminar'); ?>
		

	<a href="<?=RUTA_BASE;?>/producto/crear" class="buton-crear">Crear Producto</a>

	

<table class=tabla>
	<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th>PRECIO</th>
			<th>STOCK</th>
			<th>ACCIONES</th>
		</tr>	
	</thead>	

	<?php foreach($productos as $producto): ?>
		<tr>	

			<td><?php echo $producto['id']; ?></td>
			<td><?php echo $producto['nombre']; ?></td>
			<td><?php echo $producto['descripcion']; ?></td>
			<td><?php echo $producto['precio']; ?></td>
			<td><?php echo $producto['stock']; ?></td>		<!--controller/metod/var -->
			<td><a class="buton-opcion" href="<?=RUTA_BASE; ?>/producto/actualizar&id=<?php echo $producto['id']; ?>">Actualizar</a>
				<a class="buton-opcion" href="<?=RUTA_BASE; ?>/producto/eliminar&id=<?php echo $producto['id']; ?>">Eliminar</a>
			</td>


		</tr>

	<?php endforeach; ?>

</table>

