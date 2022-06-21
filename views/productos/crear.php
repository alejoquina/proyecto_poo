<?php if (isset($edit) && isset($producto) && is_object($producto)): ?>
	<h1 class="registro-titulo">Editar producto <?=$producto->nombre; ?></h1>
	<?php $url_action = RUTA_BASE.'/producto/update&id='.$producto->id;?>
<?php else: ?>	
	<h1 class="registro-titulo">Crear productos</h1>
	<?php $url_action = RUTA_BASE.'/producto/save'; ?>
<?php endif; ?>	
	
	
<form class="registro" method="post" enctype="multipart/form-data" action="<?=$url_action; ?>">
	
	<select name="categoria">
		<?php $categoria = utils::showCategorias(); ?>
		<?php foreach($categoria as $categorias): ?>
		<option value="<?php echo $categorias['id']; ?>" <?=isset($producto)&& is_object($producto) && $categorias['id'] == $producto->categoria_id ? 'selected':''  ?>  ><?=$categorias['nombre']; ?></option>
			<?php endforeach; ?>
	</select>
	
		<input type="text" name="nombre" placeholder = "nombre producto" value="<?=isset($producto)&& is_object($producto) ? $producto->nombre :'' ?>" required>
		<textarea placeholder="descripcion" name="descripcion" ><?=isset($producto)&& is_object($producto) ? $producto->descripcion :'' ?></textarea>
		<input type="number" name="precio" placeholder = "precio" value="<?=isset($producto)&& is_object($producto) ? $producto->precio :'' ?>" required>
		<input type="number" name="stock" placeholder = "stock" value="<?=isset($producto)&& is_object($producto) ? $producto->stock :'' ?>" required>
		<input type="number" name="oferta" placeholder = "oferta" value="<?=isset($producto)&& is_object($producto) ? $producto->oferta :'' ?>" required>
		<?php if(isset($producto) && is_object($producto) && !empty($producto->imagen)): ?>
							
				<img src="<?php echo RUTA_BASE; ?>/assets/img/<?php echo $producto->imagen ?>" class="producto" />
				<input type="hidden" name = "ruta" value = "<?php  echo $producto->imagen ?>" >
			
		<?php endif; ?>
		<input type="file" name="imagen">

		<input type="submit" value="enviar">
</form>





