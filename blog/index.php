<?php 
//bu şekilde yaparak index.php ye router görevi vermiş oluyoruz

	ob_start();//header fonksiyonları için gerekli
	require 'system/sabitler.php';
	require 'system/functions.php';
	require 'system/database.php';

	if (get("url")) {

		$file ="app/".get("url").".php";

	}else{

		$file = 'app/anasayfa.php';

	}
	

	if (file_exists($file)) { //file_exists dosya var mı onun kontrolünü sağlar

		require $file;

	}else{

		echo "File Not Found!";

		exit();
	}

	ob_end_flush();
	?>