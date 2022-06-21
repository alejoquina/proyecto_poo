<?php if(isset($gestion)): ?>
<h1 class="registro-titulo">Gestionar pedidos</h1>

<?php else: ?>
<h1 class="registro-titulo">Mis pedidos</h1>
<?php endif; ?>	


<table class=tabla-carrito>
	<thead>
		<tr>
			<th>NUMERO PEDIDO</th>
			<th>COSTE</th>
			<th>FECHA</th>
			<th>ESTADO</th>
			
		</tr>	
	</thead>	

<?php foreach($pedidos as $pedido): ?>
	
	<tr>	
			<td><a href="<?=RUTA_BASE;?>/pedido/detalles&id=<?=$pedido->id;?>"><?php echo $pedido->id; ?></a></td>
			<td><?php echo $pedido->coste; ?></td>
			<td><?php echo $pedido->fecha; ?></td>
			<td><?php echo utils::showStatus($pedido->estado); ?></td>
	</tr>

<?php endforeach; ?>
</table>