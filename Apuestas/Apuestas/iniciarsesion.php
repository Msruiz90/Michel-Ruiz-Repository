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
			<h2 class="iniciar1">Iniciar Sesion</h2>
			<section id="contacto3">
			 	<section class="logoinicio"><img class="logoinicio1" src="img/2000px-Group_font_awesome.svg.png"></section>
			 	<form action="Controller/validarsusuario.controller.php" method="POST">
			 		<div>
			 			<label>Apodo</label>
			 			<input type ="text" name="id_usuario" placeholder="Escribe tu Usuario" required >
			 		</div>
			 		<div>
			 			<label>Contraseña</label>
			 			<input type ="password" name="clave" placeholder="Escribe tu contraseña" required >
			 		</div>
			 		<br>
			 		<div>
			 			<button  type="botton" name="acc" value="usu"> Iniciar</button>
			 		</div>
			 	</form>
			 	<br>
			 	<a href="registrarse.php"><p class="olvidastecontra">Crear Cuenta</p></a>
			</section>
		</section>
	<footer>
	
	</footer>
</body>
</html>