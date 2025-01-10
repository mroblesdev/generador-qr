<?php

function validaLongitudTexto($texto, $longitud)
{
	$sizeTexto = strlen($texto);
	if ($sizeTexto > $longitud) {
		$texto = substr($texto, 0, $longitud);
	} elseif ($sizeTexto == 0) {
		$texto = "Códigos de Programación";
	}
	return $texto;
}
