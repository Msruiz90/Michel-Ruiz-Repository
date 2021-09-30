<?php
   
    session_start();

    if(!isset($_SESSION["id_usuario"])){
    	header("location: ../index.php");
    }

    require_once("../apuestas/Model/db.conn.php");

    require_once("../apuestas/Model/apuestas.class.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Apuestas Michel Ruiz"/>
    <link rel="stylesheet"  href="css/estilos.css">
    <title>Apuestas</title>
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
            <section id="galeria">
                <?php 
                    $apuesta = apuestas::apuestasAll();
                    foreach ($apuesta as $row ) {
                        echo"
                            <section id='partidos'>
                            <a href='Apostar.php?ui=".base64_encode($row["id_marcador"])."'><p>".$row["equipo_1"]."</p><h1> VS </h1><p>".$row["equipo_2"]."</p></a>
                            </section>";
                    }
                ?>
            </section>
            <aside>
                Aca la tabla de posiciones
            </aside>
        </section>
        <article>
            Aca Los Comentarios
        </article>

    <footer>
    
    </footer>
</body>
</html>
