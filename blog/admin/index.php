<?php 
	//echo "<p>Site</p> admin.php";
	ob_start();
	session_start();
	require_once '../system/sabitler.php'; 
	require_once '../system/functions.php';
	require_once '../system/database.php';

	if (!isset($_SESSION['admin'])) { //admin adında bir oturum başlatılmamışsa..
		
		require_once 'app/login.php';
		exit();
	}
		define("ADMIN", true);

	if (!get("url")) { //gönderilen bir URL yoksa
		$file="app/dashboard.php";
	}
	else{
		$file ="app/".get("url").".php";
	}
	if (file_exists($file)) {
	require_once $file;
	}
	else {echo "Dosya Bulunamadı"; exit();}
	//require 'app/login.php';
	//require 'app/dashboard.php';
	ob_end_flush();
 ?>