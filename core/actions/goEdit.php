<?php
require_once("../../core/class.Conexion.php");
$db = new Conexion();

$type = $_POST['modo'];

if($type=='news'){
	$id=$_POST['ident'];
	$titulo = $_POST['titulo'];
	$desc_c = $_POST['desc_c'];
	$cuerpo = nl2br($_POST['cuerpo']);

	$sql = "UPDATE news SET titulo='$titulo',desc_c='$desc_c', cuerpo='$cuerpo' WHERE id=$id";
		if($db->query($sql)){
		echo 'Se ha editado la noticia correctamente';
	}else{
		echo 'Error';
	}
}else{
	$id=$_POST['ident'];
	$link = $_POST['link'];
	$desc = $_POST['desc'];
	$sql = "UPDATE videos SET link='$link',descripcion='$desc' WHERE id_v=$id";
		if($db->query($sql)){
		echo 'Se ha editado el video correctamente';
	}else{
		echo 'Error';
	}
}

?>