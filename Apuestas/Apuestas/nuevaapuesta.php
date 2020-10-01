<?php
   
    session_start();

    require_once("../apuestas/Model/db.conn.php");

    require_once("../apuestas/Model/usuarios.class.php");

    require_once("../apuestas/Model/apuestas.class.php");


    if(!isset($_SESSION["id_usuario"])){
      header("location: ../index.php");
    }

    date_default_timezone_set("America/Bogota");
    
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="description" content="Apuestas Michel Ruiz"/>
<link rel="stylesheet"  href="css/estilos.css">
	<title></title>
</head>
<body>
	<section id="entrar">
        <h1> <?php echo $_SESSION["nombre"]; ?> </h1>
        <a href="cerrarsesion.php">cerrar sesion</a>
    </section>
	 <nav>
     <?php include_once("comp.menu.php"); ?>
     </nav>
		<section id="contenedor1">
			<section id="galeria1">
				<form action="Controller/realizarapuesta.controller.php" method="POST">
					<div>
						<input type ="hidden" name="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>" required>
					</div>
					<div class="equipo1">
					<label >Nombre de equipo 1</label>
						<input type ="text" name="equipo_1" required >
					</div>
					<div class="equipo1">
						<h1>VS</h1>
					</div>
					<div class="equipo1">
					<label >Nombre de equipo 2</label>
						<input type ="text" name="equipo_2" required >
					</div>
					<br>
					<div class="equipo2">
						<input type ="hidden" name="marcador_1" value="?">
					</div>
					<div class="equipo2">
						<input type ="hidden" name="marcador_2" value="?">
					</div>
					<div>
                        <input type="hidden" name="fecha" min="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" required >
                     </div>
					<div>
                      <button  type="botton" name="acc" value="apuesta"> PUBLICAR</button>
                   </div>
				</form>
			</section>
		</section>
		

	<footer>
	
	</footer>
</body>
</html>