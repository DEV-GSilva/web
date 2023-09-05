<?php
	if(isset($_SESSION){
		session_start();
	}

	if(!isset($_SESSION['id'])){
		die("Acesso restrito! Faça login para acessar!<p><a href=\"index.php\">Login</a></p>");
	}
?>