<?php
	if (isset($_POST['fname'])){
		$nombres=htmlentities($_POST['fname']);
		$email_cliente=htmlentities($_POST['email']);
		$telefono=htmlentities($_POST['phone']);
		$subject=utf8_decode($_POST['subject']);
		$mensaje=htmlentities($_POST['message']);

		
	/*SIGUE RECOLECTANDO DATOS PARA FUNCION MAIL*/
	$message = '';
	$message .= '<p>Hola, ha sido registrado un nuevo mensaje desde el formulario de contacto del sitio web, según el detalle siguiente:</p> ';
	$message .= '<p>Cliente: '.$nombres.'</p> ';
	$message .= '<p>Email: '.$email_cliente.'</p> ';
	$message .= '<p>Teléfono: '.$telefono.'</p> ';
	$message .= '<p>Mensaje: '.$mensaje.'</p> ';
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=UTF-8\r\n";
	$header .= "From: ". $nombres . " <" . $email_cliente . ">\r\n";
	$email='nico.leo.busto@gmail.com';//Ingresa tu dirección de correo
	
			
	if (mail($email,$subject,$message,$header)){
		
		//Si el mensaje se envía muestra una confirmación
		echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-success alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>Su mensaje ha sido enviado correctamente.</strong>
		    </div>    
		  </div>
		</div>';
	}else{
		//Si el mensaje no se envía muestra el mensaje de error
		echo '<div class="modal fade" id="respuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="alert alert-danger alert-dismissable">
		        <button type="button" class="close" data-dismiss="modal">×</button>
		        <strong>ERROR. Intente mas tarde.</strong>
		    </div>    
		  </div>
		</div>';
			/*FINALIZA RECOLECTANDO DATOS PARA FUNCION MAIL*/
			
		}
	}
?>