<?php

	session_start();

    require_once("../Model/db.conn.php");

    require_once("../Model/autentificarusuario.class.php");

    $id_usuario = $_POST["id_usuario"];
    $clave      = $_POST["clave"];


    try {
    	$usuario = Gestionarusuario::validarusu($id_usuario, $clave);

        $usuario_existe = count($usuario[0]);

    	if($usuario_existe == 0){

    		$msn = ("Usuario No Registrado Porfavor Verifique El usuario y contraseña");
    		$tipo_msn = base64_encode("Advertencia");

    		header("location: ../iniciarsesion.php?m=".$msn."&tm=".$tipo_msn);
    	}else{

    		$_SESSION["id_usuario"]     = $usuario[0];
    		$_SESSION["nombre"]         = $usuario[1];
    		$_SESSION["imagen"]    		= $usuario[2];
    		$_SESSION["total"]       	= $usuario[4];
    		$_SESSION["clave"]       	= $usuario[5];
    		

    		header("location: ../deshboard.php");
    		

    	}
    } catch (Exception $e) {

    	$msn = base64_encode("A ocurrido un erro".$e->getMessage());
    	$tipo_msn = base64_encode("Advertencia");

    	header("Location: iniciarsesion.php?m=".$msn."&tm=".$tipo_msn);
    }

?>