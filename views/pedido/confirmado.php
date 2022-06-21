
<?php if(isset($_SESSION['pedido'])&& $_SESSION['pedido']== "complete" ): ?>
<h1>tu pedido se ha confirmado</h1>
<p>
	tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria con el coste de pedido sera procesado y enviado.
</p>

<h3>datos del pedido</h3>

<?php if(isset($pedido)): ?>

numero del pedido: <?=$pedido->id; ?><br> 
total a pagar: <?=$pedido->coste; ?><br>
productos:

<table class=tabla-carrito>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>PRECIO</th>
			<th>UNIDADES</th>
			
		</tr>	
	</thead>	

<?php foreach($productos as $producto): ?>
	
	<tr>	
		<td><img src="<?=RUTA_BASE;?>/assets/img/<?=$producto->imagen;?>" class="carrito_img"></td>
			<td><a href="<?=RUTA_BASE;?>/producto/ver&id=<?=$producto->id; ?>"><?=$producto->nombre; ?></a></td>
			<td><?php echo $producto->precio; ?></td>
			<td><?php echo $producto->unidades; ?></td>
	</tr>

<?php endforeach; ?>
</table>	 


<?php endif; ?>


<?php else: ?>
	<h1>tu pedido no se confirmo</h1>
<?php endif; ?>	