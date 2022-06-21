<h1 class="registro-titulo">registrarse</h1>
	
	<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete' ) : ?>
		<strong class="alert-green">registro completo</strong>

	<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>	
		<strong class="alert-red">registro falllido, introduce bien los datos</strong>	
	
	<?php endif; ?>	

	<?php utils::deletesesion('register'); ?>
			
	<form class="registro" method="post" action="<?=RUTA_BASE;?>/usuario/save">
		
		<input type="text" name="nombres" placeholder = "Ingresa Nombres" required>
		<input type="text" name="apellidos" placeholder = "Ingresa Apellidos" required>
		<input type="email" name="email" placeholder = "Ingresa Correo" required>
		<input type="password" name="clave" placeholder = "Ingresa Clave" required>
		<input type="submit" value="enviar">
	</form>