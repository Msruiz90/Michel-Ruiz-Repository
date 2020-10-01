<?php

	require_once("../Model/db.conn.php");

	require_once("../Model/usuarios.class.php");

	$accion=$_REQUEST["acc"];
       switch ($accion) {
       		case 'usu':

       		$id_usuario	= $_POST["id_usuario"];
       		$nombre		  = $_POST["nombre"];
       		$imagen		  = $_POST["imagen"];
       		$total		  = $_POST["total"];
          $clave      = $_POST["clave"];

       		try {
          		usuarios::crearusuario($id_usuario,$nombre,$imagen,$total,$clave);
          		$mensaje="Se ha Creado Correctamente el usuario";
        
        	}catch (Exception $e){
           		switch ($e->getCode()) {
            		case '23000':
              		$mensaje = "Este Usuario ya existe intenta con otro";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          		}
        	}

        header("location: ../iniciarsesion.php?msn=".$mensaje);

       break;
       		case 'usuactu':

       		$id_usuario	= $_POST["id_usuario"];
       		$nombre		  = $_POST["nombre"];
       		$imagen		  = $_POST["imagen"];
       		$total		  = $_POST["total"];
          $clave      = $_POST["clave"];

       		try {
          		usuarios::actualizarusu($id_usuario,$nombre,$imagen,$total,$clave);
          		$mensaje="Se Actualizo Correctamente";
        
        	}catch (Exception $e){
          		$mensaje="ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
        	}

        		header("location: ../---------.php?msn=".$mensaje);

        break;

       	}
?>