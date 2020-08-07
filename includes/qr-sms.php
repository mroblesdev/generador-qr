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
		<label for="sms_numero">N&uacute;mero tel&eacute;fonico:</label>
		<input type="tel" class="form-control" id="sms_numero" name="sms_numero" />
	</div>
	<div class="form-group">
		<label for="sms_mensaje">Mensaje:</label>
		<textarea class="form-control"  id="sms_mensaje" name="sms_mensaje" maxlength="160" aria-describedby="smsMensajeHelp"></textarea>
		<small id="smsMensajeHelp" class="form-text text-muted">Máximo 160 caracteres.</small>
	</div>
</div>