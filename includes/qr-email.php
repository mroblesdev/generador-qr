<div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
	<fieldset>
		<legend>
			<h5 class="titulo">Código QR para enviar correo electr&oacute;nico</h5>
		</legend>
		
		<div class="alert alert-info" role="alert">
			Introduce una direcci&oacute;n de correo electr&oacute;nico, el asunto y el mensaje para generar un código QR.
		</div>
	</fieldset>
	
	<div class="form-group">
		<label for="email_email">Correo electr&oacute;nico:</label>
		<input type="email" class="form-control" id="email_email" name="email_email" />
	</div>
	
	<div class="form-group">
		<label for="email_asunto">Asunto:</label>
		<input type="text" class="form-control" id="email_asunto" name="email_asunto" />
	</div>
	
	<div class="form-group">
		<label for="email_mensjae">Mensaje:</label>
		<textarea class="form-control" id="email_mensjae" name="email_mensjae" maxlength="200" aria-describedby="emailMensajeHelp"></textarea>
		<small id="emailMensajeHelp" class="form-text text-muted">Máximo 200 caracteres.</small>
	</div>
</div>