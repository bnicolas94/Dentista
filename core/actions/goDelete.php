<?php
require_once("../../core/class.Conexion.php");
$db = new Conexion();

$id=$_POST['id'];

$sql = "DELETE FROM news WHERE id=$id";
if($db->query($sql)){
	echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-danger alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Se ha eliminado la noticia correctamente.</strong>
		    </div>    
		  </div>
		</div>';
}

?>