<?php
$db = new Conexion();

?>

<h3 class="w3l_head">Ultimas noticias</h3>
			<p class="w3ls_head_para">Enterate de todas las novedades</p>
			<div class="agileits_w3layouts_news_grids">
				<ul id="flexiselDemo1">
					<?php 
						$sql = $db->query("SELECT * FROM news");
						if($db->rows($sql)>0){
						  while($row = $db->recorrer($sql)){ 
						  $fecha = date_create($row['fecha']);
						  if($row['visible']==1){
						?>   
						
					
					<li>
						<div class="news-grid">
								<img src="<?php echo $row['imagen'] ?>" alt="">
								<div class="news-grid-info" >
									<h5><span><a target="_blank" href="post.php?id=<?php echo $row['id'] ?>"><?php echo $row['titulo'] ?></a></span></h5>
									<h4><?php echo date_format($fecha, 'd/m/y'); ?></h4>
									<p><?php echo $row['desc_c'] ?></p>
									
								</div>
						</div>
					</li>
					<?php
					}
					 }
						}
						$db->liberar($sql)
					?>
				</ul>
				
			</div>