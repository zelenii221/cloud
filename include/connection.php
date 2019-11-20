<?php
	$db = mysqli_connect("localhost","root","root","cloud");
	$db->set_charset("utf8");
	if(mysqli_connect_errno()){
		// error_log ('Ошибка в подключении к базе данных ('.mysqli_connect_errno.'): '.mysqli_connect_error());
		exit();
	}
	session_start();	
?>