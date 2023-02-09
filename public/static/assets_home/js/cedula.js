function validateCedula(cedula) {
	// Verificar la longitud de la cédula
	if (cedula.length !== 10) {
	  return false;
	}

	// Verificar los primeros dos dígitos
	var province = parseInt(cedula.substring(0, 2));
	if (province < 1 || province > 24) {
	  return false;
	}

	// Aplicar el algoritmo de "Módulo 10"
	var total = 0;
	for (var i = 0; i < 9; i++) {
	  var digit = parseInt(cedula.charAt(i));
	  if (i % 2 === 0) {
		digit = digit * 2;
		if (digit > 9) {
		  digit = digit - 9;
		}
	  }
	  total = total + digit;
	}

	// Verificar el décimo dígito
	var expected = (10 - (total % 10)) % 10;
	if (parseInt(cedula.charAt(9)) !== expected) {
	  return false;
	}

	return true;
  }
