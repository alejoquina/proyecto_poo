<?php if(isset($_SESSION['identidad'])):  ?>
<h1 class="registro-titulo">realizar pedido</h1>
<a href="<?=RUTA_BASE; ?>/carrito/index">ver los productos y el precio de los pedidos</a>
		
		<h3 >direccion para el envio</h3>
	<form class="registro" method="post" action="<?=RUTA_BASE;?>/pedido/add">
		
		<input type="text" name="provincia" placeholder = "provincia o region" required>

		<input type="text" name="localidad" placeholder = "ciudad" required>

		<input type="text" name="direccion" placeholder = "direccion" required>
		
		<input type="submit" value="enviar">
	</form>
	



<?php else: ?>
	<h1 class="registro-titulo">necesitas estar logueado</h1>
	<p>necesitas estar logueado en la web para realizar tu pedido</p>
<?php endif;  ?>

 
