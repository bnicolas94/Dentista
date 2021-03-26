<?php 
require_once("core/class.Conexion.php");
$db = new Conexion();

$sql = $db->query("SELECT * FROM videos");

if($db->rows($sql)>0){
	
	while($row = $db->recorrer($sql)){ 
		if($row['visible']==1){
		?>
		<a href="<?php echo $row['link'] ?>"><img src="<?php echo $row['img'] ?>" alt="<?php echo $row['descripcion'] ?>"></a>
		<?php 
	}
}
}
$db->liberar($sql);


 ?>