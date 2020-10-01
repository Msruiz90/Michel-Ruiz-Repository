<?php

	class usuarios{

		function crearusuario($id_usuario,$nombre,$imagen,$total,$clave){
			$conexion=apuestaJ::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$consulta="INSERT INTO  usuario (id_usuario,nombre,imagen,total,clave) values(?,?,?,?,?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($id_usuario,$nombre,$imagen,$total,$clave));

			apuestaJ::Disconnect();
		}

		function actualizarusu($id_usuario,$nombre,$imagen,$total,$clave){
			$conexion=apuestaJ::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$consulta="UPDATE usuario SET nombre=?,imagen=?,total=?,clave=?  WHERE id_usuario=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($id_usuario,$nombre,$imagen,$total,$clave));

			apuestaJ::Disconnect();
		}

		function usuariosAll(){
			$conexion = apuestaJ::Connect();
        	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT * FROM usuario";
        	$query = $conexion->prepare($sql);
        	$query->execute();
        	$results = $query->fetchALL(PDO::FETCH_BOTH);
        	apuestaJ::Disconnect();
        	return $results;
		}

		function usuarioID($id_usuario){
			$conexion = apuestaJ::Connect();
        	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT * FROM usuario WHERE id_usuario=?";
        	$query = $conexion->prepare($sql);
        	$query->execute(array($id_usuario));
        	$results = $query->fetch(PDO::FETCH_BOTH);
        	apuestaJ::Disconnect();
        	return $results;
		}
	}

?>