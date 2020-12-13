<?php 
	session_start();

	$cursoSele=$_POST['cursoSele'];
	$_SESSION['cursoSele']=$cursoSele;

	$planSeleC=$_POST['planSeleC'];
	$_SESSION['planSeleC']=$planSeleC;

	echo '1';
	

 ?>