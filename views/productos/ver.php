<?php if(isset($producto)): ?>
	<h1 class="main-title"><?=$producto->nombre; ?></h1>
			<div class="details">
				<img src="<?php echo RUTA_BASE; ?>/assets/img/<?php echo $producto->imagen; ?>">
					<div class="details-iz">
						<p class="details-titulo">producto:<?=$producto->nombre ?></p>
						<p class="details-titulo">valor: <?=$producto->precio ?></p>
						<a href="<?=RUTA_BASE;?>/carrito/add&id=<?=$producto->id; ?>" class="details-comprar">comprar</a>
					</div>
			</div>		
	
	<?php else: ?>
	<h1 class="main-title">el producto no existe</h1>

<?php endif; ?>
