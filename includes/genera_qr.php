<?php

/**
 * Sistema generador de códigos QR
 * @version 1.0
 * @link https://qr.codigosdeprogramacion.com
 * @author Marco Robles 2023-2025
 * https://github.com/mroblesdev
 *
 * Se utiliza la biblioteca PHP QR Code
 * https://sourceforge.net/projects/phpqrcode
 * */


require '../phpqrcode/qrlib.php';
require dirname(__FILE__) . '/functions.php';

$datos = "";

//Valida si envia post
if ($_POST) {

	$tipo = htmlspecialchars($_POST["activeTab"], ENT_QUOTES);
	$ecc = htmlspecialchars($_POST["ecc"], ENT_QUOTES);
	$size = htmlspecialchars($_POST["tamanio"], ENT_QUOTES);

	switch ($tipo) {

		case 'texto-tab-pane':
			$texto = htmlspecialchars($_POST["txt_texto"], ENT_QUOTES, 'UTF-8');
			$datos = validaLongitudTexto($texto, 500);
			break;

		case 'url-tab-pane':
			$datos = htmlspecialchars($_POST["url_url"], ENT_QUOTES);
			break;

		case 'phone-tab-pane':
			$telefono = htmlspecialchars($_POST["tel_numero"], ENT_QUOTES);
			$datos = 'tel:' . $telefono;
			break;

		case 'sms-tab-pane':
			$telefono = htmlspecialchars($_POST["sms_numero"], ENT_QUOTES);
			$mensaje = htmlspecialchars($_POST["sms_mensaje"], ENT_QUOTES, 'UTF-8');
			$mensaje = validaLongitudTexto($mensaje, 160);
			$datos = 'SMSTO:' . $telefono . ':' . $mensaje;
			break;

		case 'whatsapp-tab-pane':
			$telefono = htmlspecialchars($_POST["whatsapp_numero"], ENT_QUOTES);
			$mensaje = htmlspecialchars($_POST["whatsapp_mensaje"], ENT_QUOTES, 'UTF-8');
			$datos = 'https://wa.me/' . $telefono . '/?text=' . $mensaje;
			break;

		case 'wifi-tab-pane':
			$ssid = htmlspecialchars($_POST["wifi_ssid"], ENT_QUOTES);
			$password = htmlspecialchars($_POST["wifi_password"], ENT_QUOTES, 'UTF-8');
			$seguridad = htmlspecialchars($_POST["wifi_seguridad"], ENT_QUOTES);

			$datos = 'WIFI:S:' . $ssid . ';';
			if ($seguridad) {
				$datos .= 'T:' . $seguridad . ';';
			}
			if ($password) {
				$datos .= 'P:' . $password . ';';
			}

			break;

		default:
			$texto = htmlspecialchars($_POST["txt_texto"], ENT_QUOTES);
			$datos = validaLongitudTexto($texto, 1000);
	}


	//Valida calidad
	if (!in_array($ecc, array("L", "M", "Q", "H"))) {
		$ecc = "M";
	}

	//Valida que el tamanio sea numero y menor a 10
	if (!is_numeric($size) || $size < 1 || $size > 10) {
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
	$clave = md5($datos . uniqid());

	//Declaramos la ruta y nombre del archivo a generar
	$filename = $dir . $clave . '.png';
	$rutaImg = $dirPath . $clave . '.png';

	//Enviamos los parametros a la Función para generar código QR
	QRcode::png($datos, $filename, $ecc, $size, 2);

	//Regresamos la ruta de la imagen generada
	echo $rutaImg;
}
