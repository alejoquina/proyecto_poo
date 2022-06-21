<h1 class="registro-titulo">Detalles pedidos</h1>

<?php if(isset($pedido)): ?>
<?php if(isset($_SESSION['admin'])): ?>
	<hr>
<h1 class="registro-titulo">cambiar estado de pedido</h1>
	<form action="<?=RUTA_BASE;?>/pedido/estado" method="post">
		<input type="hidden" value="<?=$pedido->id; ?>" name="pedido_id">
		<select name="estado">
			<option value="confirmado"<?=$pedido->estado == "confirmado"? 'selected' : '';?> >pendiente</option>
			<option value="preparation"<?=$pedido->estado == "preparation"? 'selected' : '';?>>en pereparacion</option>
			<option value="ready"<?=$pedido->estado == "ready" ? "selected" : '';?>>preparado para enviar</option>
			<option value="sended"<?=$pedido->estado == "sended"? "selected" : '';?>>enviado</option>
		</select>

		<input type="submit" value="cambiar estado">
	</form>
	<br>
	<hr>
<?php endif; ?>
<h1>Datos del pedido</h1>
Estado: <?php  echo utils::showStatus($pedido->estado); ?><br> 
Numero del pedido: <?=$pedido->id; ?><br> 
Total a pagar: <?=$pedido->coste; ?><br>
Productos:

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