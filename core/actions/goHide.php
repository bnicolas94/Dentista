<?php
require_once("../../core/class.Conexion.php");
$db = new Conexion();

$id=$_POST['id'];
$status = $_POST['status'];
$type = $_POST['modo'];

if($status=='v' && $type='news'){

	$sql = "UPDATE news SET visible='0' WHERE id=$id";
	if($db->query($sql)){
	echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-danger alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Se ha ocultado la noticia correctamente.</strong>
		    </div>    
		  </div>
		</div>';
    }
}else{
	$sql = "UPDATE news SET visible='1' WHERE id=$id";
	if($db->query($sql)){
	echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-success alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Se ha mostrado la noticia correctamente.</strong>
		    </div>    
		  </div>
		</div>';
}
}
//PARA EL VIDEO........//

if($status=='v' && $type='video'){

	$sql = "UPDATE videos SET visible='0' WHERE id_v=$id";
	if($db->query($sql)){
	echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-danger alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Se ha ocultado el video correctamente.</strong>
		    </div>    
		  </div>
		</div>';
    }
}else{
	$sql = "UPDATE videos SET visible='1' WHERE id_v=$id";
	if($db->query($sql)){
	echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-success alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Se ha mostrado el video correctamente.</strong>
		    </div>    
		  </div>
		</div>';
}
}


?>