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

$dir = dirname(__FILE__) . '/includes';

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Generador de códigos QR - MRoblesDev" />
	<meta property="og:description" content="Genera códigos QR de forma automática. Soporta texto, URLs, números telefónicos, SMS, WhatsApp, redes WiFi y mucho más" />
	<meta property="og:site_name" content="Generador QR - MRoblesDev" />
	<meta property="og:locale" content="es_ES" />
	<link rel="icon" href="images/favicon.png" sizes="32x32" />
	<title>Generador QR - MRoblesDev</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

	<div class="container">

		<div class="row">
			<div class="col">
				<h3><strong>Generador de códigos QR</strong></h3>
			</div>
		</div>

		<div id="alert_placeholder"></div>

		<div class="row my-3">
			<div class="col">

				<form id="form_qr">
					<ul class="nav nav-tabs" id="myTabs">
						<li class="nav-item">
							<button class="nav-link active" id="texto-tab" data-bs-toggle="tab" data-bs-target="#texto-tab-pane" type="button" role="tab" aria-controls="texto-tab-pane" aria-selected="true"><i class="fa-solid fa-file-lines"></i> Texto</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" id="url-tab" data-bs-toggle="tab" data-bs-target="#url-tab-pane" type="button" role="tab" aria-controls="url-tab-pane" aria-selected="true"><i class="fa-solid fa-link"></i> URL</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" id="phone-tab" data-bs-toggle="tab" data-bs-target="#phone-tab-pane" type="button" role="tab" aria-controls="phone-tab-pane" aria-selected="true"><i class="fa-solid fa-phone"></i> Teléfono</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" id="sms-tab" data-bs-toggle="tab" data-bs-target="#sms-tab-pane" type="button" role="tab" aria-controls="sms-tab-pane" aria-selected="true"><i class="fa-solid fa-comment-sms"></i> SMS</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" id="whatsapp-tab" data-bs-toggle="tab" data-bs-target="#whatsapp-tab-pane" type="button" role="tab" aria-controls="whatsapp-tab-pane" aria-selected="true"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
						</li>
						<li class="nav-item">
							<button class="nav-link" id="wifi-tab" data-bs-toggle="tab" data-bs-target="#wifi-tab-pane" type="button" role="tab" aria-controls="wifi-tab-pane" aria-selected="true"><i class="fa-solid fa-wifi"></i> WIFI</button>
						</li>
					</ul>

					<div class="row">
						<div class="col-12 col-md-8">

							<div class="tab-content">
								<div class="tab-pane fade show active" id="texto-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para texto</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce un texto para generar un código QR
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="txt_texto" class="form-label">Texto:</label>
										<textarea class="form-control" id="txt_texto" name="txt_texto" maxlength="500" aria-describedby="textoHelp"></textarea>
										<div id="textoHelp" class="form-text">Máximo 500 caracteres.</div>
									</div>
								</div>

								<div class="tab-pane fade" id="url-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para una dirección web</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce una dirección web para generar un código QR.
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="url_url">URL:</label>
										<input type="url" class="form-control" id="url_url" name="url_url">
									</div>
								</div>

								<div class="tab-pane fade" id="phone-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para telefono</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce un número teléfonico para generar un código QR.
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="tel_numero">Teléfono:</label>
										<input type="tel" class="form-control" id="tel_numero" name="tel_numero" maxlength="15">
									</div>
								</div>

								<div class="tab-pane fade" id="sms-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para SMS</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce un número teléfonico y un mensaje para generar un código QR.
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="sms_numero">Número teléfonico:</label>
										<input type="tel" class="form-control" id="sms_numero" name="sms_numero" />
									</div>

									<div class="mb-3">
										<label for="sms_mensaje">Mensaje:</label>
										<textarea class="form-control" id="sms_mensaje" name="sms_mensaje" maxlength="160" aria-describedby="smsMensajeHelp"></textarea>
										<small id="smsMensajeHelp" class="form-text text-muted">Máximo 160 caracteres.</small>
									</div>
								</div>

								<div class="tab-pane fade" id="whatsapp-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para enviar mensaje WhatsApp</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce un número teléfonico y un mensaje para generar un código QR.
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="sms_numero">Número teléfonico:</label>
										<input type="tel" class="form-control" id="whatsapp_numero" name="whatsapp_numero">
									</div>

									<div class="mb-3">
										<label for="sms_mensaje">Mensaje:</label>
										<textarea class="form-control" id="whatsapp_mensaje" name="whatsapp_mensaje" aria-describedby="whatsappHelp" maxlength="500"></textarea>
										<div id="whatsappHelp" class="form-text">Máximo 500 caracteres.</div>
									</div>
								</div>

								<div class="tab-pane fade" id="wifi-tab-pane">
									<fieldset>
										<legend>
											<h5>Código QR para WIFI</h5>
										</legend>

										<div class="alert alert-info" role="alert">
											Introduce el nombre de la red (SSID), la contraseña de la red y el tipo de encriptación de seguridad de la red para generar un código QR.
										</div>
									</fieldset>

									<div class="mb-3">
										<label for="wifi_ssid">Nombre de red (SSID):</label>
										<input type="text" class="form-control" id="wifi_ssid" name="wifi_ssid" />
									</div>

									<div class="row mt-3">
										<div class="col">
											<label for="wifi_password">Contraseña:</label>
											<input type="text" class="form-control" id="wifi_password" name="wifi_password" />
										</div>

										<div class="col">
											<label for="wifi_seguridad">Tipo de seguridad:</label>
											<select class="form-select" id="wifi_seguridad" name="wifi_seguridad">
												<option value="WEP">WEP</option>
												<option value="WPA">WPA/WPA2</option>
												<option value="">Sin contraseña</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-md-4">
							<div class="row">
								<div class="col my-3">
									<a data-bs-toggle="tooltip" data-bs-title="Selecciona el tamaño del código QR"><i class="fas fa-info-circle"></i></a>
									<label for="tamanio">Tamaño:</label>

									<select class="form-select" id="tamanio" name="tamanio">
										<?php for ($size = 1; $size <= 10; $size++) { ?>
											<option value="<?= $size; ?>" <?php echo ($size == 7) ? 'selected' : ''; ?>><?= $size; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col my-3">
									<a data-bs-toggle="tooltip" data-bs-title="Nivel ECC (capacidad de corrección de errores). Esto compensa la suciedad, daños o borrosidad del código de barras. Un alto nivel de ECC agrega más redundancia a costa de usar más espacio"><i class="fas fa-info-circle"></i></a>
									<label for="ecc">Redundancia:</label>
									<select class="form-select" id="ecc" name="ecc">
										<option value="L">Baja</option>
										<option value="M" selected>Media</option>
										<option value="Q">Alta</option>
										<option value="H">Muy alta</option>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col text-center">
									<img id="img-qr" alt="QRCode">
								</div>
							</div>

							<div class="my-3">
								<button type="submit" class="btn btn-primary"><i class="fa-solid fa-qrcode"></i> Generar código QR</button>
								<button type="button" id="descargar" class="btn btn-success"><i class="fa-solid fa-download"></i> Descargar código QR</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	<script src="js/functions.js"></script>

</body>

</html>