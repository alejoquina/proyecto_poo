<h1 class="main-title">Camisetas destacadas</h1>
		
			<article class="articulos">
				<?php foreach($productos as $producto):  ?>
				<div class="compras">
					<a href="<?=RUTA_BASE;?>/producto/ver&id=<?=$producto['id']; ?>">
						<img src="<?php echo RUTA_BASE; ?>/assets/img/<?php echo $producto['imagen']; ?>">
						<p class="titulo-articulo"><?=$producto['nombre'] ?></p>
						<p class="titulo-precio"><?=$producto['precio'] ?></p>
					</a>	
					<a href="<?=RUTA_BASE;?>/carrito/add&id=<?=$producto['id']; ?>" class="comprar">comprar</a>
				</div>

			<?php endforeach; ?>				
				
			</article>
		</section>

	
	</div>					