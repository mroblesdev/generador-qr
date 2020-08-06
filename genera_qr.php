<?php
	/*
		Script desarrollado por Códigos de Programación 2020
		https://codigosdeprogramacion.com
		
		Se utiliza la biblioteca PHP QR Code
		https://sourceforge.net/projects/phpqrcode/
	*/
	
	require dirname(__FILE__).'/phpqrcode/qrlib.php';
	
	//Valida si envia post
	if ($_POST) {
		$texto = utf8_encode($_POST['campo']);
		$ecc = $_POST['ecc'];
		$size = $_POST['tamanio'];
		
		//Valida máximo 1000 caracteres
		$sizeTexto = strlen($texto);
		if ($sizeTexto > 1000) {
			$texto = substr($texto, 0, 1000);
			} else if ($sizeTexto == 0) {
			$texto = utf8_encode("Códigos de Programación");
		}
		
		//Valida calidad
		if (!in_array($ecc, array("L", "M", "Q", "H"))) {
			$ecc = "M";
		}
		
		//Valida que el tamanio sea numero y menor a 10
		if (!preg_match('`[0-9]`', $size) || $size > 10) {
			$size = 5;
		}
		
		//Declaramos una carpeta temporal para guardar la imagenes generadas
		$dir = 'temp/';
		
		//Si no existe la carpeta la creamos
		if (!file_exists($dir)) {
			mkdir($dir);
		}
		
		//Genera md5 de texto para clave
		$fecha = new DateTime();
		$getTimestamp = $fecha->getTimestamp();
		$clave = md5($texto . '' . $getTimestamp);
		
		//Declaramos la ruta y nombre del archivo a generar
		$filename = $dir . $clave . '.png';
		
		//Enviamos los parametros a la Función para generar código QR 
		QRcode::png($texto, $filename, $ecc, $size, 2);
		
		//Regresamos la ruta de la imagen generada
		echo $filename;
	}
?>