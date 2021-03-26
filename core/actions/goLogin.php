<?php 

$user = $_POST['username'];
$pass = $_POST['pass'];

if($user == 'admin' && $pass == '1234'){
	$cookie_name = "user";
	$cookie_value = "Sergio";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	echo 1;
}else{
	echo 2;
}


 ?>