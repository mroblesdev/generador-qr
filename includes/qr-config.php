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