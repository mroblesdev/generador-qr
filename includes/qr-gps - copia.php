<div class="tab-pane fade" id="nav-gps" role="tabpanel" aria-labelledby="nav-gps-tab">
	<fieldset>
		<legend>
			<h5 class="titulo">Código QR para una geolocalizaci&oacute;n</h5>
		</legend>
		
		<div class="alert alert-info" role="alert">
			Introduce una latitud y una longitd para generar un código QR.
		</div>
	</fieldset>

	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="gps_latitud">Latitud:</label>
				<input type="text" class="form-control" id="gps_latitud" name="gps_latitud" />
			</div>
			<div class="form-group">
				<label for="gps_longitud">Longitud:</label>
				<input type="text" class="form-control" id="gps_longitud" name="gps_longitud" />
			</div>
		</div>
		<div class="col-md-6 embed-responsive embed-responsive-4by3" id="map">
			
		</div>
	</div>
	
</div>