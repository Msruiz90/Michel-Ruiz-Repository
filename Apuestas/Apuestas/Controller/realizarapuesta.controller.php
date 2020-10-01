<?php

	require_once("../Model/db.conn.php");

	require_once("../Model/apuestas.class.php");

	$accion=$_REQUEST["acc"];
       switch ($accion) {
       		case 'apuesta':

       		$id_usuario	= $_POST["id_usuario"];
       		$equipo1		= $_POST["equipo_1"];
       		$equipo2		= $_POST["equipo_2"];
       		$marcador1	= $_POST["marcador_1"];
          $marcador2  = $_POST["marcador_2"];
          $fecha      = $_POST["fecha"];

       		try {
          		apuestas::crearapuesta($id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha);
          		$mensaje="Apuesta Creada!!";
        
        	}catch (Exception $e){
           		switch ($e->getCode()) {
            		case '23000':
              		$mensaje = "Esta apuesta ya existe intenta con otra";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          		}
        	}

        header("location: ../nuevaapuesta.php?msn=".$mensaje);

       break;
       		case 'usuactu':

          $id_marcador= $_POST["id_marcador"];
       		$id_usuario = $_POST["id_usuario"];
          $equipo1    = $_POST["equipo_1"];
          $equipo2    = $_POST["equipo_2"];
          $marcador1  = $_POST["marcador_1"];
          $marcador2  = $_POST["marcador_2"];
          $fecha      = $_POST["fecha"];

       		try {
          		apuestas::actualizarmarcador($id_marcador,$id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha);
          		$mensaje="Resultado Final del partido";
        
        	}catch (Exception $e){
          		$mensaje="ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
        	}

        		header("location: ../---------.php?msn=".$mensaje);

        break;

       	}
?>