	<section class="widget">
		<?php if(!isset($_SESSION['identidad'])): ?>
			
		
			<aside>
				
				<?php if(isset($_SESSION['carrito'])): ?>
					<?php $stacts = utils::statscarrito(); ?>
				<h1 class="titulo-formulario">carrito de compras</h1>
				<ul>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">ver carrito</a></li>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">productos(<?=$stacts['count']; ?>)</a></li>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">total:$<?=$stacts['total']; ?></a></li>
				</ul>
				<br>
				<?php endif; ?>

				<h1 class="titulo-formulario">Entrar en la web</h1>
					
					<form class="formulario" method="post"action="<?php echo RUTA_BASE; ?>/usuario/login" >
						<label>Email</label>
						<input type="text" name="email" placeholder="ej: alequina" required>
						<label>Contraseña</label>
						<input type="password" name="clave" placeholder="xxxxxxx" required>	
						<input type="submit" value="enviar">
					</form>

					<p class="enlaces"><a href="<?=RUTA_BASE;?>/usuario/registro">registrarse</a></p>
		<?php else: ?>
			<?php $stacts = utils::statscarrito(); ?>
				<h1 class="titulo-formulario">carrito de compras</h1>
				<ul>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">ver carrito</a></li>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">productos(<?=$stacts['count']; ?>)</a></li>
					<li><a href="<?=RUTA_BASE;?>/carrito/index">total:$<?=$stacts['total']; ?></a></li>
				</ul>
		<h1 class="titulo-formulario"><?= $_SESSION['identidad']->nombre,$_SESSION['identidad']->apellidos;?></h1>				
		<?php endif; ?>	


					<?php if(isset($_SESSION['identidad'])): ?>
						<p class="enlaces"><a href="<?=RUTA_BASE; ?>/pedido/mis_pedidos">mis pedidos</a></p>
					<?php endif; ?>		

					<?php if(isset($_SESSION['admin'])): ?>
						<p class="enlaces"><a href="<?=RUTA_BASE; ?>/categoria/index">gestionar categorias</a></p>
						<p class="enlaces"><a href="<?=RUTA_BASE; ?>/producto/gestion">gestionar productos</a></p>
						<p class="enlaces"><a href="<?=RUTA_BASE; ?>/pedido/gestion">gestionar pedidos</a></p>
						
					
					<?php endif; ?>
					<?php if(isset($_SESSION['identidad'])):?>

					<p class="enlaces"><a href="<?php echo RUTA_BASE;?>/usuario/logout">Cerrar Sesion</a></p>
					<?php endif; ?>

			<aside>
		</section>		
		


	

		<section class="main">