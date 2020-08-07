<?php
	/*
		Script desarrollado por Códigos de Programación 2020
		https://codigosdeprogramacion.com
		
		Se utiliza la biblioteca PHP QR Code
		https://sourceforge.net/projects/phpqrcode/
	*/
	
	$dir = dirname(__FILE__).'/includes/';
	
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta property="og:type" content="website" />
		<meta property="og:title" content="QR Generator - CDP" />
		<meta property="og:description" content="Genera códigos QR de forma automática." />
		<meta property="og:site_name" content="QR Generator - CDP" />
		<meta property="og:locale" content="es_ES" />
		<link rel="icon" href="images/favicon.png" sizes="32x32" />
		<title>QR Generator - CDP</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">

	</head>
	
	<body>
		
		<div class="container">
			
			<div class="row">
				<div class="col">
					<h3 class="titulo"><b>Generador de códigos QR</b></h3>
				</div>
			</div>
			
			<br/>
			
			<div class="row">
				<div class="col">
					
					<form id="form_qr">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-link active" id="nav-texto-tab" data-toggle="tab" href="#nav-texto" role="tab" aria-controls="nav-texto" aria-selected="true"><i class="fas fa-file-alt"></i> Texto</a>
								<a class="nav-link" id="nav-url-tab" data-toggle="tab" href="#nav-url" role="tab" aria-controls="nav-url" aria-selected="false"><i class="fas fa-globe"></i> URL</a>
								<a class="nav-link" id="nav-telefono-tab" data-toggle="tab" href="#nav-telefono" role="tab" aria-controls="nav-telefono" aria-selected="false"><i class="fas fa-phone"></i> Tel&eacute;fono</a>
								<a class="nav-link" id="nav-vcard-tab" data-toggle="tab" href="#nav-vcard" role="tab" aria-controls="nav-vcard" aria-selected="false"><i class="fas fa-id-card"></i> Vcard</a>
								<a class="nav-link" id="nav-sms-tab" data-toggle="tab" href="#nav-sms" role="tab" aria-controls="nav-sms" aria-selected="false"><i class="fas fa-sms"></i> SMS</a>
								<a class="nav-link" id="nav-email-tab" data-toggle="tab" href="#nav-email" role="tab" aria-controls="nav-email" aria-selected="false"><i class="fas fa-envelope-square"></i> Email</a>
								<a class="nav-link" id="nav-gps-tab" data-toggle="tab" href="#nav-gps" role="tab" aria-controls="nav-gps" aria-selected="false"><i class="fas fa-map-marked-alt"></i> GPS</a>
								<a class="nav-link" id="nav-wifi-tab" data-toggle="tab" href="#nav-wifi" role="tab" aria-controls="nav-wifi" aria-selected="false"><i class="fas fa-wifi"></i> WIFI</a>
							</div>
						</nav>
						
						<div class="tab-content" id="nav-tabContent">
							<?php
								require $dir.'qr-texto.php';
								require $dir.'qr-url.php';
								require $dir.'qr-telefono.php';
								require $dir.'qr-sms.php';
								require $dir.'qr-vcard.php';
								require $dir.'qr-email.php';
								require $dir.'qr-gps.php';
								require $dir.'qr-wifi.php';
							?>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<a data-toggle="tooltip" title="Selecciona el tamaño del código QR"><i class="fas fa-info-circle"></i></a>
								<label for="campo">Tamaño:</label>
								
								<select class="form-control" id="tamanio" name="tamanio">
									<?php for ($a = 1; $a < 11; $a++) { ?>
										<option value="<?php echo $a; ?>" <?php if ($a == 5) {
											echo 'selected';
										} ?>><?php echo $a; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<a data-toggle="tooltip" title="Nivel ECC (capacidad de corrección de errores). Esto compensa la suciedad, daños o borrosidad del código de barras. Un alto nivel de ECC agrega más redundancia a costa de usar más espacio"><i class="fas fa-info-circle"></i></a>
								<label for="campo">Redundancia:</label>
								<select class="form-control" id="ecc" name="ecc">
									<option value="L">Baja</option>
									<option value="M" selected>Media</option>
									<option value="Q">Alta</option>
									<option value="H">Muy alta</option>
								</select>
							</div>
						</div>
						
						<input type="hidden" id="tab-activo" name="tab-activo" value="nav-texto-tab" />
						
						<button type="button" id="generar" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Generar código QR</button>
						<button type="button" id="descargar" class="btn btn-success"><i class="fas fa-download"></i> Descargar código QR</button>
						
					</form>
					
					<div class="row qr">
						<img id="img-qr" />
						<a id="link-img" download="qr-code.png" hidden></a>
					</div>
				</div>
			</div>
		</div>
		
		<script src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" data-auto-replace-svg="nest"></script>
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIm6sL7CVJU8A94dY6KVMkZOxNJSdkelg">
		</script>
		<script src="js/functions.js"></script>
		
	</body>
	
</html>