<?php
	/*
		Script desarrollado por Códigos de Programación 2020
		https://codigosdeprogramacion.com
		
		Se utiliza la biblioteca PHP QR Code
		https://sourceforge.net/projects/phpqrcode/
	*/
	
	require '../phpqrcode/qrlib.php';
	require dirname(__FILE__).'/functions.php';
	
	//print_r($_POST);
	
	$datos = "";
	
	//echo $output_data;
	
	//Valida si envia post
	if ($_POST) {
		
		$tipo = filter_input(INPUT_POST, "tab-activo", FILTER_SANITIZE_STRING);
		$ecc = filter_input(INPUT_POST, "ecc", FILTER_SANITIZE_STRING);
		$size = filter_input(INPUT_POST, "tamanio", FILTER_SANITIZE_STRING);
		
		switch($tipo){
		
			case 'nav-texto-tab':
			$texto = filter_input(INPUT_POST, "txt_texto", FILTER_SANITIZE_STRING);
			$datos = validaLongitudTexto($texto, 1000);
			break;
			
			case 'nav-url-tab':
			$datos = filter_input(INPUT_POST, "url_url", FILTER_SANITIZE_STRING);
			break;
			
			case 'nav-telefono-tab':
			$telefono = filter_input(INPUT_POST, "tel_numero", FILTER_SANITIZE_STRING);
			$datos = 'tel:'.$telefono;
			break;
			
			case 'nav-vcard-tab':
			$nombre = filter_input(INPUT_POST, "vc_nombre", FILTER_SANITIZE_STRING);
			$empresa = filter_input(INPUT_POST, "vc_empresa", FILTER_SANITIZE_STRING);
			$cargo = filter_input(INPUT_POST, "vc_cargo", FILTER_SANITIZE_STRING);
			$web = filter_input(INPUT_POST, "vc_web", FILTER_SANITIZE_STRING);
			$direccion = filter_input(INPUT_POST, "vc_direccion", FILTER_SANITIZE_STRING);
			$telefono = filter_input(INPUT_POST, "vc_telefono", FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, "vc_email", FILTER_SANITIZE_STRING);

			$datos  = 'BEGIN:VCARD'."\n";
			$datos .= 'VERSION:2.1'."\n";
			$datos .= 'FN:'.$nombre."\n";
			$datos .= 'ORG:'.$empresa."\n";
			$datos .= 'TITLE:'.$cargo."\n";
			$datos .= 'TEL;TYPE=cell:'.$telefono."\n";
			$datos .= 'ADR;TYPE=work;'.
			'LABEL="Oficina":'.$direccion."\n";
			$datos .= 'URL;TYPE=work:'.$web."\n";
			$datos .= 'EMAIL:'.$email."\n";
			$datos .= 'END:VCARD';
			
			break;
			
			case 'nav-sms-tab':
			$telefono = filter_input(INPUT_POST, "sms_numero", FILTER_SANITIZE_STRING);
			$mensaje = filter_input(INPUT_POST, "sms_mensaje", FILTER_SANITIZE_STRING);
			$mensaje = validaLongitudTexto($mensaje, 160);
			$datos = 'SMSTO:'.$telefono.':'.$mensaje;
			break;
			
			case 'nav-email-tab':
			$email = filter_input(INPUT_POST, "email_email", FILTER_SANITIZE_STRING);
			$asunto = filter_input(INPUT_POST, "email_asunto", FILTER_SANITIZE_STRING);
			$mensaje = filter_input(INPUT_POST, "email_mensjae", FILTER_SANITIZE_STRING);
			$mensaje = validaLongitudTexto($mensaje, 200);
			$datos = 'mailto:'.$email.'?subject='.urlencode($asunto).'&body='.urlencode($mensaje); 
			break;
			
			case 'nav-gps-tab':
			$latitud = filter_input(INPUT_POST, "gps_latitud", FILTER_SANITIZE_STRING);
			$longitud = filter_input(INPUT_POST, "gps_longitud", FILTER_SANITIZE_STRING);
			$datos = 'geo:'.$latitud.','.$longitud;
			break;
			
			case 'nav-wifi-tab':
			$ssid = filter_input(INPUT_POST, "wifi_ssid", FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, "wifi_password", FILTER_SANITIZE_STRING);
			$seguridad = filter_input(INPUT_POST, "wifi_seguridad", FILTER_SANITIZE_STRING);
			
			$datos = 'WIFI:S:'.$ssid.';';
			if ($seguridad) {
				$datos .= 'T:'.$seguridad.';';
			}
			if ($password) {
				$datos .= 'P:'.$password.';';
			}
			
			break;
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
		$dir = '../temp/';
		$dirPath = 'temp/';
		
		//Si no existe la carpeta la creamos
		if (!file_exists($dir)) {
			mkdir($dir);
		}
		
		//Genera md5 de texto para clave
		$fecha = new DateTime();
		$getTimestamp = $fecha->getTimestamp();
		$clave = md5($datos . '' . $getTimestamp);
		
		//Declaramos la ruta y nombre del archivo a generar
		$filename = $dir . $clave . '.png';
		$ruta_img = $dirPath . $clave . '.png';
		
		//Enviamos los parametros a la Función para generar código QR 
		QRcode::png($datos, $filename, $ecc, $size, 2);
		
		//Regresamos la ruta de la imagen generada
		echo $ruta_img;
	}
	
	
?>	