<?php

/**
 * Sistema generador de códigos QR 1.0
 * Desarrollado por Marco Robles 2023
 * https://github.com/mroblesdev
 *
 * Se utiliza la biblioteca PHP QR Code
 * https://sourceforge.net/projects/phpqrcode
 */


require '../phpqrcode/qrlib.php';
require dirname(__FILE__) . '/functions.php';

//print_r($_POST);

$datos = "";

//echo $output_data;

//Valida si envia post
if ($_POST) {

	$tipo = htmlspecialchars($_POST["tab-activo"], ENT_QUOTES);
	$ecc = htmlspecialchars($_POST["ecc"], ENT_QUOTES);
	$size = htmlspecialchars($_POST["tamanio"], ENT_QUOTES);

	switch ($tipo) {

		case 'nav-texto-tab':
			$texto = htmlspecialchars($_POST["txt_texto"], ENT_QUOTES);
			$datos = validaLongitudTexto($texto, 1000);
			break;

		case 'nav-url-tab':
			$datos = htmlspecialchars($_POST["url_url"], ENT_QUOTES);
			break;

		case 'nav-telefono-tab':
			$telefono = htmlspecialchars($_POST["tel_numero"], ENT_QUOTES);
			$datos = 'tel:' . $telefono;
			break;

		case 'nav-vcard-tab':
			$nombre = htmlspecialchars($_POST["vc_nombre"], ENT_QUOTES);
			$empresa = htmlspecialchars($_POST["vc_empresa"], ENT_QUOTES);
			$cargo = htmlspecialchars($_POST["vc_cargo"], ENT_QUOTES);
			$web = htmlspecialchars($_POST["vc_web"], ENT_QUOTES);
			$direccion = htmlspecialchars($_POST["vc_direccion"], ENT_QUOTES);
			$telefono = htmlspecialchars($_POST["vc_telefono"], ENT_QUOTES);
			$email = htmlspecialchars($_POST["vc_email"], ENT_QUOTES);

			$datos  = 'BEGIN:VCARD' . "\n";
			$datos .= 'VERSION:2.1' . "\n";
			$datos .= 'FN:' . $nombre . "\n";
			$datos .= 'ORG:' . $empresa . "\n";
			$datos .= 'TITLE:' . $cargo . "\n";
			$datos .= 'TEL;TYPE=cell:' . $telefono . "\n";
			$datos .= 'ADR;TYPE=work;' .
				'LABEL="Oficina":' . $direccion . "\n";
			$datos .= 'URL;TYPE=work:' . $web . "\n";
			$datos .= 'EMAIL:' . $email . "\n";
			$datos .= 'END:VCARD';

			break;

		case 'nav-sms-tab':
			$telefono = htmlspecialchars($_POST["vc_telefono"], ENT_QUOTES);
			$mensaje = htmlspecialchars($_POST["mensaje"], ENT_QUOTES);
			$mensaje = validaLongitudTexto($mensaje, 160);
			$datos = 'SMSTO:' . $telefono . ':' . $mensaje;
			break;

		case 'nav-email-tab':
			$email = htmlspecialchars($_POST["email_email"], ENT_QUOTES);
			$asunto = htmlspecialchars($_POST["email_asunto"], ENT_QUOTES);
			$mensaje = htmlspecialchars($_POST["email_mensjae"], ENT_QUOTES);
			$mensaje = validaLongitudTexto($mensaje, 200);
			$datos = 'mailto:' . $email . '?subject=' . urlencode($asunto) . '&body=' . urlencode($mensaje);
			break;

		case 'nav-gps-tab':
			$latitud = htmlspecialchars($_POST["gps_latitud"], ENT_QUOTES);
			$longitud = htmlspecialchars($_POST["gps_longitud"], ENT_QUOTES);
			$datos = 'geo:' . $latitud . ',' . $longitud;
			break;

		case 'nav-wifi-tab':
			$ssid = htmlspecialchars($_POST["wifi_ssid"], ENT_QUOTES);
			$password = htmlspecialchars($_POST["wifi_password"], ENT_QUOTES);
			$seguridad = htmlspecialchars($_POST["wifi_seguridad"], ENT_QUOTES);

			$datos = 'WIFI:S:' . $ssid . ';';
			if ($seguridad) {
				$datos .= 'T:' . $seguridad . ';';
			}
			if ($password) {
				$datos .= 'P:' . $password . ';';
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
