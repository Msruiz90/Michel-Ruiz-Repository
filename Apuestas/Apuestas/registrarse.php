<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="description" content="Apuestas Michel Ruiz"/>
<link rel="stylesheet"  href="css/estilos.css">
	<title></title>
</head>
<body>
	<header>
		<section id="menu">
 			<a href="index.php"><div class="contenedor" id="uno"><img class="icono" src="img/luna1.jpg">
			<p class="texto">Inicio</p></div></a>
			

			<a href="iniciarsesion.php"><div class="contenedor" id="dos"><img class="icono" src="img/luna2.jpg">
			<p class="texto">Nueva Apuesta</p></div></a>
			

			<a href="iniciarsesion.php"><div class="contenedor" id="tres"><img class="icono" src="img/luna3.jpg">
			<p class="texto">Posiciones</p></div></a>
			

			<a href="iniciarsesion.php"><div class="contenedor" id="cuatro"><img class="icono" src="img/luna4.jpg">
			<p class="texto">Perfil</p></div></a>
			
 		</section>
	</header>
		<section id="contenedor2">
			<h2 class="iniciar1">Registrarse</h2>
			<section id="contacto3">
			 	<form action="Controller/agregarusuario.controller.php" method="POST">
			 		<div>
			 			<label>Apodo</label>
			 			<input type ="text" name="id_usuario" placeholder="Escribe El aliass!!!" required >
			 		</div>
			 		<div>
			 			<label>Nombre</label>
			 			<input type ="text" name="nombre" placeholder="Escribe tu Nombre" required >
			 		</div>
			 		<div>
			 			<label>imagen</label>
			 			<input type ="text" name="imagen" placeholder="Escribe tu Nombre" required >
			 		</div>
			 		<div>
			 			<input type ="text" name="total" value="0" >
			 		</div>
			 		<div>
			 			<label>Contraseña</label>
			 			<input type ="password" name="clave" placeholder="Escribe tu contraseña" required >
			 		</div>
			 		<br>
			 		<div>
			 			<button  type="botton" name="acc" value="usu"> Guardar</button>
			 		</div>
			 	</form>
			 	
			</section>
		</section>
	<footer>
	
	</footer>
</body>
</html>