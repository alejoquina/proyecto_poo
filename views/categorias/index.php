<h1 class="main-title">gestionar categorias</h1>
	<a href="<?=RUTA_BASE;?>/categoria/crear_categoria" class="buton-crear">Crear Categorias</a>

<table class=tabla>
	<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
		</tr>	
	</thead>	

	<?php foreach($categorias as $categoria): ?>
		<tr>	

			<td><?php echo $categoria['id']; ?></td>
			<td><?php echo $categoria['nombre']; ?></td>

		</tr>

	<?php endforeach; ?>

</table>