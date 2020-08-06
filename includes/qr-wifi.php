<div class="tab-pane fade" id="nav-wifi" role="tabpanel" aria-labelledby="nav-wifi-tab">
	<fieldset>
		<legend>
			<h5 class="titulo">Código QR para WIFI</h5>
		</legend>
		
		<div class="alert alert-info" role="alert">
			Introduce el nombre de la red (SSID), la contrase&ntilde;a de la red y el tipo de encriptaci&oacute;n de seguridad de la red para generar un código QR.
		</div>
	</fieldset>
	<div class="form-group">
		<label for="ssid">Nombre de red (SSID):</label>
		<input type="text" class="form-control" id="ssid" />
	</div>
	
	<div class="form-group">
		<label for="password">Contrase&ntilde;a:</label>
		<input type="text" class="form-control" id="password" />
	</div>
	
	<div class="form-group">
		<label for="seguridad">Tipo de seguridad:</label>
		<select class="form-control" id="seguridad">
			<option id="WEP">WEP</option>
			<option id="WPA">WPA</option>
			<option id="NO">Sin contrase&ntilde;a</option>
		</select>
	</div>
</div>