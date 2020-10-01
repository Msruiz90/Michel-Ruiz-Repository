<?php

	class apuestas{

		function crearapuesta($id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha){
			$conexion=apuestaJ::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$consulta="INSERT INTO partido_marcador_final (id_usuario,equipo_1,equipo_2,marcador_1,marcador_2,fecha) values(?,?,?,?,?,?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha));

			apuestaJ::Disconnect();
		}

		function actualizarmarcador($id_marcador,$id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha){
			$conexion=apuestaJ::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$consulta="UPDATE partido_marcador_final SET id_usuario=?,equipo_1=?,equipo_2=?,marcador_1=?,marcador_2=?,fecha=?  WHERE id_marcador=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($id_marcador,$id_usuario,$equipo1,$equipo2,$marcador1,$marcador2,$fecha));

			apuestaJ::Disconnect();
		}

		function apuestasAll(){
			$conexion = apuestaJ::Connect();
        	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT * FROM partido_marcador_final";
        	$query = $conexion->prepare($sql);
        	$query->execute();
        	$results = $query->fetchALL(PDO::FETCH_BOTH);
        	apuestaJ::Disconnect();
        	return $results;
		}

		function apuestaID($id_marcador){
			$conexion = apuestaJ::Connect();
        	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT * FROM partido_marcador_final WHERE id_marcador=?";
        	$query = $conexion->prepare($sql);
        	$query->execute(array($id_marcador));
        	$results = $query->fetch(PDO::FETCH_BOTH);
        	apuestaJ::Disconnect();
        	return $results;
        }

        function apuestadelete($id_marcador){
        	$conexion = apuestaJ::Connect();
          	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          	$sql = "DELETE FROM partido_marcador_final WHERE id_marcador = ?";
          	$query = $conexion->prepare($sql);
          	$query->execute(array($id_marcador));
            
          	apuestaJ::Disconnect();
          }     
	}

?>