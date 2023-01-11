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
		<label for="wifi_ssid">Nombre de red (SSID):</label>
		<input type="text" class="form-control" id="wifi_ssid" name="wifi_ssid" />
	</div>
	
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="wifi_password">Contrase&ntilde;a:</label>
			<input type="text" class="form-control" id="wifi_password" name="wifi_password" />
		</div>
		
		<div class="form-group col-md-6">
			<label for="wifi_seguridad">Tipo de seguridad:</label>
			<select class="form-control" id="wifi_seguridad" name="wifi_seguridad">
				<option value="WEP">WEP</option>
				<option value="WPA">WPA</option>
				<option value="">Sin contrase&ntilde;a</option>
			</select>
		</div>
	</div>
</div>