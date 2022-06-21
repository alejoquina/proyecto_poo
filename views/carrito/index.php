<h1 class="main-title">pedidos</h1>

	<table class=tabla-carrito>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>PRECIO</th>
			<th>UNIDADES</th>
			<th>ELIMINAR</th>
			
		</tr>	
	</thead>	


	<?php foreach ($carro as $indice => $elemento):
		$producto = $elemento['producto'];
	 ?>
		<tr>	
		<td><img src="<?=RUTA_BASE;?>/assets/img/<?=$producto->imagen;?>" class="carrito_img"></td>
			<td><a href="<?=RUTA_BASE;?>/producto/ver&id=<?=$producto->id; ?>"><?=$producto->nombre; ?></a></td>
			<td><?php echo $producto->precio; ?></td>
			<td>
				<a href="<?=RUTA_BASE;?>/carrito/up&index=<?=$indice ?>" class="buton-carrito" >+</a>
				<?php echo $elemento['unidades']; ?>
				<a href="<?=RUTA_BASE;?>/carrito/down&index=<?=$indice ?>" class="buton-carrito">-</a>
			</td>
			<td><a href="<?=RUTA_BASE; ?>/carrito/remove&index=<?=$indice ?>" class="buton-carrito-rojo">eliminar</a></td>
		</tr>

	<?php endforeach; ?>

</table>
<br>



<br>
<!--- carrito total--->
<div class="total-carrito">
	<?php $stacts=utils::statscarrito(); ?>
	<h3>precio total:<?= $stacts['total']; ?></h3>
	<a href="<?=RUTA_BASE; ?>/pedido/hacer" class="buton-carrito">realizar compra</a><br>
	<a href="<?=RUTA_BASE; ?>/carrito/delete_all" class="buton-carrito-rojo">vaciar carrito</a>	
</div>
	