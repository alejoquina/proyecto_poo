<?php if(isset($categorias)): ?>
	<h1 class="main-title"><?=$categorias->nombre; ?></h1>
	
	<?php if(empty($producto)): ?>
		<h1 class="main-title">en este momento no tenemos productos</h1>
	<?php else: ?>

			<article class="articulos">
				<?php foreach($producto as $productos):  ?>
				<div class="compras">
					<a href="<?=RUTA_BASE;?>/producto/ver&id=<?=$producto->id ?>">
						<img src="<?php echo RUTA_BASE; ?>/assets/img/<?php echo $producto->imagen; ?>">
						<p class="titulo-articulo"><?=$producto->nombre ?></p>
						<p class="titulo-precio"><?=$producto->precio ?></p>
					</a>	
					<a href="<?=RUTA_BASE;?>/carrito/add&id=<?=$producto->id; ?>" class="comprar">comprar</a>
				</div>

			<?php endforeach; ?>				
				
			</article>
		</section>

	
	</div>
	<?php endif; ?>		
	
	<?php else: ?>
	<h1 class="main-title">la categoria no existe</h1>

<?php endif; ?>