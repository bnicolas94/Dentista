<?php

require_once("../../core/class.Conexion.php");
$db = new Conexion();

$link = 'https://www.youtube.com/watch?v=' . $_POST['link'];
$img = 'https://img.youtube.com/vi/' . $_POST['link'] . '/0.jpg';
$desc = $_POST['desc'];

$sql = "INSERT INTO videos (link, img, descripcion)
VALUES ('$link','$img','$desc')";

if ($db->query($sql) === TRUE) {
    echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <strong>Se ha publicado el video correctamente.</strong>
            </div>    
          </div>
        </div>';
} else {
    echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <strong>Se produjo un error, intente nuevamente.</strong>
            </div>    
          </div>
        </div>';
}

?>