<div class="tab-pane fade" id="nav-sms" role="tabpanel" aria-labelledby="nav-sms-tab">
	<fieldset>
		<legend>
			<h5 class="titulo">Código QR para SMS</h5>
		</legend>
		
		<div class="alert alert-info" role="alert">
			Introduce un n&uacute;mero tel&eacute;fonico y un mensaje para generar un código QR.
		</div>
	</fieldset>
	<div class="form-group">
		<label for="telefono">N&uacute;mero tel&eacute;fonico:</label>
		<input type="tel" class="form-control" id="telefono" />
	</div>
	<div class="form-group">
		<label for="mensaje">Mensaje:</label>
		<textarea class="form-control" id="mensaje" maxlength="160" aria-describedby="mensajeHelp"></textarea>
		<small id="mensajeHelp" class="form-text text-muted">Máximo 160 caracteres.</small>
	</div>
</div>