<?php 
session_start();

if(!isset($_COOKIE['user'])) {
	include('login.php');
	}else{
	
	if(isset($_GET['s']) && $_GET['s']=='new'){
		include('new.php');
	} else if(isset($_GET['s']) && $_GET['s']=='list'){
		include('list.php');
	}else if(isset($_GET['s']) && $_GET['s']=='edit'){
		include('edit.php');
	}else if(isset($_GET['s']) && $_GET['s']=='video'){
		include('video.php');
	}else{
		include('new.php');
	}


	}



 ?>
