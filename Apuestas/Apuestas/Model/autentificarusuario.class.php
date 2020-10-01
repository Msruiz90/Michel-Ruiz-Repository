<?php

	class Gestionarusuario{

		function validarusu($id_usuario,$clave){
			$conexion=apuestaJ::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$consulta="SELECT * FROM usuario WHERE id_usuario = ? AND clave = ?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($id_usuario,$clave));

        	$results = $query->fetch(PDO::FETCH_BOTH);

			apuestaJ::Disconnect();
		
		return  $results;
		}
	}

?>