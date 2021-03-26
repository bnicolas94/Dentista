<?php 
require_once("../class.Conexion.php");
setlocale(LC_ALL,"es_ES");
$db = new Conexion();
$titulo = $_POST['titulo'];
$desc_c = $_POST['desc_c'];
$cuerpo = nl2br($_POST['cuerpo']);
$fecha = date('Y-m-d');
//$imagen = $_POST['imagen'];
//$fecha = $_POST['fecha'];
    $file = $_FILES["file-input"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "imgs/news/";

   /* if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*1024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 500 || $height > 500)
    {
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 60 || $height < 60)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {*/
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, '../../'.$src);
        
    /*}*/


$sql = "INSERT INTO news (titulo, desc_c, cuerpo, fecha, imagen)
VALUES ('$titulo', '$desc_c' , '$cuerpo', '$fecha', '$src')";

if ($db->query($sql) === TRUE) {
    echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <strong>Se ha publicado la noticia correctamente.</strong>
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